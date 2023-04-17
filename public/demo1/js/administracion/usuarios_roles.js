"use strict";

// Class definition
var KTUsersUpdatePermissions = function () {
    // Shared variables
    var id;
    const form = document.getElementById('kt_modal_update_role_form');
    const submitButton = form.querySelector('#kt_modal_update_role_submit');
    const cancelButton = form.querySelector('#kt_modal_update_role_cancel');
    const validator = FormValidation.formValidation(
        form,
        {
            fields: {
                'roles[]': {
                    validators: {
                        notEmpty: {
                            message: 'Almenos debe elegir un rol'
                        }
                    }
                },
                // 'permisos[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Almenos debe elegir un permiso'
                //         }
                //     }
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

    // Email preference form handler
    const initUpdatePermissions = () => {

        

        // Submit action handler
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            id = $(this).attr('data-id');

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click 
                        submitButton.disabled = true;

                        var dataString = $('#kt_modal_update_role_form').serialize();
                        console.log(dataString);
                        // return;

                        $.ajax({
                            headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: base_url + 'administracion/usuarios/'+id,
                            type: 'PUT',
                            dataType: 'JSON',
                            data: dataString,
                            beforeSend: function() {
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

                        // setTimeout(function () {
                        //     submitButton.removeAttribute('data-kt-indicator');

                        //     submitButton.disabled = false;

                        //     Swal.fire({
                        //         text: "Form has been successfully submitted!",
                        //         icon: "success",
                        //         buttonsStyling: false,
                        //         confirmButtonText: "Ok, got it!",
                        //         customClass: {
                        //             confirmButton: "btn btn-primary"
                        //         }
                        //     }).then(function (result) {
                        //         if (result.isConfirmed) {
                        //             modal.hide();
                        //         }
                        //     });

                        // }, 2000);
                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
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

        cancelButton.addEventListener('click', e => {
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

    // Select all handler
    const handleSelectAll = () => {
        // Define variables
        const selectAll = form.querySelector('#kt_roles_select_all');
        const allCheckboxes = form.querySelectorAll('input[name^="roles"]');

        // Handle check state
        selectAll.addEventListener('change', e => {

            // Apply check state to all checkboxes
            allCheckboxes.forEach(c => {
                c.checked = e.target.checked;
            });
            validator.revalidateField('roles[]');
        });

        $(".permisosSpan").click(function(){

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
            // validator.revalidateField('permisos[]');
        });

        // Define variables
        let selectAllP = form.querySelector('#kt_permisos_select_all');
        let allCheckboxesP = form.querySelectorAll('input[name^="permisos"]');
        let labelCheckboxesP = form.querySelectorAll('.badge-lg');

        // Handle check state
        selectAllP.addEventListener('change', e => {

            // Apply check state to all checkboxes
            allCheckboxesP.forEach(c => {
                c.checked = e.target.checked;

                labelCheckboxesP.forEach(labels => {
                
                    if (c.checked) {
                        labels.classList.add("badge-light-primary");
                        labels.classList.remove("badge-light-danger");
                    } else {
                        labels.classList.remove("badge-light-primary");
                        labels.classList.add("badge-light-danger");
                    }
                });
            });

            // validator.revalidateField('permisos[]');
        });
    }


    return {
        // Public functions
        init: function () {
            initUpdatePermissions();
            handleSelectAll();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePermissions.init();
});