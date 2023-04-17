<div class="modal fade kt_modal_update_role" id="kt_modal_update_role_{{ $rol->id }}" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="fw-bold">Edita Rol</h2>
				<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
					<span class="svg-icon svg-icon-1">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
						</svg>
					</span>
				</div>
			</div>
			<div class="modal-body scroll-y mx-5 my-7">
				<form id="kt_modal_update_role_form_{{ $rol->id }}" class="form" action="#">
					

						<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
							<div class="fv-row mb-5">
								<label class="fs-5 fw-bold form-label mb-2">
									<span class="required">Nombre Rol</span>
								</label>
								<input class="form-control form-control-solid" placeholder="Ingresa Nombre Rol" name="name" value="{{$rol->name}}" onkeyup="this.value = this.value.toUpperCase().replace(/[^a-zA-Zá-úÁ-Ú0-9\s]/g, '')" />
							</div>
							<div class="fv-row">
								<div class="table-responsive">
									<table class="table align-middle table-row-dashed fs-6 gy-5">
										<tbody class="text-gray-600 fw-semibold">
											<tr>
												<td class="text-gray-800 text-center pe-6">MODULOS</td>
												<td>
													<label class="form-check form-check-custom form-check-solid me-9" style="cursor: pointer">
														<input class="form-check-input kt_roles_select_all" type="checkbox" value="" id="kt_roles_select_all_{{ $rol->id }}" />
														<span class="form-check-label" for="kt_roles_select_all">TODOS LOS PERMISOS <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Permite un acceso completo al sistema"></i></span>
													</label>
												</td>
											</tr>
											@foreach($modulos as $modulo)
												<tr>
													<td class="text-center pe-6">
														<span class="badge py-3 px-4 fs-7 badge-light-warning">{{ $modulo->name }}</span>
													</td>
													<td>
														{{-- <div class="d-flex"> --}}
															@foreach($modulo->Permissions AS $permiso)

																@php $color = 'badge-light-danger'; @endphp
																@foreach( $rol->permissions as $rolPermiso )
																	@if($rolPermiso->id == $permiso->id)
																		@php $color = 'badge-light-primary'; @endphp
																	@endif
																@endforeach

																<span class="permisosSpan_{{ $rol->id }}">

																	<label class="badge badge-lg {{ $color }} fs-7 m-1 permisosLabel" style="cursor: pointer">
																		<span class="form-check-label">{{ $permiso->name }}</span>
																	</label>
																	<input class="form-check-input permisos" type="checkbox" style="display:none;" value="{{ $permiso->id }}" name="permisos[]"
																		@foreach( $rol->permissions as $rolPermiso )
																			@if($rolPermiso->id == $permiso->id)
																			checked="true"
																			@endif
																		@endforeach
																	/>
																</span>
															@endforeach
														{{-- </div> --}}
													</td>
												</tr>
											@endforeach
											
										</tbody>
									</table>
								</div>
							</div>
						</div>


					<div class="text-center pt-5">
						<button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Descartar</button>
						<button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
							<span class="indicator-label">Editar Rol</span>
							<span class="indicator-progress">Procesando...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>