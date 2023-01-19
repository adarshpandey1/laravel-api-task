<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('employers', 'EmployerController@create');
Route::post('/add-employers', [EmployerController::class, 'create']);
Route::get('/employers', [EmployerController::class, 'index']);
Route::put('/employers/{id}', [EmployerController::class, 'update']);
Route::delete('/employers/{id}', [EmployerController::class, 'destroy']);
