<x-base-layout>

    @php
    $usuarios = App\Models\User::get();
    $uTotal = App\Models\User::get()->count();
    $uActivos = App\Models\User::where('activo',1)->get()->count();
    $uInactivos = App\Models\User::where('activo',0)->get()->count();
    @endphp

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            @include('dashboard/card_total_usuarios')
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            @include('dashboard/card_lista_usuarios')
        </div>
    </div>

</x-base-layout>
