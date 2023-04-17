<x-auth-layout>
@php
    $_auth = (setting('layout.tipo_login'))??setting('layout.tipo_login')??(env('tipo_login'))??'email';
@endphp  

@if(setting('layout.type_auth')==='auth_1' || setting('layout.type_auth')==='auth_2' || !setting('layout.type_auth'))
    <!--begin::Signin Form-->
<form class="form w-100 " novalidate="novalidate" id="kt_sign_in_form" action="{{ theme()->getPageUrl('login') }}">
    @csrf
        <!--begin::Heading-->       
        <div class="text-center px-4 mb-11">
            <img class="mw-100 mh-300px" alt="" src="{{ asset(theme()->getMediaUrlPath() . 'logos/SAF_logo_header.png') }}">
        </div>
        
        <input type="hidden" id="tipo_login" value="{{$_auth}}">
        
        <div class="text-center mb-11">

            
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Iniciar sesión</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6"></div>
            <!--end::Subtitle=-->
        </div>

        <div class="row">
            <!--begin::Col-->
            <div class="col-lg-12 col-sm-12 mb-4 fv-row">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold" placeholder="{{$_auth}}" id="usuario" name="usuario" value="{{ old('usuario', '') }}" required autofocus/>
                    <label for="{{$_auth}}">{{strtoupper($_auth)}}</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-12 col-sm-12 mb-4 fv-row">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="password" class="form-control text-gray-800 fw-bold" placeholder="Contraseña" id="password" name="password" />
                    <label for="password">Contraseña</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            @if (Route::has('password.request'))
            <!--begin::Link-->
                <a href="{{ theme()->getPageUrl('password.request') }}" class="link-primary">¿Olvidaste tu contraseña?</a>
                <!--end::Link-->
            @endif
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials.general._button-indicator', ['label' => __('Continuar')])
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">¿No tienes una cuenta?
            <a href="{{ theme()->getPageUrl('register') }}" class="link-primary">Regístrate</a></div>
        <!--end::Sign up-->
        <div></div>
    </form>
    <!--end::Signin Form-->

@elseif(setting('layout.type_auth')==='auth_3')


@endif
</x-auth-layout>
