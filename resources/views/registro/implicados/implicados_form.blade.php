<x-base-layout>

	<x-slot name="actiontoolbar">
		<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_lista_implicados_modal">Lista Implicados</a>
	</x-slot>

<div class="card card-flush">
	<div class="card-body">

		<form id="kt_registro_implicado_form" class="form" method="post" action="{{ route('registro.implicados.store') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" onkeyup="upper(this)" />
			<div class="row mb-7">
				<div class="col-md-12 text-center">
					<h1>{{-- Registro Implicado --}}</h1>
					<div class="text-muted fw-bold fs-5">Los campos con (<label class="required"></label> ) son obligatorios</div>
				</div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_carpeta_investigacion">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Carpeta de Investigación</h3>
				</div>
				<div id="kt_carpeta_investigacion" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre los Datos de la Carpeta de Investigación.</div>

					{{-- @foreach($estatus_carpeta as $key)
						{{ dd( $carpeta->EstatusInvestigacion->id ) }}
					@endforeach --}}

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Número de Capeta de Investigación."><b style="font-size:10px">Info</b></div>
								<input type="text" id="carpeta_investigacion" name="carpeta_investigacion" value="{{ $carpeta->carpeta_investigacion ?? '' }}" placeholder="carpeta_investigacion" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="carpeta_investigacion"><span class="required">NÚMERO DE CAPETA DE INVESTIGACIÓN</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Estatus de la Carpeta de Investigación."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="estatus_investigacion_id" name="estatus_investigacion_id" placeholder="estatus_investigacion_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($estatus_carpeta as $sc)
										@if(isset($carpeta->EstatusInvestigacion->id) AND $carpeta->EstatusInvestigacion->id == $sc->id)
											<option value="{{ $sc->id }}" selected>{{ $sc->estatus_carpeta }}</option>
										@else
											<option value="{{ $sc->id }}">{{ $sc->estatus_carpeta }}</option>
										@endif
									@endforeach
								</select>
								<label for="estatus_investigacion_id"><span class="required">ESTATUS CARPETA DE INVESTIGACIÓN</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Número de Averiguación Previa."><b style="font-size:10px">Info</b></div>
								<input type="text" id="averiguacion_previa" name="averiguacion_previa" value="{{ $carpeta->averiguacion_previa ?? '' }}" placeholder="averiguacion_previa" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="averiguacion_previa">NÚMERO DE AVERIGUACIÓN PREVIA</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Delitos(s)."><b style="font-size:10px">Info</b></div>
								<textarea id="delito" name="delito" placeholder="delito" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $carpeta->delito ?? '' }}</textarea>
								<label for="delito">DELITO(S)</label>
							</div>
						</div>
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Descrpción del Delito."><b style="font-size:10px">Info</b></div>
								<textarea id="descripcion_delito" name="descripcion_delito" value="{{ $carpeta->descripcion_delito ?? '' }}" placeholder="descripcion_delito" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $carpeta->descripcion_delito ?? '' }}</textarea>
								<label for="descripcion_delito">DESCRPCIÓN DEL DELITO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Número Total de Implicados."><b style="font-size:10px">Info</b></div>
								<input type="text" id="total_implicados" name="total_implicados" value="{{ $carpeta->total_implicados ?? '' }}" placeholder="total_implicados" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="total_implicados">NÚMERO IMPLICADOS</label>
							</div>
						</div>

						{{-- <div class="col-md-6 fv-row">
							<label class="required fs-6 fw-semibold mb-2">Due Date</label>
							<div class="position-relative d-flex align-items-center">
								<span class="svg-icon svg-icon-2 position-absolute mx-4">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
										<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
										<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
									</svg>
								</span>
								<input class="form-control form-control-solid ps-12" placeholder="Select a date" name="due_date" />
							</div>
						</div> --}}

						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Hechos."><b style="font-size:10px">Info</b></div>
								<input type="text" id="fecha_hechos" name="fecha_hechos" value="{{ $carpeta->fecha_hechos ?? '' }}" placeholder="fecha_hechos" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="fecha_hechos">FECHA DE HECHOS</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Registro."><b style="font-size:10px">Info</b></div>
								<input type="text" id="fecha_registro" name="fecha_registro" value="{{ $carpeta->fecha_registro ?? '' }}" placeholder="fecha_registro" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="fecha_registro">FECHA DE REGISTRO</label>
							</div>
						</div>
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Observaciones."><b style="font-size:10px">Info</b></div>
								<textarea id="observaciones" name="observaciones" placeholder="observaciones" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $carpeta->observaciones ?? '' }}</textarea>
								<label for="observaciones">OBSERVACIONES</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_datos_personales">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Datos Personales</h3>
				</div>
				<div id="kt_datos_personales" class="collapse fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre los Datos Personales del Implicado.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Nombre del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="nombre" name="nombre" placeholder="nombre" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="nombre"><span class="required">NOMBRE(S)</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Paterno del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido_paterno" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="apellido_paterno">APELLIDO PATERNO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Materno del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido_materno" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="apellido_materno">APELLIDO MATERNO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Alias (Apodo) del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="alias" name="alias" placeholder="alias" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="alias">ALIAS (APODO)</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca RFC del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="rfc" name="rfc" placeholder="rfc" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="rfc">RFC</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca CURP del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="curp" name="curp" placeholder="curp" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="curp">CURP</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Nacimiento del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="fecha_nacimiento">FECHA DE NACIMIENTO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Estatura del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="estatura" name="estatura" placeholder="estatura" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="estatura">ESTATURA</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Celular del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="celular" name="celular" placeholder="celular" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="celular">No. CELULAR</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Telefono del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="telefono" name="telefono" placeholder="telefono" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="telefono">No. TELEFONO</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_datos_biograficos">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Datos Biograficos</h3>
				</div>
				<div id="kt_datos_biograficos" class="collapse fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre los Datos Biograficos del Implicado.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Nacionalidad del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="nacionalidad" name="nacionalidad" placeholder="nacionalidad" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="nacionalidad">NACIONALIDAD</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca País de Nacimiento del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="pais_nacimiento" name="pais_nacimiento" placeholder="pais_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="pais_nacimiento">PAÍS DE NACIMIENTO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Lugar de Nacimiento del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="lugar_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="lugar_nacimiento">LUGAR DE NACIMIENTO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Grado de Estudios del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="estudios" name="estudios" placeholder="estudios" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="estudios">GRADO DE ESTUDIOS</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Ocupación del Implicado."><b style="font-size:10px">Info</b></div>
								<input type="text" id="ocupacion" name="ocupacion" placeholder="ocupacion" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="ocupacion">OCUPACIÓN</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_domicilio_implicado">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Domicilio del Implicado</h3>
				</div>
				<div id="kt_domicilio_implicado" class="collapse fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre el Domicilio del Implicado.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Calle del Domicilio."><b style="font-size:10px">Info</b></div>
								<input type="text" id="calle" name="calle" placeholder="calle" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="calle">CALLE DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Exterior del Domicilio."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_exterior" name="numero_exterior" placeholder="numero_exterior" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_exterior">NO. EXTERIOR DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Interior del Domicilio."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_interior" name="numero_interior" placeholder="numero_interior" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_interior">NO. INTERIOR DEL DOMICILIO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Colonia del Domicilio."><b style="font-size:10px">Info</b></div>
								<input type="text" id="colonia" name="colonia" placeholder="colonia" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="colonia">COLONIA DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Delegación / Municipio del Domicilio."><b style="font-size:10px">Info</b></div>
								<input type="text" id="delegacion_municipio" name="delegacion_municipio" placeholder="delegacion_municipio" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="delegacion_municipio">DELEGACIÓN / MUNICIPIO DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Codogo Postal del Domicilio."><b style="font-size:10px">Info</b></div>
								<input type="text" id="codigo_postal" name="codigo_postal" placeholder="codigo_postal" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="codigo_postal">CODOGO POSTAL DEL DOMICILIO</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_lugar_delito">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Lugar del Delito</h3>
				</div>
				<div id="kt_lugar_delito" class="collapse fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre el Lugar del Delito.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca País del Delito del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="pais_delito" name="pais_delito" placeholder="pais_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="pais_delito">PAÍS DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Calle del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="calle_delito" name="calle_delito" placeholder="calle_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="calle_delito">CALLE DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Exterior del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_exterior_delito" name="numero_exterior_delito" placeholder="numero_exterior_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_exterior_delito">NO. EXTERIOR DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Interior del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_interior_delito" name="numero_interior_delito" placeholder="numero_interior_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_interior_delito">NO. INTERIOR DEL DELITO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Colonia del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="colonia_delito" name="colonia_delito" placeholder="colonia_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="colonia_delito">COLONIA DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Delegación / Municipio del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="delegacion_municipio_delito" name="delegacion_municipio_delito" placeholder="delegacion_municipio_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="delegacion_municipio_delito">DELEGACIÓN / MUNICIPIO DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Codogo Postal del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="codigo_postal_delito" name="codigo_postal_delito" placeholder="codigo_postal_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="codigo_postal_delito">CODOGO POSTAL DEL DELITO</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="row py-5">
				<div class="col-md-7 offset-md-5">
					<div class="d-flex">
						<button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Cancelar</button>
						<button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary" id="kt_registro_implicado_submit">
							<span class="indicator-label">Guadar</span>
							<span class="indicator-progress">Espere Por Favor...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

</x-base-layout>