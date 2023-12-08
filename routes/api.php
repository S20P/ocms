<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DenominationsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api.token')->group(function () {
  //Denominations
  Route::group(['prefix' => 'denomination'], function () {
       Route::get('/', [DenominationsController::class,'index']); 
       Route::post('/store', [DenominationsController::class,'store']); 
  });
//@end::Denominations
});

//http://localhost:8000/api/denomination/store