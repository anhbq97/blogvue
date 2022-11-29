<?php

use App\Http\Controllers\Api\v1 as ApiV1;
use App\Http\Controllers as Controllers;
use Illuminate\Support\Facades\Route;

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

// WEB APP FRONT-END
Route::group(['prefix' => 'post'], function() {
    Route::get('list', [Controllers\PostController::class, 'index']);
    Route::get('/{id}', [Controllers\PostController::class, 'show']);
});

// WEB APP BACK-END
Route::group(['prefix' => 'admin', 'auth:sanctum'], function() {
    Route::group(['prefix' => 'post'], function() {
        Route::get('list', [Controllers\PostController::class, 'index']);
        Route::post('store', [Controllers\PostController::class, 'store']);
        Route::get('/{id}', [Controllers\PostController::class, 'show']);
        Route::post('update', [Controllers\PostController::class, 'update']);
        Route::delete('delete', [Controllers\PostController::class, 'delete']);
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('list', [Controllers\ProductController::class, 'index']);
        Route::post('store', [Controllers\ProductController::class, 'store']);
        Route::get('/{id}', [Controllers\ProductController::class, 'show']);
        Route::post('update', [Controllers\ProductController::class, 'update']);
        Route::delete('delete', [Controllers\ProductController::class, 'delete']);
    });

    Route::group(['prefix' => 'email'], function() {
        Route::get('list', [Controllers\EmailController::class, 'index']);
        Route::post('store', [Controllers\EmailController::class, 'store']);
        Route::get('/{id}', [Controllers\EmailController::class, 'show']);
        Route::post('update', [Controllers\EmailController::class, 'update']);
        Route::delete('delete', [Controllers\EmailController::class, 'delete']);
    });
});


// API
Route::group(['prefix' => 'v1'], function() {
    // FRONT-END
    Route::group(['prefix' => 'auth'], function() {
        Route::post('/logout', [ApiV1\AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
        Route::post('/login', [ApiV1\AuthController::class, 'login'])->name('login');
    });

    // BACK-END
    Route::group(['auth:sanctum'], function () {
        Route::group(['prefix' => 'product'], function() {
            Route::get('list', [ApiV1\ProductController::class, 'index']);
            Route::post('store', [ApiV1\ProductController::class, 'store']);
            Route::post('update', [ApiV1\ProductController::class, 'update']);
            Route::delete('delete', [ApiV1\ProductController::class, 'delete']);
        });

    });
});
    
