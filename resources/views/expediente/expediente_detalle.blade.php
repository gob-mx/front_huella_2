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
								<div class="fw-bold fs-4 text-gray-500">BIOGRÁFICOS</div>
								<div class="py-2"></div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">NOMBRE</div>
								<div class="text-gray-600">{{ $persona->nombre ?? 'NOMBRE' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">APELLIDO PATERNO</div>
								<div class="text-gray-600">{{ $persona->apellido_paterno ?? 'APELLIDO PATERNO' }}</div>
							</div>
							<div class="col-md-3 fs-6">
								<div class="fw-bold">APELLIDO MATERNO</div>
								<div class="text-gray-600">{{ $persona->apellido_materno ?? 'APELLIDO MATERNO' }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>

				{{-- <div class="col-md-4 pb-5">
					<div class="card card-flush shadow-sm">
						<div class="card-header">
							<h3 class="card-title fw-bold fs-4 text-gray-500">CARPETA DE INVESTIGACIÓN {{ $expediente->carpeta_investigacion ?? '' }}</h3>
							<div class="card-toolbar">
								<h5 class="fw-bold fs-4 text-gray-500 pt-2"> </h5>
							</div>
						</div>
						<div class="card-body py-0">

							<div class="row">
								<div class="col-md-12">
									<div class="pb-5 fs-6">
										<div class="fw-bold">DELITOS(S)</div>
										<div class="text-gray-600">{{ $expediente->delito ?? 'DELITOS' }}</div>
										<div class="fw-bold mt-5">DESCRIPCION</div>
										<div class="text-gray-600">{{ $expediente->descripcion_delito ?? 'descripcion_delito' }}</div>
										<div class="fw-bold mt-5">OBSERVACIONES</div>
										<div class="text-gray-600">{{ $expediente->observaciones ?? '' }}</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div> --}}

				{{-- <div class="col-md-5 pb-5">
					<div class="card card-flush shadow-sm">
						<div class="card-header">
							<h3 class="card-title fw-bold fs-4 text-gray-500">DOMICILIO DEL DELITO</h3>
							<div class="card-toolbar">
								<h5 class="fw-bold fs-4 text-gray-500 pt-2"> </h5>
							</div>
						</div>
						<div class="card-body py-0">

							<div class="row">
								<div class="col-md-6">
									<div class="pb-0 fs-6">
										<div class="fw-bold">PAIS</div>
										<div class="text-gray-600">{{ $expediente->DomicilioDelito->pais ?? '' }}</div>
										<div class="fw-bold mt-5">CALLE</div>
										<div class="text-gray-600">{{ $expediente->DomicilioDelito->calle ?? '' }}</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="pb-0 fs-6">
										<div class="fw-bold">COLONIA</div>
										<div class="text-gray-600">{{ $expediente->DomicilioDelito->colonia ?? '' }}</div>
										<div class="fw-bold mt-5">MUNICIPIO</div>
										<div class="text-gray-600">{{ $expediente->DomicilioDelito->delegacion_municipio ?? '' }}</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="pb-5 fs-6">
										<div class="fw-bold mt-5">EXTERIOR</div>
										<div class="text-gray-600">{{ $expediente->DomicilioDelito->numero_interior ?? '' }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="pb-5 fs-6">
										<div class="fw-bold mt-5">INTERIOR</div>
										<div class="text-gray-600">{{ $expediente->DomicilioDelito->numero_exterior ?? '' }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="pb-5 fs-6">
										<div class="fw-bold mt-5">CODIGO POSTAL</div>
										<div class="text-gray-600">{{ $expediente->DomicilioDelito->codigo_postal ?? '' }}</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div> --}}
		</div>
		<div class="tab-pane fade show" id="kt_huellas" role="tabpanel">
			<div class="row">
				<h1>HUELLAS</h1>
			</div>
		</div>
	</div>

</div>

</x-base-layout>