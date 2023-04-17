"use strict";

// Class definition
let KTAddPermissions = function () {
	// Shared variables
	let element;
	let form;
	let modal;
	let modul_id;
	let modulo;
	let acronimo;
	let validator;

	// Init add schedule modal
	let initAddPermission = () => {

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'nombre': {
						validators: {
							notEmpty: {
								message: 'Nombre del Módulo es Obligatorio'
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
		let closeButton = element.querySelector('[data-kt-permissions-modal-action="close"]');
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
		let cancelButton = element.querySelector('[data-kt-permissions-modal-action="cancel"]');
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
		 let submitButton = element.querySelector('[data-kt-permissions-modal-action="submit"]');
		 submitButton.addEventListener('click', function (e) {
			 // Prevent default button action
			 e.preventDefault();
 
			 // Validate form before submit
			 if (validator) {
				 validator.validate().then(function (status) {
 
					 if (status == 'Valid') {

						let data = $('#kt_modal_add_permission_form').serialize();

						$.ajax({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							url: base_url + 'administracion/permisos',
							type: 'POST',
							dataType: 'JSON',
							data: data+'&modul_id='+modul_id,
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

	// Select all handler
	let handleSelectAll = () =>{

		$("#kt_modal_add_permission").on('hidden.bs.modal', function () {

			let myBackup = $('#kt_modal_add_permission').clone();
			$('#kt_modal_add_permission').remove();
			
			let myClone = myBackup.clone();
			$('body').append(myClone);
		});

		form.querySelector('.labelModulo').innerHTML = modulo;
		form.querySelector('.labelPermiso').innerHTML = '_'+acronimo;

		let inputNombre = form.querySelector('#nombre');

		inputNombre.addEventListener('keyup', input => {

			let nombrePermiso = input.target.value;

			form.querySelector('.labelPermiso').innerHTML = nombrePermiso+'_'+acronimo;
			form.querySelector('.classColor').classList.add("d-inline-block");

			if (nombrePermiso == '') {
				form.querySelector('#name').value = '';
			} else {
				let name = form.querySelector('#name').value = nombrePermiso+'_'+acronimo;
			}
		});
	}

	return {
		// Public functions
		init: function () {

			$('body').on('click', '.boton_add_permiso', function () {

				$('.fv-plugins-message-container.invalid-feedback').remove();
				modul_id = $(this).attr('data-index');
				modulo = $(this).attr('data-modulo');
				acronimo = $(this).attr('data-acronimo');
				element = document.getElementById('kt_modal_add_permission');
				form = element.querySelector('#kt_modal_add_permission_form');
				modal = bootstrap.Modal.getInstance(element);

				initAddPermission();
				handleSelectAll();
			});
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTAddPermissions.init();
});