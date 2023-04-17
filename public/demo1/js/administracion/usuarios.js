"use strict";

// Class definition
var ModalGuardaUsuarios = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;
    var id;
    var postUrl;
    var dataString;
    var modal_titulo;
    var getUrl;

    // Carga Detalle Usuario
	// var load_target = function() {
	// 	$('#target_detalle_usuario').load(urlDetalle, null, function (responseText, textStatus, req) {
	// 		if(textStatus == "error"){
	// 			Swal.fire('¡!', responseText, 'warning');
	// 		}
	// 	});
	// }

	// Init form inputs
	var initForm = function() {

            $('body').on('click', '#boton_guarda_usuario', function () {

            	form.reset();
                id = $(this).attr('data-id');
                modal_titulo = id == 0 ? 'Agregar Usuario' : 'Editar Usuario';
                getUrl = id == 0 ? 'administracion/usuarios/create' : 'administracion/usuarios/'+id+'/edit';
                
                $('#modal_titulo').text(modal_titulo);

                if(id != 0) {
                    $.ajax({
                        headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: base_url + getUrl,
                        type: "GET",
                        dataType: "JSON",
                        // data: { mensaje: 'mensaje' },
                        success: function (data) {
                        	// console.log(data.user.info.avatar);

                            $('input[name="usuario"]').val(data.user.usuario);
                            $('input[name="nombre"]').val(data.user.nombre);
                            $('input[name="apellido_paterno"]').val(data.user.apellido_paterno);
                            $('input[name="apellido_materno"]').val(data.user.apellido_materno);
                            $('input[name="email"]').val(data.user.email);
                            $('input[name="telefono"]').val(data.user.info.telefono);
                            $('input[name="rfc"]').val(data.user.rfc);
                            $('input[name="curp"]').val(data.user.curp);
                            $('[name="roles"]').val(data.user_roles);
                            if (data.user.info.avatar !== null && data.user.info.avatar !== '') {
                            	$('.image-input-wrapper').css('background-image', 'url(' + base_url + 'avatars/' +  data.user.info.avatar + ')');
                            }else{
                            	$('.image-input-wrapper').css('background-image', 'url(' + base_url + 'avatars/blank.png)');
                            }

                            if (data.user.activo) {
                                $('input[name="activo"]').prop('checked', true);
                            } else {
                                $('input[name="activo"]').prop('checked', false);
                            }
                        },
                        error: function (xhr) {
                            Swal.fire('¡ERROR!', xhr.responseText, 'error');
                        }
                    });
                }else{
                	$('.image-input-wrapper').css('background-image', 'url(' + base_url + 'avatars/blank.png)');
                }
            });
	}

	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					usuario: {
						validators: {
							notEmpty: {
								message: 'Campo Usuario es Obligatorio'
							}
						}
					},
					nombre: {
						validators: {
							notEmpty: {
								message: 'Campo Nombre(s) es Obligatorio'
							}
						}
					},
					apellido_paterno: {
						validators: {
							notEmpty: {
								message: 'Campo Apellido Paterno es Obligatorio'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Campo Correo Electrónico es Obligatorio'
							}
						}
					},
					// password: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Campo Password es Obligatorio'
					// 		}
					// 	}
					// },
					// 'confirm-password': {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Campo Confirma Password es Obligatorio'
					// 		}
					// 	}
					// },
					// roles: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Target roles are required'
					// 		}
					// 	}
					// },
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

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					// console.log('validated!');

					if (status == 'Valid') {

						let dataForm = new FormData(form);
						// dataForm = new URLSearchParams(dataForm).toString();

						postUrl = id == 0 ? 'administracion/usuarios' : 'administracion/usuarios/gen/'+id;

						$.ajax({
							headers: {
							   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							url: base_url + postUrl,
							type: 'POST',
							dataType: 'JSON',
							enctype: 'multipart/form-data',							
							data: dataForm,
							processData: false,
							contentType: false,
							cache: false,
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
									form.reset(); // Reset form	
									modal.hide(); // Hide modal	
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
											if(data.redirect){
												window.location = base_url + 'administracion/usuarios/'+data.u_id+'/edit';
											}else{
												window.location.reload();

											}
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
						// Show error message.
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
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
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	// Modal Destroy handler
	let avatarRemove = () =>{

		$("#modal_guarda_usuarios").on('hidden.bs.modal', function () {
			$('#avatar_remove').removeAttr('value');
			$('.image-input').removeClass('image-input-empty');
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#modal_guarda_usuarios');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#modal_guarda_usuarios_form');
			submitButton = document.getElementById('modal_guarda_usuarios_submit');
			cancelButton = document.getElementById('modal_guarda_usuarios_cancel');

			initForm();
			handleForm();
			avatarRemove();
		}
	};
}();

KTUtil.onDOMContentLoaded(function () {
	ModalGuardaUsuarios.init();
});