<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Painel\InitController;

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

//SITE
Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('favorites', [App\Http\Controllers\HomeController::class, 'favorites'])->name('favorites');
Route::get('cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::get('shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::get('catalogue', [App\Http\Controllers\HomeController::class, 'catalogue'])->name('catalogue');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('promotions', [App\Http\Controllers\HomeController::class, 'promotions'])->name('promotions');


//ADMIN
Route::resource('/painel', 'App\Http\Controllers\Painel\InitController' );

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});



