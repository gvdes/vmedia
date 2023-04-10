<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoldersController;
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

// Route::get('/', fn() => response("Hello from container"));

Route::prefix('verificator')
    ->controller(VerificatorController::class)
    ->group(function(){
        Route::get('init', 'init');
        Route::get('info', 'info');
    });

Route::prefix('admin')
    ->group(function(){

        Route::prefix('folders')
            ->controller(FoldersController::class)
            ->group(function(){
                Route::post('/start','start');
                Route::get('/','list');
                Route::post('/','create');
                Route::put('/','rename');
                Route::delete('/','delete');
                Route::post('/syncdb','syncdb');
                Route::put('/moveto','delete');
        });

    });
