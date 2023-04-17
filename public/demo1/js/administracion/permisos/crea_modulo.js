"use strict";

// Class definition
let KTPermissionsAddModul = function () {
	// Shared variables
	let element;
	let form;
	let modal;
	let validator;

	// Init add schedule modal
	let initAddModul = () => {

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'name': {
						validators: {
							notEmpty: {
								message: 'Nombre del Módulo es Obligatorio'
							}
						}
					},
					'acronym': {
						validators: {
							notEmpty: {
								message: 'Nombre del Acrónimo es Obligatorio'
							}
						}
					},
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
						eleInvalidClass: '',
						eleValidClass: ''
					})
				}
			}
		);

		// Close button handler
		let closeButton = element.querySelector('[data-kt-modul-modal-action="close"]');
		closeButton.addEventListener('click', e => {
			e.preventDefault();

			Swal.fire({
				text: "¿Estás seguro de que te gustaría cerrar?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "¡Si quiero cerrar!",
				cancelButtonText: "Regresar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					modal.hide(); // Hide modal				
				} 
			});
		});

		// Cancel button handler
		let cancelButton = element.querySelector('[data-kt-modul-modal-action="cancel"]');
		cancelButton.addEventListener('click', e => {
			e.preventDefault();

			Swal.fire({
				text: "¿Estás seguro de que te gustaría cancelar?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "¡Si, descartar formulario!",
				cancelButtonText: "Regresar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form	
					modal.hide(); // Hide modal	
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "¡Tu formulario no ha sido descartado!",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Regresar a formulario",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});

		 // Submit button handler
		 let submitButton = element.querySelector('[data-kt-modul-modal-action="submit"]');
		 submitButton.addEventListener('click', function (e) {
			 // Prevent default button action
			 e.preventDefault();
 
			 // Validate form before submit
			 if (validator) {
				 validator.validate().then(function (status) {
 
					 if (status == 'Valid') {

						let data = $('#kt_modal_add_modul_form').serialize();

						$.ajax({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							url: base_url + 'administracion/modulos',
							type: 'POST',
							dataType: 'JSON',
							data: data,
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

									Swal.fire({
										title: data.title,
										html: data.msg,
										icon: data.type,
										showConfirmButton: true,
										showCancelButton: false,
										stopKeydownPropagation: false,
										showDenyButton: false,
										allowOutsideClick: false,
										showCloseButton: false,
										buttonsStyling: false,
										confirmButtonText: "OK",
										cancelButtonText: "Cancelar",
										customClass: {
											confirmButton: "btn btn-primary",
											cancelButton: "btn btn-active-light"
										}
									}).then(function (result) {
										if (result.value) {
											window.location.reload();
										}
									});
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
						 // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						 Swal.fire({
							 text: "Lo sentimos, hay algunos errores, inténtalo de nuevo",
							 icon: "error",
							 buttonsStyling: false,
							 confirmButtonText: "Regresar",
							 customClass: {
								 confirmButton: "btn btn-primary"
							 }
						 });
					 }
				 });
			 }
		 });
		

	}

	// Modal Destroy handler
	let handleModalDestroy = () =>{

		$("#kt_modal_add_modul").on('hidden.bs.modal', function () {

			let backupModal = $('#kt_modal_add_modul').clone();
			$('#kt_modal_add_modul').remove();
			
			let modalClone = backupModal.clone();
			$('body').append(modalClone);
		});
	}

	return {
		// Public functions
		init: function () {

			$('body').on('click', '#boton_add_modul', function () {

				$('.fv-plugins-message-container.invalid-feedback').remove();
				element = document.getElementById('kt_modal_add_modul');
				form = element.querySelector('#kt_modal_add_modul_form');
				modal = bootstrap.Modal.getInstance(element);

				initAddModul();
				handleModalDestroy();
			});
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTPermissionsAddModul.init();
});