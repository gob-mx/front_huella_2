<?php

if (!function_exists('validateErrors')) {
	function validateErrors($request, $rules, $customMessages = [])
	{
		$validator = Validator::make($request->all(),$rules, $customMessages);

		if($validator->fails()){

			$errors = '<ol>';

			foreach ($validator->errors()->all() as $key => $value) {
				$errors .= '<li>'.$value.'</li>';
			}

			$errors .= '</ol>';
			
			return $errors;
		}

		return false;
	}
}

if (!function_exists('spanishDT')) {
    function spanishDT()
    {
        return [
            "decimal" => ",",
            "thousands" => ".",
            "info" => "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty" => "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoPostFix" => "",
            "infoFiltered" => "(filtrado de un total de _MAX_ registros)",
            "loadingRecords" => "Cargando...",
            "lengthMenu" => "Mostrar _MENU_ registros",
            "paginate" => [
                "first" => "Primero",
                "last" => "Último",
                "next" => "Siguiente",
                "previous" => "Anterior"
            ],
            "processing" => "Procesando...",
            "search" => "Buscar",
            "searchPlaceholder" => "Término de búsqueda",
            "zeroRecords" => "No se encontraron resultados",
            "emptyTable" => "Ningún dato disponible en esta tabla",
            "aria" => [
                "sortAscending" =>  " => Activar para ordenar la columna de manera ascendente",
                "sortDescending" => " => Activar para ordenar la columna de manera descendente"
            ],
            //only works for built-in buttons, not for custom buttons
            "buttons" => [
                "create" => "Nuevo",
                "edit" => "Cambiar",
                "remove" => "Borrar",
                "copy" => "Copiar",
                "csv" => "CSV",
                "excel" => "Excel",
                "pdf" => "PDF",
                "print" => "Imprimir",
                "colvis" => "Visibilidad columnas",
                "collection" => "Colección",
                "upload" => "Seleccione fichero...."
            ],
            "select" => [
                "rows" => [
                    '_' => '%d filas seleccionadas',
                    0 => 'clic fila para seleccionar',
                    1 => 'una fila seleccionada'
                ]
            ]
        ];
    }
}

if (!function_exists('domDT')) {
    function domDT()
    {
        return '<"row"
                    <"col-sm-12 col-md-6 p-3"B>
                    <"col-sm-12 col-md-6"f>
                >
                <"row"
                    <"col-sm-12"tr>
                >
                <"row"
                    <"col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"
                        <"dataTables_length"l>
                        <"dataTables_info"i>
                    >
                    <"col-sm-12 col-md-7"p>
                >';
    }
}