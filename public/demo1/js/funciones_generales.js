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

		$.extend( true, $.fn.dataTable.defaults, {
			"language": {
				"decimal": ",",
				"thousands": ".",
				"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
				"infoPostFix": "",
				"infoFiltered": "(filtrado de un total de _MAX_ registros)",
				"loadingRecords": "Cargando...",
				"lengthMenu": "Mostrar _MENU_ registros",
				"paginate": {
					"first": "Primero",
					"last": "Último",
					"next": "Siguiente",
					"previous": "Anterior"
				},
				"processing": "Procesando...",
				"search": "Buscar:",
				"searchPlaceholder": "Término de búsqueda",
				"zeroRecords": "No se encontraron resultados",
				"emptyTable": "Ningún dato disponible en esta tabla",
				"aria": {
					"sortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sortDescending": ": Activar para ordenar la columna de manera descendente"
				},
				//only works for built-in buttons, not for custom buttons
				"buttons": {
					"create": "Nuevo",
					"edit": "Cambiar",
					"remove": "Borrar",
					"copy": "Copiar",
					"csv": "CSV",
					"excel": "Excel",
					"pdf": "PDF",
					"print": "Imprimir",
					"colvis": "Visibilidad columnas",
					"collection": "Colección",
					"upload": "Seleccione fichero...."
				},
				"select": {
					"rows": {
						_: '%d filas seleccionadas',
						0: 'clic fila para seleccionar',
						1: 'una fila seleccionada'
					}
				}
			}            
		} );        
	    
	    $('[data-onlydigits]').each(function () {
	    	var value_data = $(this).data('onlydigits');
	    	var data_arr = value_data.split('|');
	    	var $txt = $(this);
	    	
		    $txt.onlydigits(event,data_arr[0],data_arr[1]);	    
	    });

		$('[data-mask-phone]').each(function () {
	    	var $txt = $(this);
		   
			Inputmask({
				"mask" : "(99) 9999-9999"
			}).mask($txt);
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

		$('[data-kt-daterangepicker="true"]').each(function () {
			
	    	var $txt = $(this);
			var start = moment().subtract(29, "days");
			var end = moment();

		    $txt.daterangepicker({
				startDate: start,
				endDate: end,
				"locale": {
					"format": "DD-MM-YYYY",
					"separator": " - ",
					"applyLabel": "Aplicar",
					"cancelLabel": "Cancelar",
					"fromLabel": "Desde",
					"toLabel": "Hasta",
					"customRangeLabel": "Personalizar",
					"daysOfWeek": [
						"Do",
						"Lu",
						"Ma",
						"Mi",
						"Ju",
						"Vi",
						"Sa"
					],
					"monthNames": [
						"Enero",
						"Febrero",
						"Marzo",
						"Abril",
						"Mayo",
						"Junio",
						"Julio",
						"Agosto",
						"Setiembre",
						"Octubre",
						"Noviembre",
						"Diciembre"
					],
					"firstDay": 1
				},				
				"opens": "center",
				ranges: {
					"Hoy": [moment(), moment()],
					"Ayer": [moment().subtract(1, "days"), moment().subtract(1, "days")],
					"Últimos 7 Días": [moment().subtract(6, "days"), moment()],
					"Últimos 30 Días": [moment().subtract(29, "days"), moment()],
					"Este Mes": [moment().startOf("month"), moment().endOf("month")],
					"Mes Pasado": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
					}
            });	    
	    });
	    
	});
	
	
})(jQuery);



const alertSwalError = function (head_txt) {
    Swal.fire({
        text: head_txt,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok, verificar!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
}

const alertSwalSuccess = function (head_txt) {
    Swal.fire({
        text: head_txt,
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok, verificar!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
}


/**
 * Crea un objeto preloader que puede bloquear, desbloquear y destruir una interfaz de usuario.
 * @param {string} targetId - El ID del elemento en el que se mostrará la interfaz de usuario.
 * @returns {Object} Un objeto con métodos para bloquear, desbloquear y destruir la interfaz de usuario.
 */
const preloader = function(targetId) {
    // Busca el elemento con el ID especificado.
    const target = document.querySelector(`#${targetId}`);
    
    // Si no se encuentra el elemento, muestra un mensaje de error y devuelve null.
    if (!target) {
      console.error(`No se encontró ningún elemento con el id "${targetId}"`);
      return null;
    }
  
    // Crea un nuevo objeto KTBlockUI y configura la interfaz de usuario.
    let blockUI;
    try {
      blockUI = new KTBlockUI(target, {
        overlayClass: "bg-secondary bg-opacity-25",
        message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Procesando ...</div>',
      });
    } catch (err) {
      console.error(`No se pudo crear la interfaz de usuario. Error: ${err.message}`);
      return null;
    }
  
    // Devuelve un objeto con métodos para bloquear, desbloquear y destruir la interfaz de usuario.
    return {
      /**
       * Bloquea la interfaz de usuario.
       */
      block: function() {
        blockUI.block();
      },
  
      /**
       * Desbloquea la interfaz de usuario.
       */
      unblock: function() {
        blockUI.release();
      },
  
      /**
       * Destruye la interfaz de usuario.
       */
      destroy: function() {
        blockUI.destroy();
      }
    };
};