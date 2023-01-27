<?php

use App\Http\Controllers\KeyWalletController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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

Route::prefix('/')->group(function (){
    Route::post('/login',               [LoginController::class,         'login'        ]);
    Route::post('/register',            [LoginController::class,         'register'     ]);
    Route::middleware('auth:sanctum')->group(function (){
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::prefix('/key-wallet')->group(function (){
            Route::post('',           [KeyWalletController::class,          'store'        ]);
            Route::get('',            [KeyWalletController::class,          'getWallet'    ]);
            Route::prefix('/{id}')->group(function (){
                Route::get('',       [KeyWalletController::class,          'getKeyWallet' ]);
                Route::post('',      [KeyWalletController::class,          'update'       ]);
                Route::delete('',    [KeyWalletController::class,          'delete'       ]);
            });
        });
    });
});
