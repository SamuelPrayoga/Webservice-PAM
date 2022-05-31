<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login',  'Api\UserController@login');  
Route::post('register',  'Api\UserController@register');  
<<<<<<< HEAD
Route::get('produk', 'Api\ProdukController@index');
Route::post('checkout', 'Api\TransaksiController@store');
Route::get('checkout/user/{id}', 'Api\TransaksiController@history');
=======
Route::get('produk', 'Api\ProdukController@index');
>>>>>>> f13bcd1b2ce7855ec7e47ef9b3f834745aeea1d2
