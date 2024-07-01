<?php

use App\Http\Controllers\OwnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('owners/{name}/byName', [OwnerController::class, 'byName'])->name('owners.byName');
Route::get('owners/{number}/byNumber', [OwnerController::class, 'byNumber'])->name('owners.byNumber');
Route::resource('/owners', OwnerController::class)->names('owners'); /* En caso de querer generar las rutas para todos los metodos CRUD */




















// ----------------------------------------------
/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */
