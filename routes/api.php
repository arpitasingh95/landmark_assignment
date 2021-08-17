<?php

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" iconv_mime_decode(encoded_header)leware group. Enjoy building your API!
|
*/
// Auth::routes();

Route::post('smsgatwayapi', 'SmsControllerAPI@gatway');
Route::post('registersmsprovider', 'SmsControllerAPI@registersmsprovider');
Route::get('getsmsprovider', 'SmsControllerAPI@getsmsproviderdetails');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
