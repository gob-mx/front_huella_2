<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
	<div class="card mb-5 mb-xl-8">
		<div class="card-body">
			<div class="d-flex flex-center flex-column py-5">
				<div class="symbol symbol-100px symbol-circle mb-7">
					<img src="{{ ($user->info->avatar !== null AND $user->info->avatar !== '')  ? asset('avatars/'.$user->info->avatar) : asset('avatars/blank.png') }}" alt="image" />
				</div>
				<a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</a>
				<div class="mb-9">
					@if($user->activo)
						<center>
							<div class="badge badge-lg badge-light-success d-inline">Activo</div>
						</center>
					@else
						<center>
							<div class="badge badge-lg badge-light-danger d-inline">In-Activo</div>
						</center>
					@endif
					<br>
					@if(empty($user_roles))
						<div class="badge badge-lg badge-light-danger d-inline">Sin Rol Asignado</div>
					@else
						@foreach($user_roles as $rol => $id)
							<div class="badge badge-lg badge-light-primary d-inline">{{ $rol }}</div>
						@endforeach
					@endif
				</div>
			</div>
			<div class="d-flex flex-stack fs-4 py-3">
				<div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">
					Detalle
				<span class="ms-2 rotate-180">
					<span class="svg-icon svg-icon-3">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
						</svg>
					</span>
				</span></div>
				<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
					<a id="boton_guarda_usuario" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#modal_guarda_usuarios" class="btn btn-sm btn-light-primary" href="javascript:void(0)">Editar</a>
				</span>
			</div>
			<div class="separator"></div>
			<div id="kt_user_view_details" class="collapse show">
				<div class="pb-5 fs-6">
					<div class="fw-bold mt-5">Usuario</div>
					<div class="text-gray-600">{{ $user->usuario }}</div>
					<div class="fw-bold mt-5">Email</div>
					<div class="text-gray-600">
						<a href="#" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
					</div>
					<div class="fw-bold mt-5">Telefono</div>
					<div class="text-gray-600">{{ $user->info->telefono }}</div>
					<div class="fw-bold mt-5">R.F.C.</div>
					<div class="text-gray-600">{{ $user->rfc }}</div>
					<div class="fw-bold mt-5">C.U.R.P.</div>
					<div class="text-gray-600">{{ $user->curp }}</div>
				</div>
			</div>
		</div>
	</div>
</div>