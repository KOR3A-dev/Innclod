<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\LoginController;

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

/* Group Routes for Login and Logout */
Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

/* Group Routes for Document */
Route::controller(DocumentoController::class)->group(function () {
    Route::get('documents', 'documentsAll');
    Route::post('/create/document', 'createDocument');
    Route::put('/update/document/{id}', 'editDocument');
});
