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
Route::get('/', 'Login@log_reg');

Route::post('/register', 'Login@register');

Route::post('/verify_mail', 'Login@verify_mail');
