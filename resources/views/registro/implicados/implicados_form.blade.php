<x-base-layout>

	<x-slot name="actiontoolbar">
		<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">Lista Implicados</a>
	</x-slot>

<div class="card card-flush">
	<div class="card-body">

		<form id="kt_ecommerce_settings_general_form" class="form" method="post" action="{{ route('registro.implicados.store') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" onkeyup="upper(this)" />
			<div class="row mb-7">
				<div class="col-md-12 text-center">
					<h1>Registro Implicado</h1>
					<div class="text-muted fw-bold fs-5">Los campos con (<label class="required"></label> ) son obligatorios</div>
				</div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_datos_personales">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Datos Personales</h3>
				</div>
				<div id="kt_datos_personales" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre los Datos Personales del Implicado.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Nombre del Implicado."></i></div>
								<input type="text" id="nombre" name="nombre" value="{{ old('nombre', '') }}" placeholder="nombre" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="nombre"><span class="required">NOMBRE(S)</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Apellido Paterno del Implicado."></i></div>
								<input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', '') }}" placeholder="apellido_paterno" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="apellido_paterno">APELLIDO PATERNO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Apellido Materno del Implicado."></i></div>
								<input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', '') }}" placeholder="apellido_materno" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="apellido_materno">APELLIDO MATERNO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Alias (Apodo) del Implicado."></i></div>
								<input type="text" id="alias" name="alias" value="{{ old('alias', '') }}" placeholder="alias" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="alias">ALIAS (APODO)</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca RFC del Implicado."></i></div>
								<input type="text" id="rfc" name="rfc" value="{{ old('rfc', '') }}" placeholder="rfc" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="rfc">RFC</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca CURP del Implicado."></i></div>
								<input type="text" id="curp" name="curp" value="{{ old('curp', '') }}" placeholder="curp" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="curp">CURP</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-2 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Fecha de Nacimiento del Implicado."></i></div>
								<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', '') }}" placeholder="fecha_nacimiento" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="fecha_nacimiento">FECHA DE NACIMIENTO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Estatura del Implicado."></i></div>
								<input type="text" id="estatura" name="estatura" value="{{ old('estatura', '') }}" placeholder="estatura" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="estatura">ESTATURA</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Celular del Implicado."></i></div>
								<input type="text" id="celular" name="celular" value="{{ old('celular', '') }}" placeholder="celular" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="celular">No. CELULAR</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Telefono del Implicado."></i></div>
								<input type="text" id="telefono" name="telefono" value="{{ old('telefono', '') }}" placeholder="telefono" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="telefono">No. TELEFONO</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_datos_biograficos">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Datos Biograficos</h3>
				</div>
				<div id="kt_datos_biograficos" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre los Datos Biograficos del Implicado.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Nacionalidad del Implicado."></i></div>
								<input type="text" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad', '') }}" placeholder="nacionalidad" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="nacionalidad">NACIONALIDAD</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca País de Nacimiento del Implicado."></i></div>
								<input type="text" id="pais_nacimiento" name="pais_nacimiento" value="{{ old('pais_nacimiento', '') }}" placeholder="pais_nacimiento" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="pais_nacimiento">PAÍS DE NACIMIENTO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Lugar de Nacimiento del Implicado."></i></div>
								<input type="text" id="lugar_nacimiento" name="lugar_nacimiento" value="{{ old('lugar_nacimiento', '') }}" placeholder="lugar_nacimiento" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="lugar_nacimiento"><span class="required">LUGAR DE NACIMIENTO</span></label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Grado de Estudios del Implicado."></i></div>
								<input type="text" id="estudios" name="estudios" value="{{ old('estudios', '') }}" placeholder="estudios" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="estudios">GRADO DE ESTUDIOS</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Ocupación del Implicado."></i></div>
								<input type="text" id="ocupacion" name="ocupacion" value="{{ old('ocupacion', '') }}" placeholder="ocupacion" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="ocupacion">OCUPACIÓN</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_domicilio_implicado">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Domicilio del Implicado</h3>
				</div>
				<div id="kt_domicilio_implicado" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre el Domicilio del Implicado.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Calle del Domicilio."></i></div>
								<input type="text" id="calle" name="calle" value="{{ old('calle', '') }}" placeholder="calle" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="calle">CALLE DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Exterior del Domicilio."></i></div>
								<input type="text" id="numero_exterior" name="numero_exterior" value="{{ old('numero_exterior', '') }}" placeholder="numero_exterior" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="numero_exterior">NO. EXTERIOR DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Interior del Domicilio."></i></div>
								<input type="text" id="numero_interior" name="numero_interior" value="{{ old('numero_interior', '') }}" placeholder="numero_interior" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="numero_interior">NO. INTERIOR DEL DOMICILIO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Colonia del Domicilio."></i></div>
								<input type="text" id="colonia" name="colonia" value="{{ old('colonia', '') }}" placeholder="colonia" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="colonia">COLONIA DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Delegación / Municipio del Domicilio."></i></div>
								<input type="text" id="delegacion_municipio" name="delegacion_municipio" value="{{ old('delegacion_municipio', '') }}" placeholder="delegacion_municipio" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="delegacion_municipio">DELEGACIÓN / MUNICIPIO DEL DOMICILIO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Codogo Postal del Domicilio."></i></div>
								<input type="text" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal', '') }}" placeholder="codigo_postal" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="codigo_postal">CODOGO POSTAL DEL DOMICILIO</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_domicilio_implicado">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Lugar del Delito</h3>
				</div>
				<div id="kt_domicilio_implicado" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre el Lugar del Delito.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca País del Delito del Delito."></i></div>
								<input type="text" id="pais_delito" name="pais_delito" value="{{ old('pais_delito', '') }}" placeholder="pais_delito" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="pais_delito">PAÍS DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Calle del Delito."></i></div>
								<input type="text" id="calle_delito" name="calle_delito" value="{{ old('calle_delito', '') }}" placeholder="calle_delito" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="calle_delito">CALLE DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Exterior del Delito."></i></div>
								<input type="text" id="numero_exterior_delito" name="numero_exterior_delito" value="{{ old('numero_exterior_delito', '') }}" placeholder="numero_exterior_delito" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="numero_exterior_delito">NO. EXTERIOR DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca No. Interior del Delito."></i></div>
								<input type="text" id="numero_interior_delito" name="numero_interior_delito" value="{{ old('numero_interior_delito', '') }}" placeholder="numero_interior_delito" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="numero_interior_delito">NO. INTERIOR DEL DELITO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Colonia del Delito."></i></div>
								<input type="text" id="colonia_delito" name="colonia_delito" value="{{ old('colonia_delito', '') }}" placeholder="colonia_delito" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="colonia_delito">COLONIA DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Delegación / Municipio del Delito."></i></div>
								<input type="text" id="delegacion_municipio_delito" name="delegacion_municipio_delito" value="{{ old('delegacion_municipio_delito', '') }}" placeholder="delegacion_municipio_delito" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="delegacion_municipio_delito">DELEGACIÓN / MUNICIPIO DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating">
								<div class="ribbon ribbon-triangle ribbon-top-end border-gray-0">
									<i class="fas fa-exclamation-circle mt-n5 fs-7 text-gray-500" data-bs-toggle="tooltip" title="Establezca Codogo Postal del Delito."></i></div>
								<input type="text" id="codigo_postal_delito" name="codigo_postal_delito" value="{{ old('codigo_postal_delito', '') }}" placeholder="codigo_postal_delito" class="form-control form-control-solid fw-bold" onkeyup="upper(this)" />
								<label for="codigo_postal_delito">CODOGO POSTAL DEL DELITO</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
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