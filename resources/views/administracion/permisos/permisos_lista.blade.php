<x-base-layout>

	<x-slot name="actiontoolbar">
		{{-- <a id="boton_guarda_usuario" data-id="0" href="javascript:void(0);" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#modal_guarda_usuarios">Crear Modulo</a> --}}

		<button type="button" id="boton_add_modul" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_modul">
			<span class="svg-icon svg-icon-3">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
					<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
					<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
				</svg>
			</span>
			Agregar Modulo
		</button>

	</x-slot>

	<div class="card">
		<div class="card-body pt-6">

			{{ $dataTable->table() }}

		</div>
	</div>

	@include('administracion.permisos.partial.modal_crea_modulo')
	@include('administracion.permisos.partial.modal_crea_permiso')
	@include('administracion.permisos.partial.modal_edita_permiso')
	@include('administracion.permisos.partial.modal_edita_modulo')
	
	@section('scripts')
		{{ $dataTable->scripts() }}
	@endsection

</x-base-layout>