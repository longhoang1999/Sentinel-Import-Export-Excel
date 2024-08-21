<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

Route::get('/', [UserController::class, 'login'])->name('login');

Route::post('postLogin', [UserController::class, 'postLogin'])->name('postLogin');
Route::post('postRegister', [UserController::class, 'postRegister'])->name('postRegister');
Route::get('logout', [UserController::class, 'logout'])->name('logout');



Route::group([
    'middleware'    => 'checkAdmin'
], function () {
    Route::get('dashboard',  [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('create_role',  [UserController::class, 'createRole'])->name('createRole');
});



// Tải mẫu excel (user mẫu)
// Import excel (insert user)
// Export user database

Route::get('view', [ExcelController::class, 'view']);
Route::get('exportFileMau', [ExcelController::class, 'exportFileMau'])->name('exportFileMau');
Route::post('importExcelFile', [ExcelController::class, 'importExcelFile'])->name('importExcelFile');
Route::get('exportFileUser', [ExcelController::class, 'exportFileUser'])->name('exportFileUser');
