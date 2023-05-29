<x-base-layout>

<x-slot name="actiontoolbar">
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_detalle_carpeta">Detalle Carpeta de Investigación</a>
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_agrega_implicado">Agregar Implicado</a>
</x-slot>

@include('registro.implicados.partial.modal_detalle_carpeta')
@include('registro.implicados.partial.modal_agrega_implicado')


<div class="row">

	

	<div class="col-md-3 pb-5">
		<div class="card card-flush shadow-sm">
			<div class="card-header">
				<h3 class="card-title fw-bold fs-4 text-gray-500">CI {{ $carpeta->carpeta_investigacion }}</h3>
				<div class="card-toolbar">
					<h5 class="fw-bold fs-4 text-gray-500 pt-2">{{ $carpeta->EstatusInvestigacion->estatus_carpeta }}</h5>
				</div>
			</div>
			<div class="card-body py-0">

				<div class="row">
					<div class="col-md-12">
						<div class="pb-5 fs-6">
							<div class="fw-bold">AVERIGUACIÓN PREVIA</div>
							<div class="text-gray-600">{{ $carpeta->averiguacion_previa ?? '' }}</div>
							<div class="fw-bold mt-5">FECHA HECHOS</div>
							<div class="text-gray-600">{{ $carpeta->fecha_hechos ?? '' }}</div>
							<div class="fw-bold mt-5">FECHA REGISTRO</div>
							<div class="text-gray-600">{{ $carpeta->fecha_registro ?? '' }}</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-4 pb-5">
		<div class="card card-flush shadow-sm">
			<div class="card-header">
				<h3 class="card-title fw-bold fs-4 text-gray-500">CI {{ $carpeta->carpeta_investigacion }}</h3>
				<div class="card-toolbar">
					<h5 class="fw-bold fs-4 text-gray-500 pt-2">{{----}}</h5>
				</div>
			</div>
			<div class="card-body py-0">

				<div class="row">
					<div class="col-md-12">
						<div class="pb-5 fs-6">
							<div class="fw-bold">DELITOS(S)</div>
							<div class="text-gray-600">{{ $carpeta->delito ?? '' }}</div>
							<div class="fw-bold mt-5">DESCRIPCION</div>
							<div class="text-gray-600">{{ $carpeta->descripcion_delito ?? '' }}</div>
							<div class="fw-bold mt-5">OBSERVACIONES</div>
							<div class="text-gray-600">{{ $carpeta->observaciones ?? '' }}</div>
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
							<div class="text-gray-600">{{ $carpeta->DomicilioDelito->pais ?? '' }}</div>
							<div class="fw-bold mt-5">CALLE</div>
							<div class="text-gray-600">{{ $carpeta->DomicilioDelito->calle ?? '' }}</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="pb-0 fs-6">
							<div class="fw-bold">COLONIA</div>
							<div class="text-gray-600">{{ $carpeta->DomicilioDelito->colonia ?? '' }}</div>
							<div class="fw-bold mt-5">MUNICIPIO</div>
							<div class="text-gray-600">{{ $carpeta->DomicilioDelito->delegacion_municipio ?? '' }}</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="pb-5 fs-6">
							<div class="fw-bold mt-5">EXTERIOR</div>
							<div class="text-gray-600">{{ $carpeta->DomicilioDelito->numero_interior ?? '' }}</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pb-5 fs-6">
							<div class="fw-bold mt-5">INTERIOR</div>
							<div class="text-gray-600">{{ $carpeta->DomicilioDelito->numero_exterior ?? '' }}</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pb-5 fs-6">
							<div class="fw-bold mt-5">CODIGO POSTAL</div>
							<div class="text-gray-600">{{ $carpeta->DomicilioDelito->codigo_postal ?? '' }}</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@if($personas->count() > 0)
	@include('registro.implicados.partial.tabla_implicados')
@endif
	{{-- <div class="col-xxl-4">
		<div class="card h-md-100">
			<div class="card-body d-flex flex-column flex-center">
				<div class="mb-2">
					<h1 class="fw-semibold text-gray-800 text-center lh-lg">Try out our
					<br />new
					<span class="fw-bolder">Invoice Manager</span></h1>
					<div class="py-10 text-center">
						<img src="{{ asset(theme()->getMediaUrlPath() . 'svg/illustrations/easy/2.svg') }}" class="theme-light-show w-200px" alt="" />
						<img src="{{ asset(theme()->getMediaUrlPath() . 'svg/illustrations/easy/2.svg') }}" class="theme-dark-show w-200px" alt="" />
					</div>
				</div>
				<div class="text-center mb-1">
					<a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_create_account" data-bs-toggle="modal">Try Now</a>
					<a class="btn btn-sm btn-light" href="../../demo1/dist/apps/ecommerce/sales/listing.html">Learn More</a>
				</div>
			</div>
		</div>
	</div> --}}

</div>

</x-base-layout>