<?php

# =============================== IMPORTAR TODAS AS CONTROLLERS AQUI ==================================== #

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;


use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;


use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\User\MyCartController;

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

/*
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});
*/



//Route::middleware('admin:admin')->group(function () {


# ======================================== TODAS AS ROTAS ADMIN ========================================= #


Route::middleware([
    'auth:sanctum,admin', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    Route::get('admin/login', [AdminController::class, 'loginForm']);

    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');

    // Rota para logout do mantenedor
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout')->middleware('auth:admin');

    // Rota para manter perfil mantenedor
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile')->middleware('auth:admin');;

    // Rota para entrar em editar perfil mantenedor
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit')->middleware('auth:admin');;

    // Rota que aceita os dados anexados no corpo da mensagem de requisição para armazenamento [POST admin.edit.profile]
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store')->middleware('auth:admin');;

    // Rota para mudar senha mantenedor
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password')->middleware('auth:admin');;

    // Rota que aceita as mudanças senha mantenedor
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password')->middleware('auth:admin');;
});





# ======================================== TODAS AS ROTAS USUARIO ======================================= #

// login, registration, email verification, two-factor authentication, session management 
Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard');
    });

    // Rota Usuario [HOME] - primeira página, serve tanto para visitante como usuário
    Route::get('/', [IndexController::class, 'index'])->name('index');

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
});




# ================================= TODAS AS ROTAS MARCAS PAINEL ADMIN ================================== #

/*** prefix siginica que aparecerá o objeto na url antes da rota chamada: (brand/view ; brand/store; ...) */
Route::prefix('brand')->group(function () {

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



# =============================== TODAS AS ROTAS CATEGORIA PAINEL ADMIN ================================= #

Route::prefix('category')->group(function () {

    // Rota p/ visualizar a tabela de Categorias no Painel Admin.
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.categories');

    // Rota p/ guardar informações Categorias no Painel Admin
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

    // Rota p/ editar Categoria
    Route::get('/edit{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    // Rota p/ guardar inforções EDITADAS Categoria no Painel Admin
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

    // Rota p/ deletar Categoria
    Route::get('/delete{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');



    # ============================ TODAS AS ROTAS SUBCATEGORIA PAINEL ADMIN ============================= #

    // Rota p/ visualizar a tabela de SubCategorias no Painel Admin.
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategories');

    // Rota p/ guardar informações SubCategorias no Painel Admin
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

    // Rota p/ editar SubCategoria
    Route::get('/sub/edit{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

    // Rota p/ guardar inforções EDITADAS SubCategoria no Painel Admin
    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

    // Rota p/ deletar SubCategoria
    Route::get('/sub/delete{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');




    # ============================ TODAS AS ROTAS SUBSUBCATEGORIA PAINEL ADMIN ========================== #

    // Rota p/ visualizar a tabela de SubCategorias no Painel Admin.
    Route::get('/sub/sub/view', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategories');

    // Rota para pegar a  URL definida no js em subsubcategory_view.blade.php: ROTA JS-AJAX p/ mostrar categoria com a subcategoria dinamicamente
    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);

    // Rota para pegar a  URL definida no js em subsubcategory_view.blade.php: ROTA JS-AJAX p/ mostrar subcategoria com a subsubcategoria dinamicamente
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);

    // Rota p/ guardar informações SubCategorias no Painel Admin
    Route::post('/sub/sub/store', [SubSubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');

    // Rota p/ editar SubCategoria
    Route::get('/sub/sub/edit{id}', [SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');

    // Rota p/ guardar inforções EDITADAS SubCategoria no Painel Admin
    Route::post('/sub/sub/update', [SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');

    // Rota p/ deletar SubCategoria
    Route::get('/sub/sub/delete{id}', [SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});



# ================================ TODAS AS ROTAS PRODUTO PAINEL ADMIN ================================== #

/*** prefix siginica que aparecerá o objeto na url antes da rota chamada: (product/view ; product/store; ...) */
Route::prefix('product')->group(function () {

    // Rota p/ visualizar o formulário adicionar produto no Painel Admin.
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('product.add');

    // Rota p/ adicionar produtos no Painel Admin.
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product.store');

    // Rota p/ a pagina gerenciar produtos no Painel Admin.
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('product.manage');

    // Rota p/ editar produtos no Painel Admin.
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

    // Rota p/ validar os campos editados produtos no Painel Admin.
    Route::post('/update', [ProductController::class, 'UpdateProduct'])->name('product.update');

    // Rota p/ validar as imagens produtos editadas no Painel Admin.
    Route::post('/update/image', [ProductController::class, 'UpdateProductImage'])->name('product.update.image');

    // Rota p/ deletar Imagem Produto
    Route::get('/delete/image{id}', [ProductController::class, 'DeleteProductImage'])->name('product.delete.image');

    // Rota p/ validar as imagens produtos editadas no Painel Admin.
    Route::post('/update/thumbnail', [ProductController::class, 'UpdateProductThumbnail'])->name('product.update.thumbnail');

    // Rota p/ inativar produto no painel admin edit product
    Route::get('/inactivate/{id}', [ProductController::class, 'InactivateProduct'])->name('product.inactivate');

    // Rota p/ ativar produto no painel admin edit product
    Route::get('/activate/{id}', [ProductController::class, 'ActivateProduct'])->name('product.activate');

    // Rota p/ deletar produto no painel admin edit product
    Route::get('/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('product.delete');
});




# =============================== TODAS AS ROTAS SLIDER PAINEL ADMIN ==================================== #

/*** prefix siginica que aparecerá o objeto na url antes da rota chamada: (brand/view ; brand/store; slider/view ...) */
Route::prefix('slider')->group(function () {

    // Rota p/ visualizar a tabela de Marcas no Painel Admin.
    Route::get('/view', [SliderController::class, 'SliderView'])->name('all.sliders');

    // Rota p/ guardar informações Marcas no Painel Admin
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

    // Rota p/ editar Marca
    Route::get('/edit{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

    // Rota p/ guardar inforções EDITADAS Marcas no Painel Admin
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

    // Rota p/ deletar Marca
    Route::get('/delete{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

    // Rota p/ inativar produto no painel admin edit product
    Route::get('/inactivate/{id}', [SliderController::class, 'InactivateSlider'])->name('slider.inactivate');

    // Rota p/ ativar produto no painel admin edit product
    Route::get('/activate/{id}', [SliderController::class, 'ActivateSlider'])->name('slider.activate');
});




# =================================== TODAS AS ROTAS FRONT-END ========================================= #

// Rota tradução português
Route::get('/language/portuguese', [LanguageController::class, 'Portuguese'])->name('portuguese.language');

// Rota tradução inglês
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

// Rota p/ detalhes do produto - como usei url, não é necessário nomear a rota
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

// Rota tags - como usei url, não é necessário nomear a rota
Route::get('/product/tag/{tag}', [IndexController::class, 'ProductTags']);

// Rota p/ detalhes do produto ao clickar em sua subsubcategoria - como usei url, não é necessário nomear a rota
Route::get('/subcategory/product/{id}/{slug}', [IndexController::class, 'ProductSubDetails']);

// Rota p/ detalhes do produto ao clickar em sua subsubcategoria - como usei url, não é necessário nomear a rota
Route::get('/subsubcategory/product/{id}/{slug}', [IndexController::class, 'ProductSubSubDetails']);

// Rota AJAX p/ pegar os dados do produto onClick, em formato json, e passar para a bootstrap modal ao clickar no botão carrinho
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);




# ========================================== TODAS AS ROTAS CARRINHO ==================================== #

// Rota AJAX p/ pegar os dados do produto onClick, em formato json, e passar para a bootstrap modal ao clickar no botão carrinho
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Rota AJAX Pegar dados mini carrinho - como usei url, não é necessário nomear a rota
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// ROTA AJAX Remover dados mini carrinho - como usei url, não é necessário nomear a rota
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);




# ==================================== TODAS AS ROTAS LISTA ITEM DESEJO ================================= #

// Rota AJAX p/ pegar os dados Produto pela função onclick() Ajax e enviar à Lista de Desejos
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishList']);

# ================================= PROTEGER A PÁGINA VIEW WISHLIST e MYCART COM MIDDLEWARE ====================== #

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {

    // Rota p/ acessar a página view Lista de Desejos
    Route::get('/wishlist', [WishListController::class, 'ViewWishList'])->name('wishlist');

    // Rota declarada na url Ajax, p/ pegar o produto adicionado la lista de desejos e mostrar na view lista desejos
    Route::get('/get-wishlist-product', [WishListController::class, 'GetWishListProduct']);

    // ROTA AJAX Remover dados lista des. - como usei url, não é necessário nomear a rota
    Route::get('/wishlist-remove/{id}', [WishListController::class, 'RemoveWishListProduct']);

    // Rota Meu Carrinho.
    Route::get('/mycart', [MyCartController::class, 'MyCart'])->name('mycart');
});
