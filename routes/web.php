<?php

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
Route::get('/', function () {
    return view('registerLogin/index');
});
*/
Route::get('/', 'Login@log_reg')->name('log_reg');

Route::post('/register', 'Login@register');

Route::post('/r_register', 'Login@r_register');

Route::post('/verify_mail', 'Login@verify_mail');

Route::post('/verify_pass', 'Login@verify_pass');

Route::post('/login/{su}', 'Login@login');

Route::get('/connecter', 'Login@connecter')->name('connecter');

Route::get('/deconnecter', 'Login@deconnecter')->name('deconnecter');
