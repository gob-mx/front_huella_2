<x-base-layout>

<x-slot name="actiontoolbar">
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_detalle_carpeta">Detalle Carpeta de Investigación</a>
</x-slot>

@include('registro.implicados.partial.modal_detalle_carpeta')


<div class="row">

	

	<div class="col-xl-3">
		<div class="card card-flush shadow-sm">
			<div class="card-header">
				<h3 class="card-title fw-bold fs-4 text-gray-500">CI {{ $carpeta->carpeta_investigacion }}</h3>
				<div class="card-toolbar">
					<h5 class="fw-bold fs-4 text-gray-500 pt-2">{{ $carpeta->EstatusInvestigacion->estatus_carpeta }}</h5>
				</div>
			</div>
			<div class="card-body py-0">

				<div class="row">
					<div class="col-xl-12">
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

	<div class="col-xl-5">
		<div class="card card-flush shadow-sm">
			<div class="card-header">
				<h3 class="card-title fw-bold fs-4 text-gray-500">DOMICILIO DEL DELITO</h3>
				<div class="card-toolbar">
					<a href="" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_detalle_carpeta">Ver Detalle</a>
				</div>
			</div>
			<div class="card-body py-2">

				<div class="d-flex flex-wrap py-2">
					<div class="flex-equal me-5">
						<table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
							<tr>
								<td class="text-gray-400">PAIS</td>
								<td class="text-gray-800 fw-bold">{{ $carpeta->DomicilioDelito->pais ?? '' }}</td>
							</tr>
							<tr>
								<td class="text-gray-400">CALLE</td>
								<td class="text-gray-800 fw-bold">{{ $carpeta->DomicilioDelito->calle ?? '' }}</td>
							</tr>
							<tr>
								<td class="text-gray-400">INTERIOR</td>
								<td class="text-gray-800 fw-bold">{{ $carpeta->DomicilioDelito->numero_interior ?? '' }}</td>
							</tr>
							<tr>
								<td class="text-gray-400">EXTERIOR</td>
								<td class="text-gray-800 fw-bold">{{ $carpeta->DomicilioDelito->numero_exterior ?? '' }}</td>
							</tr>
						</table>
					</div>
					<div class="flex-equal">
						<table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
							<tr>
								<td class="text-gray-400">COLONIA</td>
								<td class="text-gray-800 fw-bold">{{ $carpeta->DomicilioDelito->colonia ?? '' }}</td>
							</tr>
							<tr>
								<td class="text-gray-400">MUNICIPIO</td>
								<td class="text-gray-800 fw-bold">{{ $carpeta->DomicilioDelito->delegacion_municipio ?? '' }}</td>
							</tr>
							<tr>
								<td class="text-gray-400">CODIGO POSTAL</td>
								<td class="text-gray-800 fw-bold">{{ $carpeta->DomicilioDelito->codigo_postal ?? '' }}</td>
							</tr>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

</x-base-layout>