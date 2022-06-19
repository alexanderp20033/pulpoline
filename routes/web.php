<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\CurrencyController;
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


// si la ruta la dejo en la raiz, me funciona pèro al colocar la urta currency no me funciona




Route::get('/currency', [CurrencyController::class, 'index']);
Route::post('/currency', [CurrencyController::class, 'exchangeCurrency']);

 //este era el enrutador original
Route::get('/', function () {
    return view('welcome');

});




//para limitar 5  peticiones por minuto, tambien agregre el name para poder llamarlo desde el menu
Route::get('/currency', function () {
    return view('currency');

})->middleware('throttle:intentos')->name('convertidor');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'

])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

  /*  Route::get('/currency', function () {
        return view('currency');
    })->name('convertidor');
*/

});






