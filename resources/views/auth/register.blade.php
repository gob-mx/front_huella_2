<x-auth-layout>

    <!--begin::Signup Form-->
    <form class="form w-100 " novalidate="novalidate" id="kt_sign_up_form" action="{{ theme()->getPageUrl('register') }}">
    @csrf
    <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Regístrate</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Ingrese sus datos para crear una nueva cuenta</div>
            <!--end::Subtitle=-->
        </div>
       

        <div class="row mb-4 fv-row">
            <!--begin::Col-->
            <div class="col-lg-6 col-sm-12">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold text-uppercase" placeholder="CURP" id="curp" name="curp" />
                    <label for="curp">CURP</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-6 col-sm-12">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold text-uppercase" placeholder="RFC" id="rfc" name="rfc" />
                    <label for="rfc">RFC</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row fv-row mb-4">
            <!--begin::Col-->
            <div class="col-lg-6 col-sm-12">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold text-uppercase" placeholder="Nombre(s)" id="first_name" name="first_name" />
                    <label for="first_name">Nombre(s)</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-6 col-sm-12">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold text-uppercase" placeholder="Apellido Paterno" id="last_name" name="last_name" />
                    <label for="last_name">Apellido Paterno</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-4">
            <!--begin::Col-->
            <div class="col-lg-6 col-sm-12">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold text-uppercase" placeholder="Apellido Mateno" id="apellido_materno" name="apellido_materno" autocomplete="off" value="{{ old('apellido_materno') }}"/>
                    <label for="first_name">Apellido Mateno</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-6 col-sm-12 ">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold" placeholder="Teléfono" id="telefono" name="telefono" autocomplete="off" value="{{ old('telefono') }}" data-mask-phone/>
                    <label for="telefono">Teléfono</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>


        <div class="row fv-row mb-4">
            <!--begin::Col-->
            <div class="col-12">
                <!--begin::Input group-->
                <div class="form-floating">
                    <input type="text" class="form-control text-gray-800 fw-bold" placeholder="Correo Electrónico" id="email" name="email"/>
                    <label for="email">Correo Electrónico</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->            
        </div>       
      


        
        <!--begin::Input group-->
        <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent" type="password" placeholder="Contraseña" name="password" autocomplete="off">
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2 active"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">Use 8 o más caracteres con una combinación de letras, números y símbolos.</div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--end::Input group=-->
        <div class="fv-row mb-8 fv-plugins-icon-container">
            <!--begin::Repeat Password-->
            <input placeholder="Repetir Contraseña" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent">
            <!--end::Repeat Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Accept-->
        <div class="fv-row mb-8 fv-plugins-icon-container">
            <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1">
                <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Yo acepto los
                    <a href="#" class="ms-1 link-primary">Términos</a></span>
            </label>
        </div>
        <!--end::Accept-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                @include('partials.general._button-indicator')
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">¿Ya tienes una cuenta?
            <a href="{{ theme()->getPageUrl('login') }}" class="link-primary fw-semibold">Iniciar sesión</a></div>
        <!--end::Sign up-->
        <div></div>
    </form>
    <!--end::Signup Form-->

</x-auth-layout>
