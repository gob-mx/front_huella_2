<x-base-layout>

	<x-slot name="actiontoolbar">
		<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">Lista Implicados</a>
	</x-slot>

<div class="card card-flush">
	<div class="card-body">

		<form id="kt_ecommerce_settings_general_form" class="form" method="post" action="{{ route('registro.implicados.store') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="row mb-7">
				<div class="col-md-12 text-center">
					<h1>Registro Implicado</h1>
					<div class="text-muted fw-bold fs-5">Los campos con (<label class="required"></label> ) son obligatorios</div>
				</div>
			</div>

			<hr>
			<div class="row mb-7">
				<div class="col-md-12 text-center">
					<h2>Datos Personales</h2>
				</div>
			</div>

			<div class="row fv-row">
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Nombre del Implicado."></i></div>
						<input type="text" id="nombre" name="nombre" value="{{ old('nombre', '') }}" placeholder="nombre" class="form-control fw-bold" />
						<label for="nombre"><span class="required">NOMBRE(S)</span></label>
					</div>
				</div>
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Apellido Paterno del Implicado."></i></div>
						<input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', '') }}" placeholder="apellido_paterno" class="form-control fw-bold" />
						<label for="apellido_paterno">APELLIDO PATERNO</label>
					</div>
				</div>
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Apellido Materno del Implicado."></i></div>
						<input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', '') }}" placeholder="apellido_materno" class="form-control fw-bold" />
						<label for="apellido_materno">APELLIDO MATERNO</label>
					</div>
				</div>
			</div>

			<div class="row fv-row">
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Alias (Apodo) del Implicado."></i></div>
						<input type="text" id="alias" name="alias" value="{{ old('alias', '') }}" placeholder="alias" class="form-control fw-bold" />
						<label for="alias">ALIAS (APODO)</label>
					</div>
				</div>
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca RFC del Implicado."></i></div>
						<input type="text" id="rfc" name="rfc" value="{{ old('rfc', '') }}" placeholder="rfc" class="form-control fw-bold" />
						<label for="rfc">RFC</label>
					</div>
				</div>
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca CURP del Implicado."></i></div>
						<input type="text" id="curp" name="curp" value="{{ old('curp', '') }}" placeholder="curp" class="form-control fw-bold" />
						<label for="curp">CURP</label>
					</div>
				</div>
			</div>

			<div class="row fv-row">
				<div class="col-md-2 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Fecha de Nacimiento del Implicado."></i></div>
						<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', '') }}" placeholder="fecha_nacimiento" class="form-control fw-bold" />
						<label for="fecha_nacimiento">FECHA DE NACIMIENTO</label>
					</div>
				</div>
				<div class="col-md-2 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Estatura del Implicado."></i></div>
						<input type="text" id="estatura" name="estatura" value="{{ old('estatura', '') }}" placeholder="estatura" class="form-control fw-bold" />
						<label for="estatura">ESTATURA</label>
					</div>
				</div>
				<div class="col-md-2 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Celular del Implicado."></i></div>
						<input type="text" id="celular" name="celular" value="{{ old('celular', '') }}" placeholder="celular" class="form-control fw-bold" />
						<label for="celular">No. CELULAR</label>
					</div>
				</div>
				<div class="col-md-2 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Telefono del Implicado."></i></div>
						<input type="text" id="telefono" name="telefono" value="{{ old('telefono', '') }}" placeholder="telefono" class="form-control fw-bold" />
						<label for="telefono">No. TELEFONO</label>
					</div>
				</div>
			</div>

			<hr>
			<div class="row mb-7">
				<div class="col-md-12 text-center">
					<h2>Datos Biograficos</h2>
				</div>
			</div>

			<div class="row fv-row">
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Nacionalidad del Implicado."></i></div>
						<input type="text" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad', '') }}" placeholder="nacionalidad" class="form-control fw-bold" />
						<label for="nacionalidad">NACIONALIDAD</label>
					</div>
				</div>
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca País de Nacimiento del Implicado."></i></div>
						<input type="text" id="pais_nacimiento" name="pais_nacimiento" value="{{ old('pais_nacimiento', '') }}" placeholder="pais_nacimiento" class="form-control fw-bold" />
						<label for="pais_nacimiento">PAÍS DE NACIMIENTO</label>
					</div>
				</div>
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Lugar de Nacimiento del Implicado."></i></div>
						<input type="text" id="lugar_nacimiento" name="lugar_nacimiento" value="{{ old('lugar_nacimiento', '') }}" placeholder="lugar_nacimiento" class="form-control fw-bold" />
						<label for="lugar_nacimiento"><span class="required">LUGAR DE NACIMIENTO</span></label>
					</div>
				</div>
			</div>

			<div class="row fv-row">
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Grado de Estudios del Implicado."></i></div>
						<input type="text" id="estudios" name="estudios" value="{{ old('estudios', '') }}" placeholder="estudios" class="form-control fw-bold" />
						<label for="estudios">GRADO DE ESTUDIOS</label>
					</div>
				</div>
				<div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Ocupación del Implicado."></i></div>
						<input type="text" id="ocupacion" name="ocupacion" value="{{ old('ocupacion', '') }}" placeholder="ocupacion" class="form-control fw-bold" />
						<label for="ocupacion">OCUPACIÓN</label>
					</div>
				</div>
				{{-- <div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca RFC del Implicado."></i></div>
						<input type="text" id="rfc" name="rfc" value="{{ old('rfc', '') }}" placeholder="rfc" class="form-control fw-bold" />
						<label for="rfc">RFC</label>
					</div>
				</div> --}}
				{{-- <div class="col-md-4 mb-7">
					<div class="form-floating">
						<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
							<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca CURP del Implicado."></i></div>
						<input type="text" id="curp" name="curp" value="{{ old('curp', '') }}" placeholder="curp" class="form-control fw-bold" />
						<label for="curp">CURP</label>
					</div>
				</div> --}}
			</div>

			<div class="row py-5">
				<div class="col-md-7 offset-md-5">
					<div class="d-flex">
						<button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Cancel</button>
						<button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary">
							<span class="indicator-label">Save</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

</x-base-layout>