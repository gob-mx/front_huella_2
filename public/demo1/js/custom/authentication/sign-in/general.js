"use strict";

// Class definition
var KTSigninGeneral = function () {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function (e) {
        let tipo_login = form.querySelector('[id="tipo_login"]').value

        
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'usuario': {
                        validators: {
                            notEmpty: {
                                message: 'El '+tipo_login+' es requerido'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'La contraseña es requerida'
                            },
                            callback: {
                                message: 'Por favor ingrese una contraseña',
                            }
                        }
                    }
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

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Simulate ajax request
                    axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Identificación Exitosa!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, ingresar!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                //alert(tipo_login);
                                if (result.isConfirmed) {
                                    form.querySelector('[name="usuario"]').value = "";
                                    form.querySelector('[name="password"]').value = "";
                                    window.location.reload();
                                }
                            });
                        })
                        .catch(function (error) {
                            let dataMessage = error.response.data.message;
                            //let dataErrors = error.response.data.errors;

                            /*for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }*/

                            if (error.response) {
                                Swal.fire({
                                    text: dataMessage,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Cerrar",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Lo sentimos, parece que se han detectado algunos errores, inténtalo de nuevo.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});


  /**
 * 
 * Definicion de Funciones que se cargan en el dom  principal y se activan  mediante un  estilo  o etiqueta definida
 * 
 * 
 */
   (function ($) {
	
	'use strict';
	var EVENT_KEY = '.bs.text';
	
	/**
	 * 
	 *	Esta funcion se activa al agregar el estilo "text-uppercase" en el campo.
	 *	Ejemplo: <input type="text" class="text-uppercase">
	 *  El estilo ya se encuentra definido en Metronic. 
	 *  Se aplica regla "toUpperCase"  para que el campo se transforme no solo por el CSS, si no el value directamente.  
	 * 
	 */
	
	$.fn.uppercase = function() {
	    $(this).keyup(function(event) {
	        
	        var txt = $(this).val();
	       
	        $(this).val(txt.toUpperCase());
	    });

	   return this;
	}
	/**
	 * 
	 * Para Activar  la funcion se debe agregar una etiqueta de tipo data:  data-onlydigits="true|false"
	 * Ejemplo:  <input type="text" data-onlydigits="true|false">
	 * El Primer valor indica que se permite el uso de decimales ".", el segundo el uso  de guion  medio "-"
	 * En caso de no requerir alguno, se debe marcar en false o dejarse  vacio, en caso de  dejarlo vacio, solo se permitiran numeros  del 0 al 9 
	 * Es decir:  data-onlydigits="false|false" es  lo mismo  que dejarlo vacio data-onlydigits
	 * 
	 **/
	$.fn.onlydigits = function(e,decReq,guion) {

	    $(this).keypress(function(e) {	    	
			
	    	var isIE = document.all?true:false;
	        var isNS = document.layers?true:false;
	        var key = (isIE) ? window.event.keyCode : e.which;
	        var obj = (isIE) ? event.srcElement : e.target;
	        var isNum = (key > 46 && key < 58 && key!=47) ? true:false;
	        var dotOK = (key==46 && decReq=='true' && (obj.value.indexOf(".") < 0 || obj.value.length==0)) ? true:false;
	        var guionOK = (key==45 && guion=='true' && (obj.value.indexOf("-") < 0 || obj.value.length==0)) ? true:false;
	        if(key < 32)
	         return true;
	         return (isNum || dotOK || guionOK);
	    });	 
	}
	
	$.fn.onlyletters = function(e) {

	    $(this).keypress(function(e) {	    	
	    		var tecla = document.all?true:false;
	    		var key = (tecla) ? window.event.keyCode : e.which;
	    		
	    	    if (key == 8 || key == 32) {
	    	        return true;
	    	    }
	    	 
	    	    //var patron = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
	    	    var patron = /^[a-zA-ZñÑ]+(?: [a-zA-ZñÑ]+)*$/;
	    	    var tecla_final = String.fromCharCode(key);
	    	    return patron.test(tecla_final);
	    });	 
    }
    
    $.fn.onlylettersandnumbers = function(e) {

        $(this).keypress(function(e) {	    	
                var tecla = document.all?true:false;
                var key = (tecla) ? window.event.keyCode : e.which;
                
                if (key == 8) {
                    return true;
                }
             
                var patron = /^[a-zA-Z0-9]*$/;
                var tecla_final = String.fromCharCode(key);
                return patron.test(tecla_final);
        });	 
    }
	
	$.fn.datemask = function() {
	    	/*$(this).inputmask( {                    
	            mask: "99-99-9999", 
	            placeholder: "dd-mm-yyyy", 
	            //leapday: "-02-29", 
	            separator: "-", 
	            alias: "dd-mm-yyyy"
	        });*/
	}
	
	

	$(window).on('load' + EVENT_KEY + '.data-api', function () {
	    $('.text-uppercase').each(function () {	    
		      var $txt = $(this);
		      $txt.uppercase();	    
	    })
	    
	    $('[data-onlydigits]').each(function () {
	    	var value_data = $(this).data('onlydigits');
	    	var data_arr = value_data.split('|');
	    	var $txt = $(this);
	    	
		    $txt.onlydigits(event,data_arr[0],data_arr[1]);	    
	    });
	    
	    $('[data-datemask]').each(function () {
	    	var $txt = $(this);
	    	
		    $txt.datemask();	    
	    });
	    
	    $('[data-onlyletters]').each(function () {
	    	var $txt = $(this);
	    	
		    $txt.onlyletters(event);	    
        });
        
        $('[data-onlylettersandnumbers]').each(function () {
	    	var $txt = $(this);
	    	
		    $txt.onlylettersandnumbers(event);	    
        });	

        $('[data-datepicker]').each(function () {
	    	var $txt = $(this);
	    	
		    $txt.datepicker({
                todayBtn: "linked",
                format: 'dd-mm-yyyy',            
                autoclose: true,
                clearBtn: false,
                todayHighlight: false,           
            });	    
	    });
	    
	});
	
	
})(jQuery);
