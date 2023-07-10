<x-base-layout>

	<x-slot name="actiontoolbar">
		<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_lista_implicados_modal">Lista Implicados</a>
	</x-slot>

	<form id="kt_captura_inicial_form" class="form" method="post" action="{{ route('expediente.store') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" onkeyup="upper(this)" />


	<div class="card card-flush mb-5">
		<div class="card-body">

			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="label_carpeta">Registro Expediente</h1>
					<div class="text-muted fw-bold fs-5">Los campos con (<label class="required"></label> ) son obligatorios</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card card-flush mb-5">
		<div class="card-body">
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
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Personales</h3>
				</div>
				<div id="kt_carpeta_investigacion" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre los Datos Personales.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Nombre(s)."><b style="font-size:10px">Info</b></div>
								<input type="text" id="nombre" name="nombre" value="{{ $expediente->Persona->nombre ?? '' }}" placeholder="nombre" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="nombre"><span class="required">NOMBRE(S)</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Paterno."><b style="font-size:10px">Info</b></div>
								<input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ $expediente->Persona->apellido_paterno ?? '' }}" placeholder="apellido_paterno" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="apellido_paterno">APELLIDO PATERNO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Materno."><b style="font-size:10px">Info</b></div>
								<input type="text" id="apellido_materno" name="apellido_materno" value="{{ $expediente->Persona->apellido_materno ?? '' }}" placeholder="apellido_materno" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="apellido_materno">APELLIDO MATERNO</label>
							</div>
						</div>
					</div>
					<div class="row fv-row">
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Nacimiento."><b style="font-size:10px">Info</b></div>
								<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $expediente->Persona->fecha_nacimiento ?? '' }}" placeholder="fecha_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="fecha_nacimiento">FECHA DE NACIMIENTO</label>
							</div>
						</div>
						<div class="col-md-3 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca el Sexo."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="sexo_id" name="sexo_id" placeholder="sexo_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($sexo as $sx)
										@if(isset($expediente->Persona->sexo_id) AND $expediente->Persona->Sexo->id == $sx->id)
											<option value="{{ $sx->id }}" selected>{{ $sx->sexo }}</option>
										@else
											<option value="{{ $sx->id }}">{{ $sx->sexo }}</option>
										@endif
									@endforeach
								</select>
								<label for="sexo_id"><span class="required">SEXO</span></label>
							</div>
						</div>
						<div class="col-md-3 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Estado Civil."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="estado_civil_id" name="estado_civil_id" placeholder="estado_civil_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($estado_civil as $ec)
										@if(isset($expediente->Persona->estado_civil_id) AND $expediente->Persona->EstadoCivil->id == $ec->id)
											<option value="{{ $ec->id }}" selected>{{ $ec->estado_civil }}</option>
										@else
											<option value="{{ $ec->id }}">{{ $ec->estado_civil }}</option>
										@endif
									@endforeach
								</select>
								<label for="estado_civil_id"><span class="required">ESTADO CIVIL</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca CURP."><b style="font-size:10px">Info</b></div>
								<input type="text" id="curp" name="curp" value="{{ $expediente->Persona->curp ?? '' }}" placeholder="curp" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="curp">CURP</label>
							</div>
						</div>
					</div>
					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Nacionalidad."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="nacionalidad_id" name="nacionalidad_id" placeholder="nacionalidad_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($nacionalidad as $na)
										@if(isset($expediente->Persona->nacionalidad_id) AND $expediente->Persona->nacionalidad_id == $na->id)
											<option value="{{ $na->id }}" selected>{{ $na->nacionalidad }}</option>
										@else
											<option value="{{ $na->id }}">{{ $na->nacionalidad }}</option>
										@endif
									@endforeach
								</select>
								<label for="nacionalidad_id"><span class="required">NACIONALIDAD</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Pais de Nacimiento."><b style="font-size:10px">Info</b></div>
								<input type="text" id="pais_nacimiento" name="pais_nacimiento" value="{{ $expediente->Persona->pais_nacimiento ?? '' }}" placeholder="pais_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="pais_nacimiento">PAIS DE NACIMIENTO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Entidad de Nacimiento."><b style="font-size:10px">Info</b></div>
								<input type="text" id="entidad_nacimiento" name="entidad_nacimiento" value="{{ $expediente->Persona->entidad_nacimiento ?? '' }}" placeholder="entidad_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="entidad_nacimiento">ENTIDAD NACIMIENTO</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card card-flush mb-5">
		<div class="card-body">
			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_domicilio">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Domicilio</h3>
				</div>
				<div id="kt_domicilio" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre Domicilio.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Calle."><b style="font-size:10px">Info</b></div>
								<input type="text" id="calle" name="calle" value="{{ $expediente->Persona->Domicilio->calle ?? '' }}" placeholder="calle" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="calle">CALLE</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Exterior."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_exterior" name="numero_exterior" value="{{ $expediente->Persona->Domicilio->numero_exterior ?? '' }}" placeholder="numero_exterior" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_exterior">NO. EXTERIOR</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Interior."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_interior" name="numero_interior" value="{{ $expediente->Persona->Domicilio->numero_interior ?? '' }}" placeholder="numero_interior" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_interior">NO. INTERIOR</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Colonia."><b style="font-size:10px">Info</b></div>
								<input type="text" id="colonia" name="colonia" value="{{ $expediente->Persona->Domicilio->colonia ?? '' }}" placeholder="colonia" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="colonia">COLONIA</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-3 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Delegación / Municipio."><b style="font-size:10px">Info</b></div>
								<input type="text" id="delegacion_municipio" name="delegacion_municipio" value="{{ $expediente->Persona->Domicilio->delegacion_municipio ?? '' }}" placeholder="delegacion_municipio" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="delegacion_municipio">DELEGACIÓN / MUNICIPIO</label>
							</div>
						</div>
						<div class="col-md-3 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Codogo Postal."><b style="font-size:10px">Info</b></div>
								<input type="text" id="codigo_postal" name="codigo_postal" value="{{ $expediente->Persona->Domicilio->codigo_postal ?? '' }}" placeholder="codigo_postal" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="codigo_postal">CODOGO POSTAL</label>
							</div>
						</div>
						<div class="col-md-3 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Ciudad."><b style="font-size:10px">Info</b></div>
								<input type="text" id="ciudad" name="ciudad" value="{{ $expediente->Persona->Domicilio->ciudad ?? '' }}" placeholder="ciudad" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="ciudad">CIUDAD</label>
							</div>
						</div>
						<div class="col-md-3 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca País."><b style="font-size:10px">Info</b></div>
								<input type="text" id="pais" name="pais" value="{{ $expediente->Persona->Domicilio->pais ?? '' }}" placeholder="pais" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="pais">PAÍS</label>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="card card-flush mb-5">
		<div class="card-body">
			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_senias_particulares">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Señas Particulares</h3>
				</div>
				<div id="kt_senias_particulares" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre Señas Particulares.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Peso."><b style="font-size:10px">Info</b></div>
								<input type="text" id="peso" name="peso" value="{{ $expediente->Persona->peso ?? '' }}" placeholder="peso" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="peso">PESO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Estatura."><b style="font-size:10px">Info</b></div>
								<input type="text" id="estatura" name="estatura" value="{{ $expediente->Persona->estatura ?? '' }}" placeholder="estatura" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="estatura">ESTATURA</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Seña Particular."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="senia_particular_id" name="senia_particular_id" placeholder="senia_particular_id">
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($senia_particular as $sp)
										@if(isset($expediente->Persona->senia_particular_id) AND $expediente->Persona->EstadoCivil->id == $sp->id)
											<option value="{{ $sp->id }}" selected>{{ $sp->senia_particular }}</option>
										@else
											<option value="{{ $sp->id }}">{{ $sp->senia_particular }}</option>
										@endif
									@endforeach
								</select>
								<label for="senia_particular_id"><span class="required">SEÑA PARTICULAR</span></label>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="card card-flush mb-5">
		<div class="card-body">
			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_expediente">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Expediente</h3>
				</div>
				<div id="kt_expediente" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre Expediente.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Código Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="codigo_delito" name="codigo_delito" value="{{ $expediente->codigo_delito ?? '' }}" placeholder="codigo_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="codigo_delito">CÓDIGO DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Tipo Registro."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="tipo_registro_id" name="tipo_registro_id" placeholder="tipo_registro_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($tipo_registro as $tr)
										@if(isset($expediente->tipo_registro_id) AND $expediente->tipo_registro_id == $tr->id)
											<option value="{{ $tr->id }}" selected>{{ $tr->tipo_registro }}</option>
										@else
											<option value="{{ $tr->id }}">{{ $tr->tipo_registro }}</option>
										@endif
									@endforeach
								</select>
								<label for="tipo_registro_id"><span class="required">TIPO REGISTRO</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Tipo Policía."><b style="font-size:10px">Info</b></div>
								<input type="text" id="tipo_policia" name="tipo_policia" value="{{ $expediente->tipo_policia ?? '' }}" placeholder="tipo_policia" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="tipo_policia">TIPO POLICÍA</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Situacion de Persona."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="situacion_persona_id" name="situacion_persona_id" placeholder="situacion_persona_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($situacion_persona as $sp)
										@if(isset($expediente->situacion_persona_id) AND $expediente->situacion_persona_id == $sp->id)
											<option value="{{ $sp->id }}" selected>{{ $sp->situacion_persona }}</option>
										@else
											<option value="{{ $sp->id }}">{{ $sp->situacion_persona }}</option>
										@endif
									@endforeach
								</select>
								<label for="situacion_persona_id"><span class="required">SITUACION DE PERSONA</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Información."><b style="font-size:10px">Info</b></div>
								<input type="text" id="informacion" name="informacion" value="{{ $expediente->informacion ?? '' }}" placeholder="informacion" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="informacion">INFORMACIÓN</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Peligrosidad."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="peligrosidad_id" name="peligrosidad_id" placeholder="peligrosidad_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($peligrosidad as $pl)
										@if(isset($expediente->peligrosidad_id) AND $expediente->peligrosidad_id == $pl->id)
											<option value="{{ $pl->id }}" selected>{{ $pl->peligrosidad }}</option>
										@else
											<option value="{{ $pl->id }}">{{ $pl->peligrosidad }}</option>
										@endif
									@endforeach
								</select>
								<label for="peligrosidad_id"><span class="required">PELIGROSIDAD</span></label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Ingreso."><b style="font-size:10px">Info</b></div>
								<input type="text" id="fecha_ingreso" name="fecha_ingreso" value="{{ $expediente->fecha_ingreso ?? '' }}" placeholder="fecha_ingreso" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="fecha_ingreso">FECHA DE INGRESO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Registros Nacionales."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="registros_nacionales_id" name="registros_nacionales_id" placeholder="registros_nacionales_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($registros_nacionales as $rn)
										@if(isset($expediente->registros_nacionales_id) AND $expediente->registros_nacionales_id == $rn->id)
											<option value="{{ $rn->id }}" selected>{{ $rn->registros_nacionales }}</option>
										@else
											<option value="{{ $rn->id }}">{{ $rn->registros_nacionales }}</option>
										@endif
									@endforeach
								</select>
								<label for="registros_nacionales_id"><span class="required">VINCULO CON LOS REGISTROS NACIONALES</span></label>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="card card-flush mb-5">
		<div class="card-body">
			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_claves">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Claves</h3>
				</div>
				<div id="kt_claves" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre Claves.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Clave Identifiación 1."><b style="font-size:10px">Info</b></div>
								<input type="text" id="clave_identificacion_1" name="clave_identificacion_1" value="{{ $expediente->clave_identificacion_1 ?? '' }}" placeholder="clave_identificacion_1" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="clave_identificacion_1">CLAVE IDENTIFIACIÓN 1</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Clave Identifiación 2."><b style="font-size:10px">Info</b></div>
								<input type="text" id="clave_identificacion_2" name="clave_identificacion_2" value="{{ $expediente->clave_identificacion_2 ?? '' }}" placeholder="clave_identificacion_2" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="clave_identificacion_2">CLAVE IDENTIFIACIÓN 2</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Clave Identifiación 3."><b style="font-size:10px">Info</b></div>
								<input type="text" id="clave_identificacion_3" name="clave_identificacion_3" value="{{ $expediente->clave_identificacion_3 ?? '' }}" placeholder="clave_identificacion_3" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="clave_identificacion_3">CLAVE IDENTIFIACIÓN 3</label>
							</div>
						</div>
					</div>
					<div class="row fv-row">
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Contacto Agencia."><b style="font-size:10px">Info</b></div>
								<textarea id="contacto_agencia" name="contacto_agencia" placeholder="contacto_agencia" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $expediente->contacto_agencia ?? '' }}</textarea>
								<label for="contacto_agencia">CONTACTO AGENCIA</label>
							</div>
						</div>
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Comentarios."><b style="font-size:10px">Info</b></div>
								<textarea id="comentarios" name="comentarios" placeholder="comentarios" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $expediente->comentarios ?? '' }}</textarea>
								<label for="comentarios">COMENTARIOS</label>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="row py-5">
				<div class="col-md-7 offset-md-5">
					<div class="d-flex">
						<button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Cancelar</button>
						<button type="button" data-kt-ecommerce-settings-type="submit" class="btn btn-primary" id="kt_captura_inicial_submit">
							<span class="indicator-label">Guadar</span>
							<span class="indicator-progress">Espere Por Favor...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</div>
			</div>

		</div>
	</div>

	</form>

</x-base-layout>