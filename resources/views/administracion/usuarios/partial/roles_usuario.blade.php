<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
	<li class="nav-item">
		<a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_roles">Roles</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_permisos">Permisos</a>
	</li>
	{{-- <li class="nav-item ms-auto">
		<button type="button" class="btn btn-light me-5" id="kt_modal_update_role_cancel">Cancel</button>
		<button type="button" class="btn btn-primary" id="kt_modal_update_role_submit">
			<span class="indicator-label">Save</span>
			<span class="indicator-progress">Please wait...
			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
		</button>
	</li> --}}
</ul>
<form class="form" id="kt_modal_update_role_form">
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="kt_user_roles" role="tabpanel">

			<div class="card pt-4 mb-6 mb-xl-9">
				<div class="card-header border-0">
					<div class="card-title flex-column">
						<h2>Roles</h2>
						<div class="fs-6 fw-semibold text-muted">Elija qué rol o roles desempeñará <b>{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</b>.</div>
					</div>
				</div>
				<div class="card-body">
					<div class="fv-row">
						<div class="table-responsive">
							<table class="table align-middle table-row-dashed fs-6 gy-5">
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>
											<div class="d-flex">
												<label class="form-check form-check-custom form-check-solid align-items-center" style="cursor: pointer">
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fw-bold fs-5 mb-0" for="kt_roles_select_all">Seleccionar Todos los Roles</span>
													</span>&nbsp;&nbsp;&nbsp;
													<input class="form-check-input me-3" type="checkbox" name="rolesAll" value="" id="kt_roles_select_all">
												</label>
											</div>
										</td>
									</tr>
									@foreach($roles_permisos as $rol)
										<tr>
											<td>
												<div class="d-flex">
													<label class="form-check form-check-custom form-check-solid align-items-start" style="cursor: pointer">
														<input class="form-check-input me-3" type="checkbox" name="roles[]" value="{{ $rol['name'] }}" {{in_array($rol['id'], $user_roles) ? 'checked' : 'no-checked'}}>
														<span class="form-check-label d-flex flex-column align-items-start">
															<span class="fw-bold fs-5 mb-0">{{ $rol['name'] }}</span>
															{{-- <span class="text-muted fs-6">Permisos 
																<span class="svg-icon svg-icon-2">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M4.7 17.3V7.7C4.7 6.59543 5.59543 5.7 6.7 5.7H9.8C10.2694 5.7 10.65 5.31944 10.65 4.85C10.65 4.38056 10.2694 4 9.8 4H5C3.89543 4 3 4.89543 3 6V19C3 20.1046 3.89543 21 5 21H18C19.1046 21 20 20.1046 20 19V14.2C20 13.7306 19.6194 13.35 19.15 13.35C18.6806 13.35 18.3 13.7306 18.3 14.2V17.3C18.3 18.4046 17.4046 19.3 16.3 19.3H6.7C5.59543 19.3 4.7 18.4046 4.7 17.3Z" fill="currentColor" />
																		<rect x="21.9497" y="3.46448" width="13" height="2" rx="1" transform="rotate(135 21.9497 3.46448)" fill="currentColor" />
																		<path d="M19.8284 4.97161L19.8284 9.93937C19.8284 10.5252 20.3033 11 20.8891 11C21.4749 11 21.9497 10.5252 21.9497 9.93937L21.9497 3.05029C21.9497 2.498 21.502 2.05028 20.9497 2.05028L14.0607 2.05027C13.4749 2.05027 13 2.52514 13 3.11094C13 3.69673 13.4749 4.17161 14.0607 4.17161L19.0284 4.17161C19.4702 4.17161 19.8284 4.52978 19.8284 4.97161Z" fill="currentColor" />
																	</svg>
																</span>
															</span> --}}
														</span>
													</label>
												</div>
											</td>
											{{-- <td>
												@foreach($rol['permissions'] as $permiso)
													<div class="badge badge-lg badge-light-primary fs-7 m-1">{{ $permiso['name'] }}</div>
												@endforeach
											</td> --}}
											<td class="p-0 pt-2">
												<table class="table align-middle table-row-dashed fs-6 gy-5">
													<tbody class="text-gray-600 fw-semibold">
														@php $modul_print = ''; @endphp
														@foreach($rol['permissions'] as $permiso)

														@foreach($moduls as $modulo_id => $modulo)
															@if( $permiso['id'] === $modulo_id )
															@if( $modulo !==  $modul_print )
															@php $modul_print = $modulo; @endphp
															<tr>
																<td class="p-0">
																	<div class="badge badge-lg badge-light-warning fs-7 m-1">{{ $modulo }}</div>
															@endif
															@endif
														@endforeach
															<div class="badge badge-lg badge-light-primary fs-7 m-1">{{ $permiso['name'] }}</div>
														@endforeach
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade show" id="kt_user_permisos" role="tabpanel">
			<div class="card pt-4 mb-6 mb-xl-9">
				<div class="card-header border-0">
					<div class="card-title flex-column">
						<h2>Roles</h2>
						<div class="fs-6 fw-semibold text-muted">Elija qué rol o roles desempeñará <b>{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</b>.</div>
					</div>
				</div>
				<div class="card-body">
					<div class="fv-row">
						<div class="table-responsive">

							<table class="table align-middle table-row-dashed fs-6 gy-5">
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td class="text-gray-800 text-center pe-6">MODULOS</td>
										<td>
											<label class="form-check form-check-custom form-check-solid me-9" style="cursor: pointer">
												<input class="form-check-input kt_permisos_select_all" type="checkbox" value="" name="permisosAll" id="kt_permisos_select_all" />
												<span class="form-check-label" for="kt_permisos_select_all">TODOS LOS PERMISOS <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Permite un acceso completo al sistema"></i></span>
											</label>
										</td>
									</tr>
									@foreach($moduls_permissions as $modulo)
										<tr>
											<td class="text-center pe-6">
												<span class="badge py-3 px-4 fs-7 badge-light-warning">{{ $modulo->name }}</span>
											</td>
											<td>

													@foreach($modulo->Permissions AS $permiso)

														@php $color = 'badge-light-danger'; @endphp
														@foreach( $directPermissions as $DPermiso )
															@if($DPermiso->id == $permiso->id)
																@php $color = 'badge-light-primary'; @endphp
															@endif
														@endforeach

														<span class="permisosSpan">

															<label class="badge badge-lg {{ $color }} fs-7 m-1 permisosLabel" style="cursor: pointer">
																<span class="form-check-label">{{ $permiso->name }}</span>
															</label>
															<input class="form-check-input permisos" type="checkbox" style="display:none;" value="{{ $permiso->name }}" name="permisos[]"
																@foreach( $directPermissions as $DPermiso )
																	@if($DPermiso->id == $permiso->id)
																	checked="true"
																	@endif
																@endforeach
															/>
														</span>
													@endforeach

											</td>
										</tr>
									@endforeach
									
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-end align-items-center mt-12">
			<button type="button" class="btn btn-light me-5" id="kt_modal_update_role_cancel">Cancelar</button>
			<button type="button" class="btn btn-primary" id="kt_modal_update_role_submit" data-id="{{ $user->id }}">
				<span class="indicator-label">Guardar Permisos</span>
				<span class="indicator-progress">Procesando...
				<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
			</button>
		</div>
		<input type="hidden" name="update" value="">
	</div>
</form>