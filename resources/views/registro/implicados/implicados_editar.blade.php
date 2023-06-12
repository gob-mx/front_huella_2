<x-base-layout>

<x-slot name="actiontoolbar">
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_detalle_carpeta">Detalle Expediente</a>
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_agrega_implicado">Agregar Implicado</a>
	{{-- <a href="{{ route('users_list') }}" class="btn btn-sm fw-bold btn-primary boton_edit">Enrolar Implicados</a> --}}
</x-slot>

@include('registro.implicados.partial.modal_detalle_carpeta')
@include('registro.implicados.partial.modal_agrega_implicado')


<div class="row">

	

	<div class="col-md-3 pb-5">
		<div class="card card-flush shadow-sm">
			<div class="card-header">
				<h3 class="card-title fw-bold fs-4 text-gray-500">CARPETA DE INVESTIGACIÓN {{ $expediente->carpeta_investigacion }}</h3>
				<div class="card-toolbar">
					<h5 class="fw-bold fs-4 text-gray-500 pt-2">{{ $expediente->EstatusInvestigacion->estatus_carpeta }}</h5>
				</div>
			</div>
			<div class="card-body py-0">

				<div class="row">
					<div class="col-md-12">
						<div class="pb-5 fs-6">
							<div class="fw-bold">AVERIGUACIÓN PREVIA</div>
							<div class="text-gray-600">{{ $expediente->averiguacion_previa ?? '' }}</div>
							<div class="fw-bold mt-5">FECHA HECHOS</div>
							<div class="text-gray-600">{{ $expediente->fecha_hechos ?? '' }}</div>
							<div class="fw-bold mt-5">FECHA REGISTRO</div>
							<div class="text-gray-600">{{ $expediente->fecha_registro ?? '' }}</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-4 pb-5">
		<div class="card card-flush shadow-sm">
			<div class="card-header">
				<h3 class="card-title fw-bold fs-4 text-gray-500">CARPETA DE INVESTIGACIÓN {{ $expediente->carpeta_investigacion }}</h3>
				<div class="card-toolbar">
					<h5 class="fw-bold fs-4 text-gray-500 pt-2">{{----}}</h5>
				</div>
			</div>
			<div class="card-body py-0">

				<div class="row">
					<div class="col-md-12">
						<div class="pb-5 fs-6">
							<div class="fw-bold">DELITOS(S)</div>
							<div class="text-gray-600">{{ $expediente->delito ?? '' }}</div>
							<div class="fw-bold mt-5">DESCRIPCION</div>
							<div class="text-gray-600">{{ $expediente->descripcion_delito ?? '' }}</div>
							<div class="fw-bold mt-5">OBSERVACIONES</div>
							<div class="text-gray-600">{{ $expediente->observaciones ?? '' }}</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-5 pb-5">
		<div class="card card-flush shadow-sm">
			<div class="card-header">
				<h3 class="card-title fw-bold fs-4 text-gray-500">DOMICILIO DEL DELITO</h3>
				<div class="card-toolbar">
					<h5 class="fw-bold fs-4 text-gray-500 pt-2">{{----}}</h5>
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
	</div>
@if($personas->count() > 0)
	@include('registro.implicados.partial.tabla_implicados')
@endif


</div>

</x-base-layout>