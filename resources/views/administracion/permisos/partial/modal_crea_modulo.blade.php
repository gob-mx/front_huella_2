<div class="modal fade" id="kt_modal_add_modul" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="fw-bold">Agregar a Módulo</h2>
				<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modul-modal-action="close">
					<span class="svg-icon svg-icon-1">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
						</svg>
					</span>
				</div>
			</div>
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

				<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
					<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
							<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
							<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
						</svg>
					</span>
					<div class="d-flex flex-stack flex-grow-1">
						<div class="fw-semibold">
							<div class="fs-6 text-gray-700">
								<strong class="me-1">Información!</strong><br>
								<span class="text-danger">"El Acrónimo del módulo será el sufijo del los permisos"</span>
								<br>Ejemplo: <b class="text-primary">REGISTROS AUDITORÍA</b> ==> <b class="text-primary">reg_audit</b>
							</div>
						</div>
					</div>
				</div>

				<form id="kt_modal_add_modul_form" class="form" action="#">
					<div class="fv-row mb-7">
						<label class="fs-6 fw-semibold form-label mb-2">
							<span class="required">Nombre del Módulo</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Los nombres de los módulos deben ser únicos."></i>
						</label>
						<input class="form-control form-control-solid" placeholder="Ingresa Nombre del Módulo" name="name" onkeyup="this.value = this.value.toUpperCase().replace(/[^a-zA-Zá-úÁ-Ú0-9\s]/g, '')" />
					</div>

					<div class="fv-row mb-7">
						<label class="fs-6 fw-semibold form-label mb-2">
							<span class="required">Acrónimo del Módulo</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content='Ingresa Abreviatura del Módulo. <br><b>Ejemplo: Mi Perfil ==> mpfl</b><br><span class="text-danger">"Acrónimo Sera Sufijo del Permiso"</span>'></i>
						</label>
						<input class="form-control form-control-solid" placeholder="Ingresa Abreviatura del Módulo" name="acronym" onkeyup="this.value = this.value.toLowerCase().replace(/[^a-zA-Z0-9_]/g, '')" />
					</div>

					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3" data-kt-modul-modal-action="cancel">Descartar Formulario</button>
						<button type="submit" class="btn btn-primary" data-kt-modul-modal-action="submit">
							<span class="indicator-label">Crear Módulo</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>