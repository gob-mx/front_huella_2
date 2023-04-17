<x-base-layout>

	<x-slot name="actiontoolbar">
		<a id="boton_guarda_usuario" data-id="0" href="javascript:void(0);" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#modal_guarda_usuarios">Crear Usuario</a>
	</x-slot>

	<div class="card">
		<div class="card-body pt-6">

			{{ $dataTable->table() }}

		</div>
	</div>

	@include('administracion.usuarios.partial.modal_guarda_usuarios')
	
	@section('scripts')
		{{ $dataTable->scripts() }}
	@endsection

</x-base-layout>