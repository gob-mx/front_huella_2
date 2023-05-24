<x-base-layout>

{{-- <x-slot name="actiontoolbar">
	<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_detalle_carpeta">Detalle Carpeta de Investigación</a>
</x-slot> --}}

@include('registro.implicados.partial.modal_detalle_carpeta')

<div class="d-flex flex-column flex-lg-row">
	<div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
	{{-- <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2"> --}}

		<div class="card card-flush pt-3 mb-5 mb-xl-10">
			<div class="card-header">
				<div class="card-title">
					<h2 class="fw-bold text-gray-400">Carpeta de Investigación <span class="text-dark fs-1">{{ $carpeta->carpeta_investigacion }}</span></h2>
				</div>
				<div class="card-toolbar">
					<a href="" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_detalle_carpeta">Ver Detalle</a>
				</div>
			</div>

			<div class="card-body pt-3">
				<div class="mb-10">
					<h5 class="mb-4">Dirección del Delito:</h5>
					<div class="d-flex flex-wrap py-5">
						<div class="flex-equal me-5">
							<table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
								{{-- <tr>
									<td class="text-gray-400 min-w-175px w-175px">Bill to:</td>
									<td class="text-gray-800 min-w-200px">
										<a href="../../demo1/dist/pages/apps/customers/view.html" class="text-gray-800 text-hover-primary">smith@kpmg.com</a>
									</td>
								</tr> --}}
								<tr>
									<td class="text-gray-400">Pais:</td>
									<td class="text-gray-800">{{ $carpeta->DomicilioDelito->pais ?? '' }}</td>
								</tr>
								<tr>
									<td class="text-gray-400">Calle:</td>
									<td class="text-gray-800">{{ $carpeta->DomicilioDelito->calle ?? '' }}</td>
								</tr>
								<tr>
									<td class="text-gray-400">Exterior:</td>
									<td class="text-gray-800">{{ $carpeta->DomicilioDelito->numero_interior ?? '' }}</td>
								</tr>
								<tr>
									<td class="text-gray-400">Interior:</td>
									<td class="text-gray-800">{{ $carpeta->DomicilioDelito->numero_exterior ?? '' }}</td>
								</tr>
							</table>
						</div>
						<div class="flex-equal">
							<table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
								{{-- <tr>
									<td class="text-gray-400 min-w-175px w-175px">Subscribed Product:</td>
									<td class="text-gray-800 min-w-200px">
										<a href="#" class="text-gray-800 text-hover-primary">Basic Bundle</a>
									</td>
								</tr> --}}
								<tr>
									<td class="text-gray-400">Colonia:</td>
									<td class="text-gray-800">{{ $carpeta->DomicilioDelito->colonia ?? '' }}</td>
								</tr>
								<tr>
									<td class="text-gray-400">Delegación/Municipio:</td>
									<td class="text-gray-800">{{ $carpeta->DomicilioDelito->delegacion_municipio ?? '' }}</td>
								</tr>
								<tr>
									<td class="text-gray-400">Codigo Postal:</td>
									<td class="text-gray-800">{{ $carpeta->DomicilioDelito->codigo_postal ?? '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- <div class="card card-flush pt-3 mb-5 mb-xl-10">
			<div class="card-header">
				<div class="card-title">
					<h2>Recent Events</h2>
				</div>
				<div class="card-toolbar">
					<a href="#" class="btn btn-light-primary">View All Events</a>
				</div>
			</div>

			<div class="card-body pt-0">
			</div>

		</div> --}}

		{{-- <div class="card card-flush pt-3 mb-5 mb-xl-10">
			<div class="card-header">
				<div class="card-title">
					<h2>Invoices</h2>
				</div>
				<div class="card-toolbar">
					<ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
						<li class="nav-item" role="presentation">
							<a id="kt_referrals_year_tab" class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_1">This Year</a>
						</li>
						<li class="nav-item" role="presentation">
							<a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_2">2020</a>
						</li>
						<li class="nav-item" role="presentation">
							<a id="kt_referrals_2018_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_3">2019</a>
						</li>
						<li class="nav-item" role="presentation">
							<a id="kt_referrals_2017_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_4">2018</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="card-body pt-2">
				<div id="kt_referred_users_tab_content" class="tab-content">
					<div id="kt_customer_details_invoices_1" class="tab-pane fade show active" role="tabpanel">
						
					</div>
					<div id="kt_customer_details_invoices_2" class="tab-pane fade" role="tabpanel">
						
					</div>
					<div id="kt_customer_details_invoices_3" class="tab-pane fade" role="tabpanel">
						
					</div>
					<div id="kt_customer_details_invoices_4" class="tab-pane fade" role="tabpanel">
						
					</div>
				</div>
			</div>
		</div> --}}

	</div>

	<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">

		{{-- <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
			<div class="card-header">
				<div class="card-title">
					<h2>Summary</h2>
				</div>
				<div class="card-toolbar">
					<a href="#" class="btn btn-sm btn-light btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
						<span class="svg-icon svg-icon-3">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
								<rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor" />
								<rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor" />
							</svg>
						</span>
					</a>
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-6 w-200px py-4" data-kt-menu="true">
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Pause Subscription</a>
						</div>
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3" data-kt-subscriptions-view-action="delete">Edit Subscription</a>
						</div>
						<div class="menu-item px-3">
							<a href="#" class="menu-link text-danger px-3" data-kt-subscriptions-view-action="edit">Cancel Subscription</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body pt-0 fs-6">
				
				<div class="mb-0">
					<a href="../../demo1/dist/apps/subscriptions/add.html" class="btn btn-primary" id="kt_subscriptions_create_button">Edit Subscription</a>
				</div>
			</div>
		</div> --}}

	</div>
</div>

</x-base-layout>