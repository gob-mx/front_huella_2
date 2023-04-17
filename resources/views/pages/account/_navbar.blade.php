@php
    $nav = array(
        array('title' => 'Overview', 'view' => 'account/overview'),
        array('title' => 'Settings', 'view' => 'account/settings'),
        // array('title' => 'Security', 'view' => ''),
    );

    //dd(auth()->user());
@endphp

<!--begin::Navbar-->
<div class="card {{ $class }}">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="{{ auth()->user()->avatar_url }}" alt="image"/>
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                </div>
            </div>
            <!--end::Pic-->

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ auth()->user()->name }}</a>
                            <a href="#">
                                {!! theme()->getSvgIcon("icons/duotune/general/gen026.svg", "svg-icon-1 svg-icon-primary") !!}
                            </a>

                            <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{ __('Upgrade to Pro') }}</a>
                        </div>
                        <!--end::Name-->

                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                {!! theme()->getSvgIcon("icons/duotune/communication/com006.svg", "svg-icon-4 me-1") !!}
                                Developer
                            </a>                            
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                {!! theme()->getSvgIcon("icons/duotune/communication/com011.svg", "svg-icon-4 me-1") !!}
                                {{ auth()->user()->email }}
                            </a>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->

                   

                    <!--begin::Actions-->
                    <div class="d-flex my-4">
                        <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal_edit_perfil">Editar</a>                        
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Title-->

               
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->

     
    </div>
</div>
<!--end::Navbar-->


<!--begin::Modal - Create App-->
<div class="modal fade" id="modal_edit_perfil" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header ribbon ribbon-top ribbon-vertical">
                <div class="ribbon-label bg-cdmx">
                    <i class="bi bi-pencil-square fs-2 text-white"></i>
                </div>

                <div class="card-title"><h2>Editar Perfil</h2></div>
            </div>            
            <!--end::Modal header-->


            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">

                <div class="row">

                    <!--begin::Input group-->
                    <div class="d-flex flex-column col-lg-4 col-sm-4 mb-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nombre(s):</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid text-uppercase" name="first_name" value="{{ old('first_name', auth()->user()->first_name ?? '') }}" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column col-lg-4 col-sm-4 mb-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Apellido Paterno</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid text-uppercase" name="last_name" value="{{ old('last_name', auth()->user()->last_name ?? '') }}" />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column col-lg-4 col-sm-4 mb-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="">Apellido Materno</span>                           
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid text-uppercase" name="last_name" value="{{ old('last_name', auth()->user()->last_name ?? '') }}" />
                    </div>
                    <!--end::Input group-->
                    
                </div>

                   <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bolder mb-1">{{ __('Password') }}</div>
                    <div class="fw-bold text-gray-600">************</div>
                </div>
                <!--end::Label-->

                <!--begin::Edit-->
                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id="kt_signin_change_password" class="form" novalidate="novalidate" method="POST" action="{{ route('settings.changePassword') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="current_email" value="{{ auth()->user()->email }} "/>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="current_password" class="form-label fs-6 fw-bolder mb-3">{{ __('Current Password') }}</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="current_password" id="current_password"/>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="password" class="form-label fs-6 fw-bolder mb-3">{{ __('New Password') }}</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="password"/>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="password_confirmation" class="form-label fs-6 fw-bolder mb-3">{{ __('Confirm New Password') }}</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" id="password_confirmation"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-text mb-5">{{ __('Password must be at least 8 character and contain symbols') }}</div>

                        <div class="d-flex">
                            <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">
                                @include('partials.general._button-indicator', ['label' => __('Update Password')])
                            </button>
                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">{{ __('Cancel') }}</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->
                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">{{ __('Reset Password') }}</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Password-->
                
            </div>
            <!--end::Modal body-->

            <div class="modal-footer" >                                    
                <button type="button" class="btn btn-lg btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create App-->