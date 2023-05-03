<x-base-layout>

	<x-slot name="actiontoolbar">
		<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">Lista Implicados</a>
	</x-slot>

	<div id="kt_app_content" class="app-content flex-column-fluid">
		<div id="kt_app_content_container" class="app-container container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
					<div class="card">
						<div class="card-body p-lg-17">

							<form id="modal_guarda_usuarios_form" class="form" action="#" enctype="multipart/form-data">

								<div class="mb-13 text-center">
									<h1 id="modal_titulo" class="mb-3">Agregar Implicado</h1>
									<div class="text-muted fw-bold fs-5">Los campos con (<label class="required"></label> ) son obligatorios</div>
								</div>

								{{-- <div class="mb-7">
									<label class="fs-6 fw-semibold mb-2">
										<span>Update Avatar</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
									</label>
									<div class="mt-1">
										<div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
											<div class="image-input-wrapper w-125px h-125px" style="background-image: url( {{ asset('avatars/blank.png') }} )" name="avatarImage" id="avatarImage"></div>
											<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
												<i class="bi bi-pencil-fill fs-7"></i>
												<input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg" />
												<input type="hidden" name="avatar_remove" id="avatar_remove" />
											</label>
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
												<i class="bi bi-x fs-2"></i>
											</span>
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
												<i class="bi bi-x fs-2"></i>
											</span>
										</div>
									</div>
								</div> --}}

								<div class="row g-9 mb-8">
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span class="required">Nombre(s)</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Nombre(s) de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese Nombre(s)" name="nombre" />
									</div>
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span class="required">Apellido Paterno</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Apellido Paterno de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese Apellido Paterno" name="apellido_paterno" />
									</div>
								</div>

								<div class="row g-9 mb-8">
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span>Apellido Materno</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Apellido Materno de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese Apellido Materno" name="apellido_materno" />
									</div>
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span class="required">Alias (Apodo)</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Alias de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese Alias" name="apodo" />
									</div>
								</div>

								{{-- <div class="row g-9 mb-8">
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span class="required">Correo Electrónico</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Correo Electrónico de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese Correo Electrónico" name="email" />
									</div>
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span>Teléfono</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Teléfono de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese Teléfono" name="telefono" />
									</div>
								</div> --}}

								<div class="row g-9 mb-8">
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span>RFC</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique RFC de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese RFC" name="rfc" />
									</div>
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span>CURP</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique CURP de la Persona a Registrar"></i>
										</label>
										<input type="text" class="form-control form-control-solid" placeholder="Ingrese CURP" name="curp" />
									</div>
								</div>

								{{-- <div class="row g-9 mb-8">
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span class="required">Password</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Password de la Persona a Registrar"></i>
										</label>
										<input type="password" class="form-control form-control-solid" placeholder="Ingrese Password" name="password" />
									</div>
									<div class="col-md-6 fv-row">
										<label class="d-flex align-items-center fs-6 fw-bold mb-2">
											<span class="required">Confirma Password</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Confirma Password de la Persona a Registrar"></i>
										</label>
										<input type="password" class="form-control form-control-solid" placeholder="Confirma Password de la Persona a Registrar" name="confirm-password" />
									</div>
								</div>

								<div class="d-flex flex-stack mb-8">
									<div class="me-5">
										<label class="fs-6 fw-bold">Estatus de Usuario</label>
										<div class="fs-7 fw-bold text-muted">Si Desactiva el Botón, no Permitira Entrar al Sistema</div>
									</div>
									<label class="form-check form-switch form-check-custom form-check-solid">
										<input class="form-check-input" type="checkbox" name="activo" value="1" checked="checked" />
										<span class="form-check-label fw-bold text-muted">Activo</span>
									</label>
								</div> --}}

								{{-- <div class="d-flex flex-column mb-8 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold mb-2">
										<span class="required">Roles</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Roles de la Persona a Registrar"></i>
									</label>
									<input class="form-control form-control-solid" name="roles" />
								</div> --}}

								<div class="text-center">
									<button type="reset" id="modal_guarda_usuarios_cancel" class="btn btn-light me-3">Cancel</button>
									<button type="submit" id="modal_guarda_usuarios_submit" class="btn btn-primary">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-base-layout>