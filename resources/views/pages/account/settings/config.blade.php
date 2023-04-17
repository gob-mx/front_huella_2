<x-base-layout>

<div class="card">
    <!--begin::Header-->
    <div class="card-header card-header-stretch overflow-auto">
        <!--begin::Tabs-->
        <ul class="nav nav-stretch nav-line-tabs fw-semibold fs-6 border-transparent flex-nowrap" role="tablist" id="kt_layout_builder_tabs">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_builder_main" role="tab" aria-selected="true">Main</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_builder_layout" role="tab" aria-selected="false" tabindex="-1">Layout</a>
            </li>           
            
        </ul>
        <!--end::Tabs-->
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form class="form" method="GET" id="kt_layout_builder_form" action="{{ route('mantenimiento')}}">
        <!--begin::Body-->
        <div class="card-body">
            <div class="tab-content pt-3">
                <!--begin::Tab pane-->
                <div class="tab-pane active show" id="kt_builder_main" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-6 pe-lg-15">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <!--begin::Heading-->
                                <div class="mb-6">
                                    <h4 class="fw-bold text-dark">Theme Mode</h4>
                                    <div class="fw-semibold text-muted fs-7 d-block lh-1">Enjoy Dark &amp; Light modes. 
                                    <a class="fw-semibold" href="https://preview.keenthemes.com/html/metronic/docs/getting-started/dark-mode" target="_blank">See docs</a></div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Options-->
                                <div class="row" data-kt-buttons="true" data-kt-buttons-target=".form-check-image,.form-check-input" data-kt-initialized="1">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Option-->
                                        <label class="form-check-image form-check-success active">
                                            <!--begin::Image-->
                                            <div class="form-check-wrapper">
                                                <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/layout/light.png') }}" class="mw-100" alt="">
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Check-->
                                            <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                                                <input class="form-check-input" type="radio" value="light" name="theme_mode" id="kt_layout_builder_theme_mode_light">
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
                                                <input class="form-check-input" type="radio" value="dark" name="theme_mode" id="kt_layout_builder_theme_mode_dark">
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
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-6"></div>
                    <!--end::Separator-->
                    <!--begin::Form group-->
                    <div class="form-group d-flex flex-stack">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column">
                            <h4 class="fw-bold text-dark">Page Loader</h4>
                            <div class="fs-7 fw-semibold text-muted">Display page loading indicator</div>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Option-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Check-->
                            <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-7">
                                <input class="form-check-input" type="radio" checked="checked" value="none" id="kt_builder_page_loader_type_none" name="layout-builder[layout][app][page-loader][type]">
                                <!--begin::Label-->
                                <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_page_loader_type_none">None</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Check-->
                            <!--begin::Check-->
                            <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-7">
                                <input class="form-check-input" type="radio" value="default" id="kt_builder_page_loader_type_default" name="layout-builder[layout][app][page-loader][type]">
                                <!--begin::Label-->
                                <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_page_loader_type_default">Default</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Check-->
                            <!--begin::Check-->
                            <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-7">
                                <input class="form-check-input" type="radio" value="spinner-message" id="kt_builder_page_loader_type_spinner-message" name="layout-builder[layout][app][page-loader][type]">
                                <!--begin::Label-->
                                <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_page_loader_type_spinner-message">Message</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Check-->
                            <!--begin::Check-->
                            <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-7">
                                <input class="form-check-input" type="radio" value="spinner-logo" id="kt_builder_page_loader_type_spinner-logo" name="layout-builder[layout][app][page-loader][type]">
                                <!--begin::Label-->
                                <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_page_loader_type_spinner-logo">Logo</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Check-->
                        </div>
                        <!--end::Option-->
                    </div>
                    <!--end::Form group-->

                     <!--begin::Separator-->
                     <div class="separator separator-dashed my-6"></div>
                     <!--end::Separator-->

                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-6 pe-lg-15">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <!--begin::Heading-->
                                <div class="mb-6">
                                    <h4 class="fw-bold text-dark">Modo Mantenimiento</h4>
                                    <div class="fw-semibold text-muted fs-7 d-block lh-1">Enjoy Dark &amp; Light modes. 
                                    <a class="fw-semibold" href="https://preview.keenthemes.com/html/metronic/docs/getting-started/dark-mode" target="_blank">See docs</a></div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Options-->
                                <div class="row" data-kt-buttons="true" data-kt-buttons-target=".form-check-image,.form-check-input" data-kt-initialized="1">
                                    
                                    <div class="col-4">
                                        <label class="form-check-clip text-center">
                                            <input class="btn-check" type="radio" value="false"  name="layout-builder[mantenimiento]" {{ setting('layout.mantenimiento') === 'false' ? 'checked="checked"' : '' }}/>
                                            <div class="form-check-wrapper">
                                                <div class="form-check-indicator"></div>
                                                <img class="form-check-content" src="{{ asset(theme()->getMediaUrlPath() . 'stock/600x400/deshabilitar.png') }} "/>
                                            </div>
                                
                                            <div class="form-check-label">
                                                Deshabilitado
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->
                                
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <label class="form-check-clip text-center">
                                            <input class="btn-check" type="radio" value="true" name="layout-builder[mantenimiento]" {{ setting('layout.mantenimiento') === 'true' ? 'checked="checked"' : '' }}/>
                                            <div class="form-check-wrapper">
                                                <div class="form-check-indicator"></div>
                                                <img class="form-check-content" src="{{ asset(theme()->getMediaUrlPath() . 'stock/600x400/error_503_1.jpg') }}"/>
                                            </div>
                                
                                            <div class="form-check-label">
                                                Habilitar Mantenimiento 1
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->
                                
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <label class="form-check-clip text-center">
                                            <input class="btn-check" type="radio" value="true" name="layout-builder[mantenimiento]"/>
                                            <div class="form-check-wrapper">
                                                <div class="form-check-indicator"></div>
                                                <img class="form-check-content" src="{{ asset(theme()->getMediaUrlPath() . 'stock/600x400/error_503_2.jpg') }}"/>
                                            </div>
                                
                                            <div class="form-check-label">
                                                Habilitar Mantenimiento 2
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->

                                
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Form group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->



                     
                </div>
                <!--end::Tab pane-->

                <!--begin::Tab pane-->
                <div class="tab-pane" id="kt_builder_layout" role="tabpanel">
                    <!--begin::Heading-->
                    <div class="mb-6">
                        <h4 class="fw-bold text-dark">Layouts</h4>
                        <span class="fw-semibold text-muted fs-7 lh-1">4 main layout options.</span>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Options-->
                    <div class="row gy-5" data-kt-buttons="true" data-kt-buttons-target=".form-check-image:not(.disabled),.form-check-input:not([disabled])" data-kt-initialized="1">
                        <!--begin::Col-->
                        <div class="col-lg-3">
                            <!--begin::Option-->
                            <label class="form-check-image form-check-success">
                                <!--begin::Image-->
                                <div class="form-check-wrapper">
                                    <img src="/metronic8/demo1/assets/media/misc/layout/dark-sidebar.png" class="mw-100" alt="">
                                </div>
                                <!--end::Image-->
                                <!--begin::Check-->
                                <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                                    <input class="form-check-input" type="radio" value="dark-sidebar" name="layout-builder[layout][app][general][layout]">
                                    <!--begin::Label-->
                                    <div class="form-check-label text-gray-800">Dark Sidebar</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Check-->
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-3">
                            <!--begin::Option-->
                            <label class="form-check-image form-check-success">
                                <!--begin::Image-->
                                <div class="form-check-wrapper">
                                    <img src="/metronic8/demo1/assets/media/misc/layout/light-sidebar.png" class="mw-100" alt="">
                                </div>
                                <!--end::Image-->
                                <!--begin::Check-->
                                <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                                    <input class="form-check-input" type="radio" value="light-sidebar" name="layout-builder[layout][app][general][layout]">
                                    <!--begin::Label-->
                                    <div class="form-check-label text-gray-800">Light Sidebar</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Check-->
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-3">
                            <!--begin::Option-->
                            <label class="form-check-image form-check-success active">
                                <!--begin::Image-->
                                <div class="form-check-wrapper">
                                    <img src="/metronic8/demo1/assets/media/misc/layout/dark-header.png" class="mw-100" alt="">
                                </div>
                                <!--end::Image-->
                                <!--begin::Check-->
                                <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                                    <input class="form-check-input" type="radio" checked="checked" value="dark-header" name="layout-builder[layout][app][general][layout]">
                                    <!--begin::Label-->
                                    <div class="form-check-label text-gray-800">Dark Header</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Check-->
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-3">
                            <!--begin::Option-->
                            <label class="form-check-image form-check-success">
                                <!--begin::Image-->
                                <div class="form-check-wrapper">
                                    <img src="/metronic8/demo1/assets/media/misc/layout/light-header.png" class="mw-100" alt="">
                                </div>
                                <!--end::Image-->
                                <!--begin::Check-->
                                <div class="form-check form-check-custom form-check-success form-check-sm form-check-solid">
                                    <input class="form-check-input" type="radio" value="light-header" name="layout-builder[layout][app][general][layout]">
                                    <!--begin::Label-->
                                    <div class="form-check-label text-gray-800">Light Header</div>
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
                <!--end::Tab pane-->
               
            </div>
        </div>
        <!--end::Body-->

        <!--begin::Footer-->
        <div class="card-footer d-flex py-8">
            <input type="hidden" id="kt_layout_builder_tab" name="layout-builder[tab]" value="kt_builder_toolbar">
            <input type="hidden" id="kt_layout_builder_action" name="">
            <button type="submit" id="kt_layout_builder_preview" class="btn btn-primary me-2">
                <span class="indicator-label">Aplicar</span>
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            
        </div>
        <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>

    
</x-base-layout>