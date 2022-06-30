<?php

/* IMPORTAR TODOS OS CONTROLLERS AQUI */

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\IndexController;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
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




/*** TODAS AS ROTAS ADMIN ***/

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


/*** O CONTROLLER USUARIO ESTÁ LOCALIZADO EM: Http/Controllers/frontend/indexController ***/

// Rota Usuario [HOME] - primeira página, serve tanto para visitante como usuário
Route::get('/', [IndexController::class, 'index']);

// Rota Usuario [LOGOUT] - rota para logout do usuario
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

// Rota Usuario [PROFILE - PERFIL] - rota p/ acessar a pagina perfil usuario
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

// Rota Usuario [PROFILE - PERFIL] - rota p/ guardar dados perfil usuario editados pelo mesmo - Store, em inglês, é guardar/manter
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

// Rota Usuario [PASSWORD] - rota p/ acessar página mudar senha usuario
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');

// Rota Usuario [PASSWORD] - rota p/ guardar senha alterado pelo usuario
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');




/*** TODAS AS ROTAS MARCAS DASHBOARD ADMINISTRADOR ***/
Route::prefix('brand')->group(function(){

    // Rota p/ visualizar a tabela de Marcas no Painel Admin.
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brands');

    // Rota p/ guardar informações Marcas no Painel Admin
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

    // Rota p/ editar Marca
    Route::get('/edit{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

    // Rota p/ guardar inforções EDITADAS Marcas no Painel Admin
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');

      // Rota p/ deletar Marca
      Route::get('/delete{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});

/*** TODAS AS ROTAS CATEGORIAS DASHBOARD ADMINISTRADOR ***/
Route::prefix('category')->group(function(){

    // Rota p/ visualizar a tabela de Marcas no Painel Admin.
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

    // Rota p/ guardar informações Marcas no Painel Admin
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

    // Rota p/ editar Marca
    Route::get('/edit{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    // Rota p/ guardar inforções EDITADAS Marcas no Painel Admin
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

      // Rota p/ deletar Marca
      Route::get('/delete{id}', [BrandController::class, 'CategoryDelete'])->name('category.delete');

});