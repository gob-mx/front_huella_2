"use strict";

// Class definition
var KTRegistroImplicado = function () {
	// Private variables
	var form;
	var submitButton;
	var validation;

	var initForm = function () {
		function locale() {
			return {
				format: 'YYYY-MM-DD',
				separator: ' - ',
				applyLabel: 'Aplicar',
				cancelLabel: 'Cancelar',
				// fromLabel: 'From',
				// toLabel: 'To',
				customRangeLabel: 'Personalizado',
				// weekLabel: 'W',
				daysOfWeek: daysOfWeek(),
				monthNames: monthNames()
			}
		}

		function daysOfWeek(){
			return ['Do','Lu','Ma','Mi','Ju','Vi','Sa'];
		}

		function monthNames(){
			return ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiempbre','Octubtre','Noviembre','Diciembre'];
		}

		$('#fecha_nacimiento').daterangepicker({
			singleDatePicker: true,
			timePicker: false,
			timePickerSeconds: false,
			timePicker24Hour: true,
			locale: locale()
		});

		$('#fecha_ingreso').daterangepicker({
			singleDatePicker: true,
			timePicker: true,
			timePickerSeconds: false,
			timePicker24Hour: true,
			locale: locale()
		});
	}

	// Private functions
	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation: https://formvalidation.io/
		validation = FormValidation.formValidation(
			form,
			{
				fields: {

					nombre:				{ validators: { notEmpty: { message: 'NOMBRE(S) es Requerido' }}},
					// apellido_paterno:	{ validators: { notEmpty: { message: 'APELLIDO PATERNO es Requerido' }}},
					// apellido_materno:	{ validators: { notEmpty: { message: 'APELLIDO MATERNO es Requerido' }}},
					fecha_nacimiento:	{ validators: { notEmpty: { message: 'FECHA DE NACIMIENTO es Requerido' }}},
					sexo_id:			{ validators: { notEmpty: { message: 'SEXO es Requerido' }}},
					// estado_civil_id:	{ validators: { notEmpty: { message: 'ESTADO CIVIL es Requerido' }}},
					// curp:				{ validators: { notEmpty: { message: 'CURP es Requerido' }}},
					// nacionalidad_id:	{ validators: { notEmpty: { message: 'NACIONALIDAD es Requerido' }}},
					// pais_nacimiento:	{ validators: { notEmpty: { message: 'PAIS DE NACIMIENTO es Requerido' }}},
					// entidad_nacimiento:	{ validators: { notEmpty: { message: 'ENTIDAD NACIMIENTO es Requerido' }}},

				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
						eleInvalidClass: 'is-invalid',
						eleValidClass: 'is-valid'
					})
				}
			}
		);
	}

	var handleForm = function () {
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form
			validation.validate().then(function (status) {
				if (status === 'Valid') {

					// submitButton.setAttribute('data-kt-indicator', 'on');
					// submitButton.disabled = true;

					// let dataForm = new FormData(form);
					var dataForm = $('#kt_captura_inicial_form').serialize();
					console.log(dataForm);
					// return;

					$.ajax({
						headers: {
						   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: base_url + 'expediente',
						type: 'POST',
						dataType: 'JSON',
						data: dataForm,
						beforeSend: function() {
							submitButton.setAttribute('data-kt-indicator', 'on');
							submitButton.disabled = true;
						},
						complete: function(respuesta) {
							submitButton.removeAttribute('data-kt-indicator');
							submitButton.disabled = false;
						},
						success: function (data) {
							if (data.st) {

								Swal.fire(data.title, data.msg, data.type);

								window.location = base_url + 'expediente/'+data.expediente_id+'/edit';

								// Swal.fire({
								// 	title: data.title,
								// 	html: data.msg,
								// 	icon: data.type,
								// 	showConfirmButton: true,
								// 	showCancelButton: false,
								// 	stopKeydownPropagation: false,
								// 	showDenyButton: false,
								// 	allowOutsideClick: false,
								// 	showCloseButton: false,
								// 	buttonsStyling: false,
								// 	confirmButtonText: "OK",
								// 	cancelButtonText: "Cancelar",
								// 	customClass: {
								// 		confirmButton: "btn btn-primary",
								// 		cancelButton: "btn btn-active-light"
								// 	}
								// }).then(function (result) {
								// 	if (result.value) {
								// 		if(data.redirect){
								// 			window.location = base_url + 'administracion/usuarios/'+data.u_id+'/edit';
								// 		}else{
								// 			window.location.reload();

								// 		}
								// 	}
								// });
							}else{
								Swal.fire(data.title, data.msg, data.type);
							}
						},
						error: function (xhr) {
							submitButton.removeAttribute('data-kt-indicator');
							submitButton.disabled = false;
							Swal.fire('¡ERROR!', xhr.responseText, 'error');
						}
					});
				} else {
					// Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
					Swal.fire({
						text: "Lo sentimos, parece que se han detectado algunos errores, inténtalo de nuevo.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Revisar formulario",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					});
				}
			});
		});
	}

	// Public methods
	return {
		init: function () {
			form = document.getElementById('kt_captura_inicial_form');
			submitButton = form.querySelector('#kt_captura_inicial_submit');

			initForm();
			initValidation();
			handleForm();
		}
	}
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTRegistroImplicado.init();
});
