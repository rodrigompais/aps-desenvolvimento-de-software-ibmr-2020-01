<?php

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

Auth::routes();

/**Rotas Home da Loja*/
Route::get('/', 'Site\HomeSiteController@index')->name('home.site');
Route::get('/create', 'Site\HomeSiteController@create')->name('cadastrocliente.create');

/**Rotas do Carrinho*/
Route::get('/show/{slug}', 'Site\HomeSiteController@show')->name('carrinho.site');

Route::prefix('carrinho')->name('carrinho.')->group(function(){
    Route::get('/', 'Site\CarrinhoController@index')->name('index');
    Route::post('add', 'Site\CarrinhoController@add')->name('add');
    Route::get('remove/{slug}', 'Site\CarrinhoController@remove')->name('remove');
    Route::get('cancelar', 'Site\CarrinhoController@cancelar')->name('cancelar');
});

/**Rota Checkout*/
Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', 'Site\CheckoutController@index')->name('index');
    Route::post('/proccess', 'Site\CheckoutController@proccess')->name('proccess');
});

/**Rota Admin */
Route::group(['middleware' => ['auth', 'access.control.store.admin']], function(){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        Route::resource('produto', 'ProdutoController');
        Route::resource('pedido', 'OrdersController');
    });

    Route::get('/admin/home', 'HomeController@index')->name('home.admin');

});

/*Route::get('/', 'Site\HomeSiteController@index')->name('home.site');*/
//Route::get('/', 'HomeController@index')->name('home');
/*Route::get('/admin/home', 'HomeController@index')->name('home.admin');*/
/* Route::get('/produto/create', 'Admin\ProdutoController@create')->name('produto.create'); */
/* Route::get('/', function () {
    return view('welcome');
}); */