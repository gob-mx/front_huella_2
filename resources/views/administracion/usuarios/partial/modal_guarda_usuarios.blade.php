
<div class="modal fade" id="modal_guarda_usuarios" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<div class="modal-content rounded">
			<div class="modal-header pb-0 border-0 justify-content-end">
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
						</svg>
					</span>
				</div>
			</div>
			<div class="modal-body px-10 px-lg-15 pt-0 pb-15">
				<div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">

					<form id="modal_guarda_usuarios_form" class="form" action="#" enctype="multipart/form-data">

						<div class="mb-13 text-center">
							<h1 id="modal_titulo" class="mb-3">Agregar Usuario</h1>
							<div class="text-muted fw-bold fs-5">Los campos con (<label class="required"></label> ) son obligatorios</div>
						</div>

						{{-- {{ dd( Storage::disk('avatars')->get('nemesis.jpg') ) }} --}}
						{{-- {{ dd( $user->info->avatar ) }} --}}
						{{-- {{ dd( Storage::disk('avatars') ) }} --}}
						@php if (!isset($user)) { $user['info']['avatar'] = null; } @endphp

						<div class="mb-7">
							<label class="fs-6 fw-semibold mb-2">
								<span>Update Avatar</span>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
							</label>
							<div class="mt-1">
								{{-- <style>.image-input-placeholder { background-image: url({{ asset('avatars/blank.png') }}); } [data-theme="dark"] .image-input-placeholder { background-image: url({{ asset('avatars/blank.png') }}); }</style> --}}
								<div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
									<div class="image-input-wrapper w-125px h-125px" style="background-image: url( {{ (isset($user->info->avatar) AND $user->info->avatar !== null AND $user->info->avatar !== '')  ? asset('avatars/'.$user->info->avatar) : asset('avatars/blank.png') }} )" name="avatarImage" id="avatarImage"></div>
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
						</div>

						<div class="row g-9 mb-8">
							<div class="col-md-6 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Usuario</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Usuario de la Persona a Registrar"></i>
								</label>
								<input type="text" class="form-control form-control-solid" placeholder="Ingrese Usuario" name="usuario" />
							</div>
							<div class="col-md-6 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Nombre(s)</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Nombre(s) de la Persona a Registrar"></i>
								</label>
								<input type="text" class="form-control form-control-solid" placeholder="Ingrese Nombre(s)" name="nombre" />
							</div>
						</div>

						<div class="row g-9 mb-8">
							<div class="col-md-6 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Apellido Paterno</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Apellido Paterno de la Persona a Registrar"></i>
								</label>
								<input type="text" class="form-control form-control-solid" placeholder="Ingrese Apellido Paterno" name="apellido_paterno" />
							</div>
							<div class="col-md-6 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span>Apellido Materno</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Especifique Apellido Materno de la Persona a Registrar"></i>
								</label>
								<input type="text" class="form-control form-control-solid" placeholder="Ingrese Apellido Materno" name="apellido_materno" />
							</div>
						</div>

						<div class="row g-9 mb-8">
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
						</div>

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

						<div class="row g-9 mb-8">
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
						</div>

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