<x-auth-layout>
    <!--begin::Forgot Password Form-->
    <form class="form w-100 " novalidate="novalidate" id="kt_password_reset_form" action="{{ theme()->getPageUrl('password.email') }}">
        @csrf
        <div class="text-center px-4 mb-11"">
            <img class="mw-100 mh-300px" alt="" src="{{ asset(theme()->getMediaUrlPath() . 'logos/logo_fiscalia.jpeg') }}">
        </div>
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">¿Olvidaste tu contraseña ?</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">Ingresa el correo electrónico asociado a tu cuenta.</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8 fv-plugins-icon-container">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent">
            <!--end::Email-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                @include('partials.general._button-indicator')
            </button>
            <a href="{{ theme()->getPageUrl('login') }}" class="btn btn-light">Regresar</a>
        </div>
        <!--end::Actions-->
        <div></div>
    </form>
    <!--end::Forgot Password Form-->

</x-auth-layout>
