<x-base-layout>

	<div class="col-mb-6 col-xl-4">
		<div class="card card-xl-stretch mb-5 mb-xl-8">
			{{-- <div class="card-header border-0">
				
			</div> --}}
			<div class="card-body pt-8">
				<div class="d-flex align-items-center mb-8">
					<span class="bullet bullet-vertical h-40px bg-success"></span>
					<div class="form-check form-check-custom form-check-solid mx-5"></div>
					<div class="flex-grow-1">
						<a href="javascript:void(0)" class="text-gray-800 text-hover-primary fw-bold fs-6 create_token">Crear Token</a>
						{{-- <span class="text-muted fw-semibold d-block">Due in 2 Days</span> --}}
					</div>
					{{-- <span class="badge badge-light-success fs-8 fw-bold">New</span> --}}
				</div>
				<div class="d-flex align-items-center mb-8">
					<span class="bullet bullet-vertical h-40px bg-primary"></span>
					<div class="form-check form-check-custom form-check-solid mx-5"></div>
					<div class="flex-grow-1">
						<a href="{{ route('users_list') }}" id="btn_user_list" class="text-gray-800 text-hover-primary fw-bold fs-6">Enrolar Usuarios</a>
						{{-- <span class="text-muted fw-semibold d-block">Due in 3 Days</span> --}}
					</div>
					{{-- <span class="badge badge-light-primary fs-8 fw-bold">New</span> --}}
				</div>
				<div class="d-flex align-items-center mb-8">
					<span class="bullet bullet-vertical h-40px bg-warning"></span>
					<div class="form-check form-check-custom form-check-solid mx-5"></div>
					<div class="flex-grow-1">
						<a href="{{ route('verify-users') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Comprobar Usuarios</a>
						{{-- <span class="text-muted fw-semibold d-block">Due in 5 Days</span> --}}
					</div>
					{{-- <span class="badge badge-light-warning fs-8 fw-bold">New</span> --}}
				</div>
				<div class="d-flex align-items-center mb-8">
					<span class="bullet bullet-vertical h-40px bg-danger"></span>
					<div class="form-check form-check-custom form-check-solid mx-5"></div>
					<div class="flex-grow-1">
						<a href="https://drive.google.com/drive/folders/1U_P6h7sJfjW6INqFMnS3HeJ9DAgnIcdy?usp=share_link" class="text-gray-800 text-hover-primary fw-bold fs-6">Descarga Complemento FingerprintRader</a>
						{{-- <span class="text-muted fw-semibold d-block">Due in 12 Days</span> --}}
					</div>
					{{-- <span class="badge badge-light-danger fs-8 fw-bold">New</span> --}}
				</div>
			</div>
		</div>
	</div>

		{{-- <div class="col-md-8">
			<div class="card">

				<div class="card-body">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->usuario }}
							</a>
							<br>
							<a style="cursor: pointer" class="create_token">Create Token</a>                         
							<br>
							<a class="nav-link" id="btn_user_list" href="{{ route('users_list') }}">{{ __('Users') }}</a>
							<br>
							<a class="nav-link" href="{{ route('verify-users') }}">{{ __('Check Users') }}</a>
							<br>
							<a class="nav-link" href="https://drive.google.com/drive/folders/1U_P6h7sJfjW6INqFMnS3HeJ9DAgnIcdy?usp=share_link">{{ __('Download Plugin') }}</a>

							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div> --}}

</x-base-layout>
