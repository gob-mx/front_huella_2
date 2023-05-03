<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\LayoutBuilderController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administracion\UsuariosController;
use App\Http\Controllers\Administracion\RolesController;
use App\Http\Controllers\Administracion\PermisosController;
use App\Http\Controllers\Administracion\ModulosController;
use App\Http\Controllers\Registro\ImplicadosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('index');
// });

Route::get('bitacora', [UsersController::class, 'store'])->name('users.index');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/configurar', function () {
        
        return view('pages.account.settings.config');

        //dd("hola");
        //session(['idCarroCompra' => '15320']);
        //dd(Auth::user());
        //dd(session()->all());
        //dd(Auth::user()->roles);
        //$variable = Auth::user()->hasRole('editor');

        //dd($variable);
        
        //Artisan::call('down');
    })->name('lalo_prueba');
    /*Route::get('/aplicar_mantenimiento', function () {        
          Artisan::call('down');
    })->name('mantenimiento_down');
    Route::get('/quitar_mantenimiento', function () {       
          Artisan::call('up');
    })->name('mantenimiento_up');*/
    Route::get('mantenimiento', [SettingsController::class, 'mantenimiento'])->name('mantenimiento');
});


Route::get('/testoracle', function () {
    $data = \DB::connection('dbProdRac')
	->table('inpc')
	->select('indice')
	->where('ejercicio', 2020)
	->where('mes', 12)
	->first();


    //"SELECT CONID,SUCURSAL,FECHAPAGO,IMPORTE,ESTATUS FROM CONCILIACION WHERE LINEACAPTURA = '$lc'";
    dd($data);
});

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }

        // Custom page demo for 500 server error
        if (Str::contains($val['path'], 'error-500')) {
            Route::get($val['path'], function () {
                abort(500, 'Something went wrong! Please try again later.');
            });
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
    Route::resource('layout-builder', LayoutBuilderController::class)->only(['store']);
});

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect('dashboard');
    });

    Route::get('dashboard', function () {
        return view('pages.index');
    });

    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });

    // Administracion pages
     Route::prefix('administracion')->name('administracion.')->group(function () {
        Route::resource('usuarios', UsuariosController::class);
        Route::post('usuarios/gen/{id}', [UsuariosController::class, 'update']);
        Route::resource('roles', RolesController::class);
        Route::resource('permisos', PermisosController::class);
        Route::resource('modulos', ModulosController::class);
    });

     // Administracion pages
     Route::prefix('registro')->name('registro.')->group(function () {
        Route::resource('implicados', ImplicadosController::class);
    });
});

Route::resource('users', UsersController::class);

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__.'/auth.php';
