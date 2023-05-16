"use strict";

// Class definition
var KTRegistroImplicado = function () {
	// Private variables
	var form;
	var submitButton;
	var validation;

	// Private functions
	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation: https://formvalidation.io/
		validation = FormValidation.formValidation(
			form,
			{
				fields: {

					carpeta_investigacion: 		{ validators: { notEmpty: { message: 'NÚMERO DE CAPETA DE INVESTIGACIÓN es Requerido' }}},
					// averiguacion_previa: 		{ validators: { notEmpty: { message: 'ESTATUS CARPETA DE INVESTIGACIÓN es Requerido' }}},
					// delito: 					{ validators: { notEmpty: { message: 'NÚMERO DE AVERIGUACIÓN PREVIA es Requerido' }}},
					// descripcion_delito: 		{ validators: { notEmpty: { message: 'DELITOS(S) es Requerido' }}},
					// total_implicados: 			{ validators: { notEmpty: { message: 'DESCRPCIÓN DEL DELITO es Requerido' }}},
					// observaciones: 				{ validators: { notEmpty: { message: 'NÚMERO IMPLICADOS es Requerido' }}},
					// fecha_hechos: 				{ validators: { notEmpty: { message: 'FECHA DE HECHOS es Requerido' }}},
					// fecha_registro: 			{ validators: { notEmpty: { message: 'FECHA DE REGISTRO es Requerido' }}},
					// estatus_investigacion_id: 	{ validators: { notEmpty: { message: 'OBSERVACIONES es Requerido' }}},

					// nombre: 			{ validators: { notEmpty: { message: 'NOMBRE(S) es Requerido' }}},
					// apellido_paterno: 	{ validators: { notEmpty: { message: 'APELLIDO PATERNO es Requerido' }}},
					// apellido_materno: 	{ validators: { notEmpty: { message: 'APELLIDO MATERNO es Requerido' }}},
					// alias: 				{ validators: { notEmpty: { message: 'APODO es Requerido' }}},
					// rfc: 				{ validators: { notEmpty: { message: 'RFC es Requerido' }}},
					// curp: 				{ validators: { notEmpty: { message: 'CURP es Requerido' }}},
					// fecha_nacimiento: 	{ validators: { notEmpty: { message: 'FECHA DE NACIMIENTO es Requerido' }}},
					// estatura: 			{ validators: { notEmpty: { message: 'ESTATURA es Requerido' }}},
					// celular: 			{ validators: { notEmpty: { message: 'No. CELULAR es Requerido' }}},
					// telefono: 			{ validators: { notEmpty: { message: 'No. TELEFONO es Requerido' }}},

					// nacionalidad: 		{ validators: { notEmpty: { message: 'NACIONALIDAD es Requerido' }}},
					// pais_nacimiento: 	{ validators: { notEmpty: { message: 'PAÍS DE NACIMIENTO es Requerido' }}},
					// lugar_nacimiento:	{ validators: { notEmpty: { message: 'LUGAR DE NACIMIENTO es Requerido' }}},
					// estudios: 			{ validators: { notEmpty: { message: 'GRADO DE ESTUDIOS es Requerido' }}},
					// ocupacion: 			{ validators: { notEmpty: { message: 'OCUPACIÓN es Requerido' }}},

					// calle: 					{ validators: { notEmpty: { message: 'CALLE DEL DOMICILIO es Requerido' }}},
					// numero_exterior: 		{ validators: { notEmpty: { message: 'NO. EXTERIOR DEL DOMICILIO es Requerido' }}},
					// numero_interior: 		{ validators: { notEmpty: { message: 'NO. INTERIOR DEL DOMICILIO es Requerido' }}},
					// colonia: 				{ validators: { notEmpty: { message: 'COLONIA DEL DOMICILIO es Requerido' }}},
					// delegacion_municipio:	{ validators: { notEmpty: { message: 'DELEGACIÓN / MUNICIPIO DEL DOMICILIO es Requerido' }}},
					// codigo_postal: 			{ validators: { notEmpty: { message: 'CODOGO POSTAL DEL DOMICILIO es Requerido' }}},

					// pais_delito: 					{ validators: { notEmpty: { message: 'PAÍS DEL DELITO es Requerido' }}},
					// calle_delito: 					{ validators: { notEmpty: { message: 'CALLE DEL DELITO es Requerido' }}},
					// numero_exterior_delito: 		{ validators: { notEmpty: { message: 'NO. EXTERIOR DEL DELITO es Requerido' }}},
					// numero_interior_delito: 		{ validators: { notEmpty: { message: 'NO. INTERIOR DEL DELITO es Requerido' }}},
					// colonia_delito: 				{ validators: { notEmpty: { message: 'COLONIA DEL DELITO es Requerido' }}},
					// delegacion_municipio_delito:	{ validators: { notEmpty: { message: 'DELEGACIÓN / MUNICIPIO DEL DELITO es Requerido' }}},
					// codigo_postal_delito: 			{ validators: { notEmpty: { message: 'CODOGO POSTAL DEL DELITO es Requerido' }}},

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
					var dataForm = $('#kt_registro_implicado_form').serialize();
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

					// // Send ajax request
					// axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
					// 	.then(function (response) {
					// 		// Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
					// 		Swal.fire({
					// 			text: "¡Gracias! Has actualizado tu información básica",
					// 			icon: "success",
					// 			buttonsStyling: false,
					// 			confirmButtonText: "Cerrar",
					// 			customClass: {
					// 				confirmButton: "btn btn-primary"
					// 			}
					// 		}).then(function (result) {
					// 			if (result.isConfirmed) {
					// 			}
					// 		});
					// 	})
					// 	.catch(function (error) {
					// 		let dataMessage = error.response.data.message;
					// 		let dataErrors = error.response.data.errors;

					// 		for (const errorsKey in dataErrors) {
					// 			if (!dataErrors.hasOwnProperty(errorsKey)) continue;
					// 			dataMessage += "\r\n" + dataErrors[errorsKey];
					// 		}

					// 		if (error.response) {
					// 			Swal.fire({
					// 				text: dataMessage,
					// 				icon: "error",
					// 				buttonsStyling: false,
					// 				confirmButtonText: "Ok, got it!",
					// 				customClass: {
					// 					confirmButton: "btn btn-primary"
					// 				}
					// 			});
					// 		}
					// 	})
					// 	.then(function () {
					// 		// always executed
					// 		// Hide loading indication
					// 		submitButton.removeAttribute('data-kt-indicator');

					// 		// Enable button
					// 		submitButton.disabled = false;
					// 	});
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
			form = document.getElementById('kt_registro_implicado_form');
			submitButton = form.querySelector('#kt_registro_implicado_submit');

			initValidation();
			handleForm();
		}
	}
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTRegistroImplicado.init();
});
