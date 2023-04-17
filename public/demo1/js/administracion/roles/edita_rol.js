"use strict";

// Class definition
let KTUsersUpdatePermissions = function () {
	// Shared variables
	let element;
	let form;
	let modal;
	let id;
	let validator;

	// Init add schedule modal
	let initUpdatePermissions = () => {

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'name': {
						validators: {
							notEmpty: {
							   message: 'Nombre Rol es Requerido'
							}
						}
					},
					'permisos[]': {
						validators: {
							notEmpty: {
								message: 'Almenos debe elegir un permiso'
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
		let closeButton = element.querySelector('[data-kt-roles-modal-action="close"]');
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
		let cancelButton = element.querySelector('[data-kt-roles-modal-action="cancel"]');
		cancelButton.addEventListener('click', e => {
			e.preventDefault();

			Swal.fire({
				text: "¿Estás seguro de que te gustaría cancelar?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "¡Si, descartar cambios!",
				cancelButtonText: "Regresar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form	
					modal.hide(); // Hide modal	

					let labelCheckboxes = form.querySelectorAll('.permisosSpan_'+id);
					labelCheckboxes.forEach(permisos => {
						let permisoCheck = permisos.querySelector('.permisos');
						let permisosLabel = permisos.querySelector('.permisosLabel');
						if (permisoCheck.checked) {
							permisosLabel.classList.add("badge-light-primary");
							permisosLabel.classList.remove("badge-light-danger");
						} else {
							permisosLabel.classList.remove("badge-light-primary");
							permisosLabel.classList.add("badge-light-danger");
						}
					});
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
		let submitButton = element.querySelector('[data-kt-roles-modal-action="submit"]');
		submitButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			let dataForm = new FormData(form);
			let data = new URLSearchParams(dataForm).toString();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {

					if (status == 'Valid') {

						$.ajax({
							headers: {
							   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							url: base_url + 'administracion/roles/'+id,
							type: 'PUT',
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

	// Select all handler
	let handleSelectAll = () => {

		$("#kt_modal_update_role_"+id).on('hidden.bs.modal', function () {

			let myBackup = $('#kt_modal_update_role_'+id).clone();
			$('#kt_modal_update_role_'+id).remove();
			
			let myClone = myBackup.clone();
			$('body').append(myClone);
		});

		$(".permisosSpan_"+id).click(function(){

			let permisoCheck = this.querySelector('.permisos');
			let permisosLabel = this.querySelector('.permisosLabel');

			// console.log(permisoCheck);

			if (permisoCheck.checked) {
				permisoCheck.checked = false;
			}else{
				permisoCheck.checked = "checked";
			}

			   if (permisoCheck.checked) {
					permisosLabel.classList.add("badge-light-primary");
					permisosLabel.classList.remove("badge-light-danger");
				} else {
					permisosLabel.classList.remove("badge-light-primary");
					permisosLabel.classList.add("badge-light-danger");
				}
			validator.revalidateField('permisos[]');
		});

		// Define variables
		let selectAll = form.querySelector('#kt_roles_select_all_'+id);
		let allCheckboxes = form.querySelectorAll('[type="checkbox"]');
		let labelCheckboxes = form.querySelectorAll('.badge-lg');

		// Handle check state
		selectAll.addEventListener('change', e => {

			// Apply check state to all checkboxes
			allCheckboxes.forEach(c => {
				c.checked = e.target.checked;

				labelCheckboxes.forEach(labels => {
				
					if (c.checked) {
						labels.classList.add("badge-light-primary");
						labels.classList.remove("badge-light-danger");
					} else {
						labels.classList.remove("badge-light-primary");
						labels.classList.add("badge-light-danger");
					}
				});
			});

			validator.revalidateField('permisos[]');
		});
	}

	return {
		// Public functions
		init: function () {

			$('body').on('click', '#boton_update', function () {

				$('.fv-plugins-message-container.invalid-feedback').remove();
				id = $(this).attr('data-id')
				element = document.getElementById('kt_modal_update_role_'+id);
				form = element.querySelector('#kt_modal_update_role_form_'+id);
				modal = bootstrap.Modal.getInstance(element);

				initUpdatePermissions();
				handleSelectAll();
			});
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTUsersUpdatePermissions.init();
});