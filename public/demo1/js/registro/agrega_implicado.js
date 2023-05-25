"use strict";

// Class definition
var KTAgregaImplicado = function () {
	// Private variables
	var form;
	var submitButton;
	var validation;

	function locale() {
		return {
			format: 'YYYY-MM-DD HH:mm:ss',
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

	$('#fecha_hechos').daterangepicker({
		singleDatePicker: true,
		timePicker: true,
		timePickerSeconds: true,
		timePicker24Hour: true,
		locale: locale()
	});

	$('#fecha_registro').daterangepicker({
		singleDatePicker: true,
		timePicker: true,
		timePickerSeconds: true,
		timePicker24Hour: true,
		locale: locale()
	});

	// Private functions
	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation: https://formvalidation.io/
		validation = FormValidation.formValidation(
			form,
			{
				fields: {

					nombre:				{ validators: { notEmpty: { message: 'NOMBRE(S) es Requerido' }}},
					apellido_paterno:	{ validators: { notEmpty: { message: 'APELLIDO PATERNO es Requerido' }}},
					// apellido_materno:	{ validators: { notEmpty: { message: 'APELLIDO MATERNO es Requerido' }}},
					// alias:				{ validators: { notEmpty: { message: 'APODO es Requerido' }}},
					// rfc:					{ validators: { notEmpty: { message: 'RFC es Requerido' }}},
					// curp:				{ validators: { notEmpty: { message: 'CURP es Requerido' }}},
					// fecha_nacimiento:	{ validators: { notEmpty: { message: 'FECHA DE NACIMIENTO es Requerido' }}},
					// estatura:			{ validators: { notEmpty: { message: 'ESTATURA es Requerido' }}},
					// celular:				{ validators: { notEmpty: { message: 'No. CELULAR es Requerido' }}},
					// telefono:			{ validators: { notEmpty: { message: 'No. TELEFONO es Requerido' }}},

					// nacionalidad: 		{ validators: { notEmpty: { message: 'NACIONALIDAD es Requerido' }}},
					// pais_nacimiento: 	{ validators: { notEmpty: { message: 'PAÍS DE NACIMIENTO es Requerido' }}},
					// lugar_nacimiento:	{ validators: { notEmpty: { message: 'LUGAR DE NACIMIENTO es Requerido' }}},
					// estudios: 			{ validators: { notEmpty: { message: 'GRADO DE ESTUDIOS es Requerido' }}},
					// ocupacion: 			{ validators: { notEmpty: { message: 'OCUPACIÓN es Requerido' }}},

					// calle:					{ validators: { notEmpty: { message: 'CALLE DEL DOMICILIO es Requerido' }}},
					// numero_exterior:			{ validators: { notEmpty: { message: 'NO. EXTERIOR DEL DOMICILIO es Requerido' }}},
					// numero_interior:			{ validators: { notEmpty: { message: 'NO. INTERIOR DEL DOMICILIO es Requerido' }}},
					// colonia:					{ validators: { notEmpty: { message: 'COLONIA DEL DOMICILIO es Requerido' }}},
					// delegacion_municipio:	{ validators: { notEmpty: { message: 'DELEGACIÓN / MUNICIPIO DEL DOMICILIO es Requerido' }}},
					// codigo_postal:			{ validators: { notEmpty: { message: 'CODOGO POSTAL DEL DOMICILIO es Requerido' }}},

					// pais_delito:					{ validators: { notEmpty: { message: 'PAÍS DEL DELITO es Requerido' }}},
					// calle_delito:				{ validators: { notEmpty: { message: 'CALLE DEL DELITO es Requerido' }}},
					// numero_exterior_delito:		{ validators: { notEmpty: { message: 'NO. EXTERIOR DEL DELITO es Requerido' }}},
					// numero_interior_delito:		{ validators: { notEmpty: { message: 'NO. INTERIOR DEL DELITO es Requerido' }}},
					// colonia_delito:				{ validators: { notEmpty: { message: 'COLONIA DEL DELITO es Requerido' }}},
					// delegacion_municipio_delito:	{ validators: { notEmpty: { message: 'DELEGACIÓN / MUNICIPIO DEL DELITO es Requerido' }}},
					// codigo_postal_delito:		{ validators: { notEmpty: { message: 'CODOGO POSTAL DEL DELITO es Requerido' }}},

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

		// Select2 validation integration
		$(form.querySelector('[name="country"]')).on('change', function () {
			// Revalidate the color field when an option is chosen
			validation.revalidateField('country');
		});

		$(form.querySelector('[name="language"]')).on('change', function () {
			// Revalidate the color field when an option is chosen
			validation.revalidateField('language');
		});

		$(form.querySelector('[name="timezone"]')).on('change', function () {
			// Revalidate the color field when an option is chosen
			validation.revalidateField('timezone');
		});
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
					var dataForm = $('#kt_agrega_implicado_form').serialize();
					console.log(dataForm);
					// return;

					$.ajax({
						headers: {
						   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: base_url + 'registro/implicados',
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

								window.location = base_url + 'registro/implicados/'+data.ci_id+'/edit';
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
			form = document.getElementById('kt_agrega_implicado_form');
			submitButton = form.querySelector('#kt_agrega_implicado_submit');

			// initForm();
			initValidation();
			handleForm();
		}
	}
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTAgregaImplicado.init();
});
