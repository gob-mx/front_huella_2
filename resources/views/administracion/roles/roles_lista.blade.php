<x-base-layout>

	<x-slot name="actiontoolbar">
		<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">Crear Nuevo Rol</a>
	</x-slot>

	<div id="kt_app_content" class="app-content flex-column-fluid">
		<div id="kt_app_content_container" class="app-container container-xxl">
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">

				@foreach( $roles as $rol)
					<div class="col-md-4">
						<div class="card card-flush h-md-100">
							<div class="card-header">
								<div class="card-title">
									<h2>{{ $rol->name }}</h2>
								</div>
							</div>
							<div class="card-body pt-1">
								<div class="fw-bold text-gray-600 mb-5">Total de usuarios con este rol: {{ App\Models\User::role( $rol->name )->count() }}</div>
								<div class="d-flex flex-column text-gray-600">

									@php($i = 0)
									
									@foreach( $rol->permissions as $permiso )
										@php($i++)
										<div class="d-flex align-items-center py-2">
										<span class="bullet bg-primary me-3"></span>{{ $permiso->name }}</div>
										@if ($i === 5)
											@break
										@endif
									@endforeach

									@if ($i == 5)
										<div class='d-flex align-items-center py-2'>
											<span class='bullet bg-primary me-3'></span>
											<em>{{ $rol->permissions->count() - $i }} permisos mas..</em>
										</div>
									@endif

									@php($i = 0)

								</div>
							</div>
							<div class="card-footer flex-wrap pt-0">
								<a href="" class="btn btn-light btn-active-primary my-1 me-2">Ver Rol</a>
								<button type="button" class="btn btn-light btn-active-light-primary my-1" id="boton_update" data-id="{{ $rol->id }}" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role_{{ $rol->id }}">Editar Rol</button>
							</div>
						</div>
					</div>
					@include('administracion.roles.partial.modal_edita_rol')
				@endforeach
				
				<div class="ol-md-4">
					<div class="card h-md-100">
						<div class="card-body d-flex flex-center">
							<button type="button" class="btn btn-clear d-flex flex-column flex-center boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
								<img src="{{ asset(theme()->getMediaUrlPath() . 'illustrations/sketchy-1/4.png') }}" alt="Crear Nuevo Rol" class="mw-100 mh-150px mb-7" />
								<div class="fw-bold fs-3 text-gray-600 text-hover-primary">Crear Nuevo Rol</div>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="div_crea_rol">
				@include('administracion.roles.partial.modal_crea_rol')
			</div>
		</div>
	</div>
	
	{{-- @section('scripts')
		{{ $dataTable->scripts() }}
	@endsection --}}

</x-base-layout>