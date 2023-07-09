<x-base-layout>

<x-slot name="actiontoolbar">
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_detalle_carpeta">Detalle Expediente</a>
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_agrega_implicado">Agregar Implicado</a>
	{{-- <a href="{{ route('users_list') }}" class="btn btn-sm fw-bold btn-primary boton_edit">Enrolar Implicados</a> --}}
</x-slot>

{{-- @include('registro.implicados.partial.modal_detalle_carpeta') --}}
{{-- @include('registro.implicados.partial.modal_agrega_implicado') --}}



	{{-- @if($personas->count() > 0) --}}
		@include('expediente.partial.persona')
	{{-- @endif --}}


	<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
		<li class="nav-item">
			<a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_biograficos">BIOGRÁFICOS</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_huellas">HUELLAS</a>
		</li>
	</ul>

	
<div class="row">

	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="kt_biograficos" role="tabpanel">

			<div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 fs-6">
								<div class="fw-bold">CIB</div>
								<div class="text-gray-600">{{ $expediente->CIB ?? '123456789QWERTY' }}</div>
								{{-- <div class="py-2"></div> --}}
							</div>
							<div class="col-md-8 fs-6">
								<div class="fw-bold">ESTATUS</div>
								<div class="text-gray-600">{{ $expediente->estatus ?? 'ENROLADO EN MOTOR BIOMETRICO SIN COINCIDENCIAS PREVIAS DE HUELLA' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="fw-bold fs-4 text-gray-500">PERSONALES</div>
								<div class="py-2"></div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">NOMBRE</div>
								<div class="text-gray-600">{{ $expediente->Persona->nombre ?? 'NOMBRE' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">APELLIDO PATERNO</div>
								<div class="text-gray-600">{{ $expediente->Persona->apellido_paterno ?? 'APELLIDO PATERNO' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">APELLIDO MATERNO</div>
								<div class="text-gray-600">{{ $expediente->Persona->apellido_materno ?? 'APELLIDO MATERNO' }}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="py-2"></div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">SEXO</div>
								<div class="text-gray-600">{{ $expediente->Persona->Sexo->sexo ?? 'SEXO' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">ESTADO CIVIL</div>
								<div class="text-gray-600">{{ $expediente->Persona->EstadoCivil->estado_civil ?? 'ESTADO CIVIL' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">CURP</div>
								<div class="text-gray-600">{{ $expediente->Persona->curp ?? 'CURP' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">NACIONALIDAD</div>
								<div class="text-gray-600">{{ $expediente->Persona->Nacionalidad->nacionalidad ?? 'NACIONALIDAD' }}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="py-2"></div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">PAÍS DE NACIMIENTO</div>
								<div class="text-gray-600">{{ $expediente->Persona->pais_nacimiento ?? 'PAÍS DE NACIMIENTO' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">ENTIDAD DE NACIMIENTO</div>
								<div class="text-gray-600">{{ $expediente->Persona->entidad_nacimiento ?? 'ENTIDAD DE NACIMIENTO' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="fw-bold fs-4 text-gray-500">DOMICILIO</div>
								<div class="py-2"></div>
							</div>
							<div class="col-md-12 fs-6">
								{{-- <div class="fw-bold">NOMBRE</div> --}}
								<div class="text-gray-600">
									{{ $expediente->Persona->Domicilio->calle }}
									{{ $expediente->Persona->Domicilio->numero_exterior }}
									{{ $expediente->Persona->Domicilio->numero_interior }}
									{{ $expediente->Persona->Domicilio->colinia }}
									{{ $expediente->Persona->Domicilio->delegacion_municipio }}
									{{ $expediente->Persona->Domicilio->codigo_postal }}
									{{ $expediente->Persona->Domicilio->ciudad }}
									{{ $expediente->Persona->Domicilio->pais }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			{{-- <div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="fw-bold fs-4 text-gray-500">SEÑAS PARTICULARES</div>
								<div class="py-2"></div>
							</div>
							<div class="col-md-12 fs-6">
								<div class="fw-bold">SEÑAS</div>
								<div class="text-gray-600">{{ $senias->senia ?? 'SEÑA PARTICULAR' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}

			<div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="fw-bold fs-4 text-gray-500">EXPEDIENTE</div>
								<div class="py-2"></div>
							</div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">CODIGO DELITO</div>
								<div class="text-gray-600">{{ $expediente->codigo_delito ?? 'CODIGO DELITO' }}</div>
							</div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">TIPO REGISTRO</div>
								<div class="text-gray-600">{{ $expediente->TipoRegistro->tipo_registro ?? 'TIPO REGISTRO' }}</div>
							</div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">TIPO POLICIA</div>
								<div class="text-gray-600">{{ $expediente->tipo_policia ?? 'TIPO POLICIA' }}</div>
							</div>
						</div>
						<div class="row">
							<div class="py-2"></div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">SITUACION DE PERSONA</div>
								<div class="text-gray-600">{{ $expediente->SituacionPersona->situacion_persona ?? 'SITUACION DE PERS' }}</div>
							</div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">INFORMACION</div>
								<div class="text-gray-600">{{ $expediente->informacion ?? 'INFORMACI' }}</div>
							</div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">PELIGROSIDAD</div>
								<div class="text-gray-600">{{ $expediente->Peligrosidad->peligrosidad ?? 'PELIGROSIDA' }}</div>
							</div>
						</div>
						<div class="row">
							<div class="py-2"></div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">CONTACTO AGENCIA</div>
								<div class="text-gray-600">{{ $expediente->contacto_agencia ?? 'CONTACTO AGENC' }}</div>
							</div>
							<div class="col-md-4 fs-6">
								<div class="fw-bold">VINCULO CON LOS REGISTROS NACIONALES</div>
								<div class="text-gray-600">{{ $expediente->RegistrosNacionales->registros_nacionales ?? 'REGISTROS NACIO' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="tab-pane fade show" id="kt_huellas" role="tabpanel">

			<div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="py-2"></div>
							</div>
							<div class="col-md-2 fs-6">
								<div class="fw-bold">SUBJECT ID</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->SubjectId ?? 'SUBJECT ID' }}</div>
							</div>
							{{-- <div class="col-md-2 fs-6">
								<div class="fw-bold">GALERYID</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->GaleryId ?? 'GALERYID' }}</div>
							</div> --}}
							<div class="col-md-2 fs-6">
								<div class="fw-bold">FIRST NAME</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->FirstName ?? 'FIRST NAME' }}</div>
							</div>
							<div class="col-md-2 fs-6">
								<div class="fw-bold">LAST NAME</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->LastName ?? 'LAST NAME' }}</div>
							</div>
							<div class="col-md-2 fs-6">
								<div class="fw-bold">YEAR OF BIRTH</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->YearOfBirth ?? 'YEAR OF BIRTH' }}</div>
							</div>
							{{-- <div class="col-md-2 fs-6">
								<div class="fw-bold">GENDERSTRING</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->GenderString ?? 'GENDERSTRING' }}</div>
							</div> --}}
							<div class="col-md-2 fs-6">
								<div class="fw-bold">COUNTRY</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->Country ?? 'COUNTRY' }}</div>
							</div>
							<div class="col-md-2 fs-6">
								<div class="fw-bold">City</div>
								<div class="text-gray-600">{{ $expediente->Persona->Subject->City ?? 'City' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="py-2"></div>
							</div>
							<div class="col-md-12 fs-6">
								<div class="fw-bold">TEMPLATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Descarga ==> <a href="{{ route('expediente.template',[$expediente->Persona->Subject->SubjectId]) }}" target="_blank">{{ 'Template_Id_'.$expediente->Persona->Subject->SubjectId.'.bin' }}</a> </div>
								<div class="text-gray-600">{{ base64_encode($expediente->Persona->Subject->Template) ?? 'TEMPLATE' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="card card-flush shadow-sm">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 fs-6">
								<div class="py-2"></div>
							</div>
							<div class="col-md-12 fs-6">
								<div class="fw-bold">ENROLL DATA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Descarga ==> <a href="{{ route('expediente.enrolldata',[$expediente->Persona->Subject->SubjectId]) }}" target="_blank">{{ 'EnrollData_Id_'.$expediente->Persona->Subject->SubjectId.'.wsq' }}</a> </div>
								<div class="text-gray-600">{{ base64_encode($expediente->Persona->Subject->EnrollData) ?? 'ENROLL DATA' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>

</x-base-layout>