<x-base-layout>

<div class="d-flex flex-column flex-lg-row">

	@include('administracion.usuarios.partial.detalle_usuario')
	
	@include('administracion.usuarios.partial.modal_guarda_usuarios')

	<div id="target_roles_usuario" class="flex-lg-row-fluid ms-lg-15">
		@include('administracion.usuarios.partial.roles_usuario')
	</div>

</div>

@section('scripts')
	<script>

		var urlDetalle = "{{ route('administracion.usuarios.show',$user->id) }}";

		@if(empty($user_roles))
			Swal.fire('Asigna Permisos a Usuario','{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}','warning')
		@endif

	</script>
@endsection

</x-base-layout>