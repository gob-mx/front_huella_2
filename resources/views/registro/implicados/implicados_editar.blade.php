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
	<div class="col-xl-12">
		<div class="card card-flush h-xl-100">
			<div class="card-header pt-7">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bold text-gray-800">Implicados</span>
					{{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span> --}}
				</h3>
				<div class="card-toolbar">
					<a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-sm btn-light">History</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
						<thead>
							<tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
								<th class="p-0 pb-3 min-w-100px text-start">IMPLICADO</th>
								<th class="p-0 pb-3 min-w-100px text-end">ALIAS</th>
								<th class="p-0 pb-3 min-w-100px text-end">RFC</th>
								<th class="p-0 pb-3 min-w-125px text-end">CURP</th>
								<th class="p-0 pb-3 min-w-100px text-end">NACIONALIDAD</th>
								<th class="p-0 pb-3 w-80px text-end">ACCION</th>
							</tr>
						</thead>
						<tbody>
							@foreach($personas AS $persona)
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-50px me-3">
												<img src="{{ asset('avatars/blank.png') }}" class="" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">The Art</a>
												<span class="text-gray-400 fw-semibold d-block fs-7">Jenny Wilson</span>
											</div>
										</div>
									</td>
									<td class="text-end pe-0">
										<span class="text-gray-600 fw-bold fs-6">0.054 ETH</span>
									</td>
									<td class="text-end pe-0">
										<span class="text-gray-600 fw-bold fs-6">0.089 ETH</span>
									</td>
									<td class="pe-0">
										<div class="d-flex align-items-center justify-content-end">
											<div class="symbol symbol-30px me-3">
												{{-- <img src="assets/media/avatars/300-13.jpg" class="" alt="" /> --}}
											</div>
											<span class="text-gray-600 fw-bold d-block fs-6">0.089 ETH</span>
										</div>
									</td>
									<td class="text-end pe-0">
										<span class="text-gray-600 fw-bold fs-6">1h 43m 52s</span>
									</td>
									<td class="text-end">
										<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
											<span class="svg-icon svg-icon-5 svg-icon-gray-700">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
												</svg>
											</span>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
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