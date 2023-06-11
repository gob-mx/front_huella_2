<x-base-layout>

<x-slot name="actiontoolbar">
	<button class="btn btn-sm fw-bold btn-primary" id="btn_user_list">sensor close</button>
	{{-- <a href="{{ route('users_list') }}" class="btn btn-sm fw-bold btn-primary boton_edit">Enrolar Implicados</a> --}}
</x-slot>

<div class="row">
	
	<div class="col-xl-12">
		<div class="card card-flush h-xl-100">
			<div class="card-header pt-7">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bold text-gray-800">1001</span>
					<span class="text-gray-400 mt-1 fw-semibold fs-6">Expediente {{-- {{ $carpeta->carpeta_investigacion }} --}}</span>
				</h3>
				<div class="card-toolbar">
					<button class="btn btn-sm btn-light add_finger" data-id="{{$persona->id}}">Agregar huella digital</button>
				</div>
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
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="symbol symbol-50px me-3">
											<img src="{{ asset('avatars/blank.png') }}" class="" alt="" />
										</div>
										<div class="d-flex justify-content-start flex-column">
											<a href="" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $persona->nombre }}</a>
											<span class="text-gray-400 fw-semibold d-block fs-7">{{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}</span>
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
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

<br>

<div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
	@foreach($finger_list as $finger)
		<div class="card card-flush flex-row-fluid p-6 {{-- pb-5 --}} mw-100">
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
</div>


{{-- <br> --}}

	{{-- <h3>User Fingerprint List : {{$persona->nombre}}</h3>
	<button style="margin-bottom: 1%;" class="add_finger"  data-id="{{$persona->id}}">Agregar huella digital</button> --}}

	{{-- <table border="1">
		<tr>
			<th>id</th>
			<th>nombre de la huella digital</th>
			<th>imagen de huella digital</th>
			<th></th>
		</tr>
		<tbody>
			@foreach($finger_list as $finger)
			<tr>
				<td>{{$finger->id}}</td>
				<td>{{$finger->finger_name}}</td>
				<td style="text-align: center">
					<img  style="width: 30px;" src="{{asset($finger->image)}}"/>
				</td>
				<td>

				</td>
			</tr>
			@endforeach
		</tbody>
	</table> --}}

</x-base-layout>