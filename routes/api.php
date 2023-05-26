<?php

use App\Http\Controllers\Api\StatusAntrean;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('auth', [AuthController::class, 'auth'])->name('api.auth');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    // Route::apiResource('private/portfolio', PortfolioController::class);
    Route::get('antrean/status/{kodePoli}/{tanggalPeriksa}', [StatusAntrean::class, 'statusAntrian']);
    Route::get('/antrean/sisapeserta/{nomorkartu}/{kode_poli}/{tanggalperiksa}', [StatusAntrean::class, 'sisapeserta']);
    Route::put('/antrean/batal/{int}', [StatusAntrean::class, 'batal']);
    Route::post('antrean/', [StatusAntrean::class, 'new']);
    // API route for logout user
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
});
