@php
    $label = $label ?? __('Enviar');
    $message = $message ?? __('Por favor espere...');
@endphp

<!--begin::Indicator-->
<span class="indicator-label">
    {{ $label }}
</span>
<span class="indicator-progress">
    {{ $message }}
    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
<!--end::Indicator-->
