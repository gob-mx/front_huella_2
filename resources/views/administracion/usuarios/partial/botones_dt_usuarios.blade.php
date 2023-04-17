<td class="text-end">
    <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/general/gen019.svg", "svg-icon-3") !!}
    </a>

    <a id="boton_guarda_usuario" data-id="{{ $model->get('id') }}" data-bs-toggle="modal" data-bs-target="#modal_guarda_usuario" href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
    </a>

    <button data-destroy="{{ route('administracion.usuarios.edit', $model->get('id') ) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
        {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
    </a>
</td>