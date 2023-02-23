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

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ADMIN
Route::resource('/painel', 'App\Http\Controllers\Painel\InitController' );

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});


