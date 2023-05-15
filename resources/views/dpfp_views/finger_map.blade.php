<x-base-layout>

    <style>
      .delta {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 20px solid red; /* Puedes cambiar el color aquí */
        }
        .punto {
            width: 20px;
            height: 20px;
            background-color: gray;
            border-radius: 50%;
        }
        .rect {
            width: 25px; /* Anchura del rectángulo */
            height: 13px; /* Altura del rectángulo */
            border: 1px solid red; /* Borde rojo de 2 píxeles */
            background-color: transparent; /* Fondo transparente */
        }
        .cir {
            width: 20px; /* Anchura del círculo */
            height: 20px; /* Altura del círculo */
            border: 1px solid red; /* Borde rojo de 2 píxeles */
            border-radius: 50%; /* Aplica el radio del 50% para crear el círculo */
            background-color: transparent; /* Fondo transparente */
        
        }

    </style>  
    <div class="row g-5 g-xl-10 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-2">
            <div class="card">
                
            
                <!--begin::Card body-->
                <div class="card-body ">
                    <div class="row ">
                        <div class="text-center">
                        <h4>Herramientas</h4>
                        </div>
                    </div>
                    
                    <div class="separator separator-dashed my-3"></div>

                    <div class="row mt-1">
                        <div class="col-md-2">
                            <input type="radio" name="tool" id="delta">
                        </div>
                        <div class="col-md-2">
                            <div class="delta"></div> 
                        </div>
                        <div class="col-md-6">
                            Delta
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-2">
                            <input type="radio" name="tool" id="punto">
                        </div>
                        <div class="col-md-2">
                            <div class="punto"></div> 
                        </div>
                        <div class="col-md-6">
                            Punto
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-2">
                            <input type="radio" name="tool" id="rect">
                        </div>
                        <div class="col-md-2">
                            <div class="rect"></div> 
                        </div>
                        <div class="col-md-6">
                            Area
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-md-2">
                            <input type="radio" name="tool" id="cir">
                        </div>
                        <div class="col-md-2">
                            <div class="cir"></div> 
                        </div>
                        <div class="col-md-6">
                             Núcleo
                        </div>
                    </div>
                    
                </div>
                <!--end::Card body-->
            </div>

        </div>
       
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">                
                        <div class="col-lg-6">
                            <img id="huella" src="{{asset('dpfp/images/finger.png')}}">
                        </div>          

                    </div>           
                    

                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <!-- Incluir jQuery -->
  

    <script type="text/javascript">
        $(document).ready(function() {
            // Obtener la posición de la imagen al hacer clic en ella

           
            $('img').click(function(event) {
                let marca_punto = $("input[name='tool']:checked").attr('id');
                

                var x = event.offsetX;
                var y = event.offsetY;

                // Crear un elemento div para la marca
                var marca = $('<div class="'+marca_punto+'"></div>');

                // Establecer la posición de la marca
                marca.css({
                    position: 'absolute',
                    left: x+20,
                    top: y+18
                });

                // Agregar la marca a la imagen
                $(this).parent().append(marca);
            });
        });
    </script>
    @endsection

</x-base-layout>