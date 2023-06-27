<div class="col-xl-12">
	<div class="card card-flush h-xl-100">
		<div class="card-header pt-7">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label fw-bold text-gray-800">Implicados</span>
				<span class="text-gray-400 mt-1 fw-semibold fs-6">Expediente {{ $expediente->carpeta_investigacion ?? '' }}</span>
			</h3>
			{{-- <div class="card-toolbar">
				<a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-sm btn-light">History</a>
			</div> --}}
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
							<th class="p-0 pb-3 w-80px text-end">ENROLAR</th>
						</tr>
					</thead>
					<tbody>
						{{-- @foreach($personas AS $persona) --}}
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="symbol symbol-50px me-3">
											<img src="{{ asset('avatars/blank.png') }}" class="" alt="" />
										</div>
										<div class="d-flex justify-content-start flex-column">
											<a href="" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $persona->nombre ?? '' }}</a>
											<span class="text-gray-400 fw-semibold d-block fs-7">{{ $persona->apellido_paterno ?? '' }} {{ $persona->apellido_materno ?? '' }}</span>
										</div>
									</div>
								</td>
								<td class="text-end pe-0">
									<span class="text-gray-600 fw-bold fs-6">{{ $persona->alias ?? 'ALIAS (APODO)' }}</span>
								</td>
								<td class="text-end pe-0">
									<span class="text-gray-600 fw-bold fs-6">{{ $persona->rfc ?? 'RFC' }}</span>
								</td>
								<td class="pe-0">
									<div class="d-flex align-items-center justify-content-end">
										<div class="symbol symbol-30px me-3">
											{{-- <img src="assets/media/avatars/300-13.jpg" class="" alt="" /> --}}
										</div>
										<span class="text-gray-600 fw-bold d-block fs-6">{{ $persona->curp ?? 'CURP' }}</span>
									</div>
								</td>
								<td class="text-end pe-0">
									<span class="text-gray-600 fw-bold fs-6">{{ $persona->nacionalidad ?? 'MEXICANA' }}</span>
								</td>
								{{-- <td class="text-end">
									<a href="{{ route('desdos_list',$persona->id) }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
										<span class="svg-icon svg-icon-5 svg-icon-gray-700">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
												<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
											</svg>
										</span>
									</a>
								</td> --}}
								<td class="text-end">
									<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px add_finger" data-id="{{ $persona->id ?? '' }}">
										<span class="svg-icon svg-icon-5 svg-icon-gray-700">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
												<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
											</svg>
										</span>
									</button>
									{{-- <button class="btn btn-sm fw-bold btn-primary" id="btn_user_list">sensor close</button> --}}
								</td>
							</tr>
						{{-- @endforeach --}}
					</tbody>
				</table>
			</div>
		</div>
		{{-- <div class="mb-5 hover-scroll-x">
			<div class="d-grid">
				<ul class="nav nav-tabs flex-nowrap text-nowrap">
					<li class="nav-item">
						<a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 active" data-bs-toggle="tab" href="#kt_tab_pane_1">BIOGRÁFICOS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0" data-bs-toggle="tab" href="#kt_tab_pane_2">HUELLAS</a>
					</li>
				</ul>
			</div>
		</div> --}}
	</div>
</div>


<h1> </h1>
<br>

{{-- <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
	@foreach($personas as $persona)
	@foreach($persona->huellas as $finger)
		<div class="card card-flush flex-row-fluid p-6 mw-100">
			<div class="card-body text-center p-0">
				<img src="{{ asset($finger->ruta_imagen) }}" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px border-dashed border-primary" alt="" />
				<div class="mb-2">
					<div class="text-center">
						<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">{{$finger->nombre_dedo}}</span>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	@endforeach
</div> --}}