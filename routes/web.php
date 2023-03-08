<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Painel\InitController;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
/*
Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/login-app', function () {
    return view('auth.auth-login');
});

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('kill', [App\Http\Controllers\LoginController::class, 'kill']);

//SITE
Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('favorites', [App\Http\Controllers\HomeController::class, 'favorites'])->name('favorites');
Route::get('cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::get('shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::get('produto/{categoria?}', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produto');

Route::middleware(LogAcessoMiddleware::class)->get('produto-detalhe/{id?}', [App\Http\Controllers\ProdutoController::class, 'produtodetalhe']);


Route::get('catalogue', [App\Http\Controllers\HomeController::class, 'catalogue'])->name('catalogue');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('register', [App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::get('promotions', [App\Http\Controllers\HomeController::class, 'promotions'])->name('promotions');


//ADMIN //usa a class ->   'auth' => \App\Http\Middleware\Authenticate::class, dentro do http/kernel.php
Route::group(['prefix' => 'painel','middleware' => 'auth'], function(){
    Route::resource('/', 'App\Http\Controllers\Painel\InitController');
    Route::resource('/produtos', 'App\Http\Controllers\Painel\ProdutoController');
    Route::resource('/categorias', 'App\Http\Controllers\Painel\CategoriaController');
});


Route::post('salvar-categoria', 'App\Http\Controllers\Painel\CategoriaController@salvar');


Route::get('/painel-login/{erro?}', 'App\Http\Controllers\Painel\InitController@login')->name('painel.login');
Route::post('/painel-login', 'App\Http\Controllers\Painel\InitController@autenticar')->name('painel.autentica');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});



