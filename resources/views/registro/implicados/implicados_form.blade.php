<x-base-layout>

	<x-slot name="actiontoolbar">
		<a href="" class="btn btn-sm fw-bold btn-primary boton_edit" data-bs-toggle="modal" data-bs-target="#kt_lista_implicados_modal">Lista Implicados</a>
	</x-slot>

<div class="card card-flush">
	<div class="card-body">

		<form id="kt_registro_implicado_form" class="form" method="post" action="{{ route('registro.implicados.store') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" onkeyup="upper(this)" />
			<div class="row mb-7">
				<div class="col-md-12 text-center">
					<h1 class="label_carpeta">{{-- Registro Implicado --}}</h1>
					<div class="text-muted fw-bold fs-5">Los campos con (<label class="required"></label> ) son obligatorios</div>
				</div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_carpeta_investigacion">
					<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
						<span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen036.svg", "svg-icon-1") !!}
						</span>
						<span class="svg-icon toggle-off svg-icon-1">
							{!! theme()->getSvgIcon("demo1/media/icons/duotune/general/gen035.svg", "svg-icon-1") !!}
						</span>
					</div>
					<h3 class="text-gray-700 fw-bold cursor-pointer mb-0">Expediente</h3>
				</div>
				<div id="kt_carpeta_investigacion" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre los datos del Expediente.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Número de Carpeta de Investigación."><b style="font-size:10px">Info</b></div>
								<input type="text" id="carpeta_investigacion" name="carpeta_investigacion" value="{{ $carpeta->carpeta_investigacion ?? '' }}" placeholder="carpeta_investigacion" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="carpeta_investigacion"><span class="required">CARPETA DE INVESTIGACIÓN</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Estatus de la Carpeta de Investigación."><b style="font-size:10px">Info</b></div>
								<select class="form-select fw-bold pb-0" id="estatus_investigacion_id" name="estatus_investigacion_id" placeholder="estatus_investigacion_id" {{-- data-control="select2" --}}>
									<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ...Seleccione una Opción...</option>
									@foreach($estatus_carpeta as $sc)
										@if(isset($carpeta->EstatusInvestigacion->id) AND $carpeta->EstatusInvestigacion->id == $sc->id)
											<option value="{{ $sc->id }}" selected>{{ $sc->estatus_carpeta }}</option>
										@else
											<option value="{{ $sc->id }}">{{ $sc->estatus_carpeta }}</option>
										@endif
									@endforeach
								</select>
								<label for="estatus_investigacion_id"><span class="required">ESTATUS CARPETA DE INVESTIGACIÓN</span></label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Número de Averiguación Previa."><b style="font-size:10px">Info</b></div>
								<input type="text" id="averiguacion_previa" name="averiguacion_previa" value="{{ $carpeta->averiguacion_previa ?? '' }}" placeholder="averiguacion_previa" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="averiguacion_previa">NÚMERO DE AVERIGUACIÓN PREVIA</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Delitos(s)."><b style="font-size:10px">Info</b></div>
								<textarea id="delito" name="delito" placeholder="delito" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $carpeta->delito ?? '' }}</textarea>
								<label for="delito">DELITO(S)</label>
							</div>
						</div>
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Descrpción del Delito."><b style="font-size:10px">Info</b></div>
								<textarea id="descripcion_delito" name="descripcion_delito" value="{{ $carpeta->descripcion_delito ?? '' }}" placeholder="descripcion_delito" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $carpeta->descripcion_delito ?? '' }}</textarea>
								<label for="descripcion_delito">DESCRPCIÓN DEL DELITO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Número Total de Implicados."><b style="font-size:10px">Info</b></div>
								<input type="text" id="total_implicados" name="total_implicados" value="{{ $carpeta->total_implicados ?? '' }}" placeholder="total_implicados" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="total_implicados">NÚMERO IMPLICADOS</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Hechos."><b style="font-size:10px">Info</b></div>
								<input type="text" id="fecha_hechos" name="fecha_hechos" value="{{ $carpeta->fecha_hechos ?? '' }}" placeholder="fecha_hechos" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="fecha_hechos">FECHA DE HECHOS</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Fecha de Registro."><b style="font-size:10px">Info</b></div>
								<input type="text" id="fecha_registro" name="fecha_registro" value="{{ $carpeta->fecha_registro ?? '' }}" placeholder="fecha_registro" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="fecha_registro">FECHA DE REGISTRO</label>
							</div>
						</div>
						<div class="col-md-6 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Observaciones."><b style="font-size:10px">Info</b></div>
								<textarea id="observaciones" name="observaciones" placeholder="observaciones" class="form-control fw-bold" style="height: 75px" onkeyup="upper(this)">{{ $carpeta->observaciones ?? '' }}</textarea>
								<label for="observaciones">OBSERVACIONES</label>
							</div>
						</div>
					</div>

				</div>
				<div class="separator separator-dashed"></div>
			</div>

			<div class="m-0">
				<div class="d-flex align-items-center collapsible pt-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_lugar_delito">
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
				<div id="kt_lugar_delito" class="collapse show fs-6 ms-1">
					<div class="mb-7 text-gray-600 fw-semibold fs-5 ps-10">Registre el Lugar del Delito.</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca País del Delito del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="pais_delito" name="pais_delito" value="{{ $carpeta->DomicilioDelito->pais ?? '' }}" placeholder="pais_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="pais_delito">PAÍS DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Calle del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="calle_delito" name="calle_delito" value="{{ $carpeta->DomicilioDelito->calle ?? '' }}" placeholder="calle_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="calle_delito">CALLE DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Exterior del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_exterior_delito" name="numero_exterior_delito" value="{{ $carpeta->DomicilioDelito->numero_exterior ?? '' }}" placeholder="numero_exterior_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_exterior_delito">NO. EXTERIOR DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-2 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca No. Interior del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="numero_interior_delito" name="numero_interior_delito" value="{{ $carpeta->DomicilioDelito->numero_interior ?? '' }}" placeholder="numero_interior_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="numero_interior_delito">NO. INTERIOR DEL DELITO</label>
							</div>
						</div>
					</div>

					<div class="row fv-row">
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Colonia del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="colonia_delito" name="colonia_delito" value="{{ $carpeta->DomicilioDelito->colonia ?? '' }}" placeholder="colonia_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="colonia_delito">COLONIA DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Delegación / Municipio del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="delegacion_municipio_delito" name="delegacion_municipio_delito" value="{{ $carpeta->DomicilioDelito->delegacion_municipio ?? '' }}" placeholder="delegacion_municipio_delito" class="form-control fw-bold" onkeyup="upper(this)" />
								<label for="delegacion_municipio_delito">DELEGACIÓN / MUNICIPIO DEL DELITO</label>
							</div>
						</div>
						<div class="col-md-4 mb-7">
							<div class="form-floating ribbon ribbon-top">
								<div class="ribbon-label bg-primary pt-0 pb-0" style="cursor:pointer;" data-bs-toggle="tooltip" title="Establezca Codogo Postal del Delito."><b style="font-size:10px">Info</b></div>
								<input type="text" id="codigo_postal_delito" name="codigo_postal_delito" value="{{ $carpeta->DomicilioDelito->codigo_postal ?? '' }}" placeholder="codigo_postal_delito" class="form-control fw-bold" onkeyup="upper(this)" />
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
						<button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Cancelar</button>
						<button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary" id="kt_registro_implicado_submit">
							<span class="indicator-label">Guadar</span>
							<span class="indicator-progress">Espere Por Favor...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

</x-base-layout>