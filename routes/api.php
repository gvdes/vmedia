<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificatorController;

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

Route::get('/', fn() => response("Hello from container"));

Route::prefix('verificator')
    ->controller(VerificatorController::class)
    ->group(function(){
        Route::get('init', 'init');
        Route::get('info', 'info');
    });
