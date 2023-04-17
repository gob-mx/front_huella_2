<div class="card-body p-0">
    <!--begin::Form group-->
    <div class="form-group">
        <!--begin::Heading-->
        <div class="mb-6">
            <h4 class="fw-bold text-dark">Theme Mode</h4>
            <div class="fw-semibold text-muted fs-7 d-block lh-1">Enjoy Dark &amp; Light modes.
                <a class="fw-semibold" href="{{ theme()->getPageUrl('documentation/getting-started/dark-mode') }}" target="_blank">See docs</a></div>
        </div>
        <!--end::Heading-->
        <!--begin::Options-->
        <div class="row" data-kt-buttons="true" data-kt-buttons-target=".form-check-image,.form-check-input" data-kt-initialized="1">
            <!--begin::Col-->
            <div class="col-6">
                <!--begin::Option-->
                <label class="form-check-image form-check-success">
                    <!--begin::Image-->
                    <div class="form-check-wrapper">
                        <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/layout/light.png') }}" class="mw-100" alt="">
                    </div>
                    <!--end::Image-->
                    <!--begin::Check-->
                    <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                        <input class="form-check-input" type="radio" value="light" name="layout-builder[theme_mode]" id="kt_layout_builder_theme_mode_light">
                        <!--begin::Label-->
                        <div class="form-check-label text-gray-700">Light</div>
                        <!--end::Label-->
                    </div>
                    <!--end::Check-->
                </label>
                <!--end::Option-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-6">
                <!--begin::Option-->
                <label class="form-check-image form-check-success">
                    <!--begin::Image-->
                    <div class="form-check-wrapper">
                        <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/layout/dark.png') }}" class="mw-100" alt="">
                    </div>
                    <!--end::Image-->
                    <!--begin::Check-->
                    <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                        <input class="form-check-input" type="radio" value="dark" name="layout-builder[theme_mode]" id="kt_layout_builder_theme_mode_dark">
                        <!--begin::Label-->
                        <div class="form-check-label text-gray-700">Dark</div>
                        <!--end::Label-->
                    </div>
                    <!--end::Check-->
                </label>
                <!--end::Option-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Options-->
    </div>
    <!--end::Form group-->
    <!--begin::Separator-->
    <div class="separator separator-dashed my-5"></div>
    <!--end::Separator-->

    
    <!--begin::Separator-->
    <div class="separator separator-dashed my-5"></div>
    <!--end::Separator-->
    <!--begin::Form group-->
    <div class="form-group">
        <!--begin::Heading-->
        <div class="mb-6">
            <h4 class="fw-bold text-dark">Layouts</h4>
            <span class="fw-semibold text-muted fs-7 lh-1">Available main layouts.</span>
        </div>
        <!--end::Heading-->
        <!--begin::Options-->
        <div class="row gy-3" data-kt-buttons="true" data-kt-buttons-target=".form-check-image:not(.disabled),.form-check-input:not([disabled])" data-kt-initialized="1">
            <!--begin::Col-->
            <div class="col-6">
                <!--begin::Option-->
                <label class="form-check-image form-check-success" {{ setting('layout.layout') === 'dark-sidebar' ? 'checked="checked"' : '' }}>
                    <!--begin::Image-->
                    <div class="form-check-wrapper">
                        <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/layout/dark-sidebar.png') }}" class="mw-100" alt="">
                    </div>
                    <!--end::Image-->
                    <!--begin::Check-->
                    <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                        <input class="form-check-input" type="radio" checked="checked" value="dark-sidebar" name="layout-builder[layout]" {{ setting('layout.layout') === 'dark-sidebar' ? 'checked="checked"' : '' }}>
                        <!--begin::Label-->
                        <div class="form-check-label text-gray-700">Dark Sidebar</div>
                        <!--end::Label-->
                    </div>
                    <!--end::Check-->
                </label>
                <!--end::Option-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-6">
                <!--begin::Option-->
                <label class="form-check-image form-check-success" {{ setting('layout.layout', 'light-sidebar') === 'light-sidebar' ? 'checked="checked"' : '' }}>
                    <!--begin::Image-->
                    <div class="form-check-wrapper">
                        <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/layout/light-sidebar.png') }}" class="mw-100" alt="">
                    </div>
                    <!--end::Image-->
                    <!--begin::Check-->
                    <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                        <input class="form-check-input" type="radio" value="light-sidebar" name="layout-builder[layout]" {{ setting('layout.layout', 'light-sidebar') === 'light-sidebar' ? 'checked="checked"' : '' }}>
                        <!--begin::Label-->
                        <div class="form-check-label text-gray-700">Light Sidebar</div>
                        <!--end::Label-->
                    </div>
                    <!--end::Check-->
                </label>
                <!--end::Option-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Options-->
    </div>
    <!--end::Form group-->

<!--begin::Separator-->
<div class="separator separator-dashed my-5"></div>
<!--end::Separator-->

<!--begin::Form group-->
<div class="form-group">
    <!--begin::Heading-->
    <div class="mb-6">
        <h4 class="fw-bold text-dark">Tipo Login</h4>
        
    </div>
    <!--end::Heading-->
    <!--begin::Options-->
    <div class="row" data-kt-buttons="true" data-kt-buttons-target=".form-check-image,.form-check-input" data-kt-initialized="1">
        <!--begin::Col-->
        <div class="col-6">
            <!--begin::Option-->
            <label class="form-check-image form-check-success">
                <!--begin::Image-->
                <div class="form-check-wrapper">
                    <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/layout/light.png') }}" class="mw-100" alt="">
                </div>
                <!--end::Image-->
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                    <input class="form-check-input" type="radio" value="auth_1" name="layout-builder[type_auth]" id="kt_layout_builder_theme_mode_light" {{ setting('layout.type_auth') === 'auth_1' ? 'checked="checked"' : '' }}>
                    <!--begin::Label-->
                    <div class="form-check-label text-gray-700">Auth_1</div>
                    <!--end::Label-->
                </div>
                <!--end::Check-->
            </label>
            <!--end::Option-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-6">
            <!--begin::Option-->
            <label class="form-check-image form-check-success">
                <!--begin::Image-->
                <div class="form-check-wrapper">
                    <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/layout/dark.png') }}" class="mw-100" alt="">
                </div>
                <!--end::Image-->
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                    <input class="form-check-input" type="radio" value="auth_2" name="layout-builder[type_auth]" id="kt_layout_builder_theme_mode_dark" {{ setting('layout.type_auth') === 'auth_2' ? 'checked="checked"' : '' }}>
                    <!--begin::Label-->
                    <div class="form-check-label text-gray-700">Auth_2</div>
                    <!--end::Label-->
                </div>
                <!--end::Check-->
            </label>
            <!--end::Option-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Options-->
</div>
<!--end::Form group-->

<!--begin::Separator-->
<div class="separator separator-dashed my-5"></div>
<!--end::Separator-->

<!--begin::Form group-->
<div class="form-group">
    <!--begin::Heading-->
    <div class="mb-6">
        <h4 class="fw-bold text-dark">Autenticar por:</h4>
        
    </div>
    <!--end::Heading-->
    <!--begin::Options-->
    <div class="row" data-kt-buttons="true" data-kt-buttons-target=".form-check-image,.form-check-input" data-kt-initialized="1">
        <!--begin::Col-->
        <div class="col-6">

            <select name="layout-builder[tipo_login]" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Auth">
                <option></option>
                <option value="curp">CURP</option>
                <option value="rfc">RFC</option>
                <option value="usuario">Usuario</option>
                <option value="email">Correo Electrónico</option>                
            </select>
           
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-6">
          
        </div>
        <!--end::Col-->
    </div>
    <!--end::Options-->
</div>
<!--end::Form group-->

</div>
