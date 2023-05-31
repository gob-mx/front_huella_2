<div class="modal fade" id="kt_modal_agrega_implicado" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content rounded">
			<div class="modal-header justify-content-end border-0 pb-0">
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<span class="svg-icon svg-icon-1">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
						</svg>
					</span>
				</div>
			</div>



			<div class="modal-body pt-0 pb-15 px-5 px-xl-20">

				<div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">

					<div class="mb-13 text-center">
						<h1 class="mb-3">Agregar Implicado a:</h1>
						<h2 class="mb-3">EXPEDIENTE {{ $carpeta->carpeta_investigacion }}</h2>
						<div class="text-muted fw-semibold fs-5">Los campos con (<label class="required"></label> )
						<a href="#" class="link-primary fw-bold">son obligatorios</a>.</div>
					</div>

					<form id="kt_agrega_implicado_form" class="form" method="post" action="{{ route('registro.implicados.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input type="hidden" name="store_implicado" value="1" />
						<input type="hidden" name="carpeta_investigacion_id" value="{{ $carpeta->id }}" />

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
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Nombre del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="nombre" name="nombre" placeholder="nombre" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="nombre"><span class="required">NOMBRE(S)</span></label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Paterno del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido_paterno" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="apellido_paterno">APELLIDO PATERNO</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Materno del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido_materno" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="apellido_materno">APELLIDO MATERNO</label>
										</div>
									</div>
								</div>

							</div>
							<div class="separator separator-dashed"></div>
						</div>

						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary" id="kt_agrega_implicado_submit">
								<span class="indicator-label">Agregar Implicado</span>
								<span class="indicator-progress">Espere Por Favor...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>


					</form>
				</div>
			</div>



			{{-- <div class="modal-body pt-0 pb-15 px-5 px-xl-20">

				<div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">

					<div class="mb-13 text-center">
						<h1 class="mb-3">Agregar Implicado a:</h1>
						<h2 class="mb-3">Carpeta de Investigación {{ $carpeta->carpeta_investigacion }}</h2>
						<div class="text-muted fw-semibold fs-5">Los campos con (<label class="required"></label> )
						<a href="#" class="link-primary fw-bold">son obligatorios</a>.</div>
					</div>

					<form id="kt_agrega_implicado_form" class="form" method="post" action="{{ route('registro.implicados.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<input type="hidden" name="store_implicado" value="1" />
						<input type="hidden" name="carpeta_investigacion_id" value="{{ $carpeta->id }}" />

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
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Nombre del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="nombre" name="nombre" placeholder="nombre" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="nombre"><span class="required">NOMBRE(S)</span></label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Paterno del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido_paterno" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="apellido_paterno">APELLIDO PATERNO</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Apellido Materno del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido_materno" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="apellido_materno">APELLIDO MATERNO</label>
										</div>
									</div>
								</div>

								<div class="row fv-row">
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Alias (Apodo) del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="alias" name="alias" placeholder="alias" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="alias">ALIAS (APODO)</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca RFC del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="rfc" name="rfc" placeholder="rfc" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="rfc">RFC</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca CURP del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="curp" name="curp" placeholder="curp" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="curp">CURP</label>
										</div>
									</div>
								</div>

								<div class="row fv-row">
									<div class="col-md-2 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Nacimiento del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="fecha_nacimiento">FECHA DE NACIMIENTO</label>
										</div>
									</div>
									<div class="col-md-2 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Estatura del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="estatura" name="estatura" placeholder="estatura" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="estatura">ESTATURA</label>
										</div>
									</div>
									<div class="col-md-2 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Celular del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="celular" name="celular" placeholder="celular" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="celular">No. CELULAR</label>
										</div>
									</div>
									<div class="col-md-2 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Telefono del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="telefono" name="telefono" placeholder="telefono" class="form-control fw-bold" onkeyup="upper(this)" />
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
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Nacionalidad del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="nacionalidad" name="nacionalidad" placeholder="nacionalidad" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="nacionalidad">NACIONALIDAD</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca País de Nacimiento del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="pais_nacimiento" name="pais_nacimiento" placeholder="pais_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="pais_nacimiento">PAÍS DE NACIMIENTO</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Lugar de Nacimiento del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="lugar_nacimiento" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="lugar_nacimiento">LUGAR DE NACIMIENTO</label>
										</div>
									</div>
								</div>

								<div class="row fv-row">
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Grado de Estudios del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="estudios" name="estudios" placeholder="estudios" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="estudios">GRADO DE ESTUDIOS</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Ocupación del Implicado."><b style="font-size:10px">Info</b></div>
											<input type="text" id="ocupacion" name="ocupacion" placeholder="ocupacion" class="form-control fw-bold" onkeyup="upper(this)" />
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
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Calle del Domicilio."><b style="font-size:10px">Info</b></div>
											<input type="text" id="calle" name="calle" placeholder="calle" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="calle">CALLE DEL DOMICILIO</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Exterior del Domicilio."><b style="font-size:10px">Info</b></div>
											<input type="text" id="numero_exterior" name="numero_exterior" placeholder="numero_exterior" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="numero_exterior">NO. EXTERIOR DEL DOMICILIO</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Interior del Domicilio."><b style="font-size:10px">Info</b></div>
											<input type="text" id="numero_interior" name="numero_interior" placeholder="numero_interior" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="numero_interior">NO. INTERIOR DEL DOMICILIO</label>
										</div>
									</div>
								</div>

								<div class="row fv-row">
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Colonia del Domicilio."><b style="font-size:10px">Info</b></div>
											<input type="text" id="colonia" name="colonia" placeholder="colonia" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="colonia">COLONIA DEL DOMICILIO</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Delegación / Municipio del Domicilio."><b style="font-size:10px">Info</b></div>
											<input type="text" id="delegacion_municipio" name="delegacion_municipio" placeholder="delegacion_municipio" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="delegacion_municipio">DELEGACIÓN / MUNICIPIO DEL DOMICILIO</label>
										</div>
									</div>
									<div class="col-md-4 mb-7">
										<div class="form-floating ribbon ribbon-top">
											<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Codogo Postal del Domicilio."><b style="font-size:10px">Info</b></div>
											<input type="text" id="codigo_postal" name="codigo_postal" placeholder="codigo_postal" class="form-control fw-bold" onkeyup="upper(this)" />
											<label for="codigo_postal">CODOGO POSTAL DEL DOMICILIO</label>
										</div>
									</div>
								</div>

							</div>
							<div class="separator separator-dashed"></div>
						</div>

						<div class="d-flex flex-center flex-row-fluid pt-12">
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary" id="kt_agrega_implicado_submit">
								<span class="indicator-label">Agregar Implicado</span>
								<span class="indicator-progress">Espere Por Favor...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>


					</form>
				</div>
			</div> --}}
		</div>
	</div>
</div>