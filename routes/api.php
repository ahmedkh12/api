<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\catController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::group(['middleware'=>'api'],function(){



// });

Route::get('getcat', [catController::class, 'index'] )->middleware('ensure');// protect route
Route::get('show_cat/{cat_id}', [catController::class, 'show_cat'] );
Route::post('insert_cat', [catController::class, 'store'] );
Route::post('update_cat/{id}', [catController::class, 'update'] );
Route::post('delete_cat/{id}', [catController::class, 'destroy'] );



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
