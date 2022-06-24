<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

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





// ROTAS AUTENTICAÇÃO ADMIN [LOGIN PAGE] JETSTREAM
Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});


// ROTA multi-auth ADMIN. Pacote do Laravel chamando Jetstream, que serve p/:
// login, registration, email verification, two-factor authentication, session management,
Route::middleware([
    'auth:sanctum,admin', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});





/*** TODAS AS ROTAS MANTENEDOR ***/

// Rota para logout do mantenedor
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// Rota para manter perfil mantenedor
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

// Rota para entrar em editar perfil mantenedor
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

// Rota que aceita os dados anexados no corpo da mensagem de requisição para armazenamento [POST admin.edit.profile]
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

// Rota para mudar senha mantenedor
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

// Rota que aceita as mudanças senha mantenedor
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');





/*** TODAS AS ROTAS USUARIO ***/

// ROTA MULTI-AUTH USER. *JETSTREAM*
// login, registration, email verification, two-factor authentication, session management 
Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

// Rota Usuario [HOME] - primeira página, serve tanto para visitante como usuário
Route::get('/', [IndexController::class, 'index']);
