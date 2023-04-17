<div class="card card-flush h-100 mb-5 mb-xl-10">
	<div class="card-header pt-5">
		<div class="card-title d-flex flex-column">
			<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $uTotal }}</span>
			<span class="text-gray-400 pt-1 fw-semibold fs-6">Usuarios</span>
		</div>
	</div>
	<div class="card-body d-flex flex-column justify-content-end pe-0">
		<span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Lista de Usuarios</span>
		<div class="symbol-group symbol-hover flex-nowrap">
			@php
				$bg = [
					'warning',
					'primary',
					'danger'
				];
				$n = 0;
				$u = 1;
			@endphp
			@foreach($usuarios as $usuario)
				<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $usuario->nombre }} {{ $usuario->apellido_paterno }}">
					<span class="symbol-label bg-{{ $bg[$n] }} text-inverse-{{ $bg[$n] }} fw-bold">{{ $usuario->nombre[0].$usuario->apellido_paterno[0] }}</span>
				</div>
				@php
					if($u>=6){break;}else{$u++;}
				@endphp
				@php $n >= 2 ? $n=0 : $n++ @endphp
			@endforeach
			<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
				<span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">@if($u <= 6) +{{ $uTotal-$u }} @else {{ $uTotal }} @endif</span>
			</a>
		</div>
	</div>
</div>