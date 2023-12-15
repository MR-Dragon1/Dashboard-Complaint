<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\AnnounsController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Guest
Route::domain('supportpng.com')->group(function() {
    Route::middleware(['new-guest'])->group(function() {
        Route::get('/', [LaporanController::class, 'index_laporan'])->name('index-laporan');
        Route::get('/announcements', [AnnounsController::class, 'index_announs'])->name('index-announs');
        Route::get('/search', [LaporanController::class, 'search'])->name('search');
        Route::get('/status', [LaporanController::class, 'index_status'])->name('index-status');
        Route::post('add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
    });
});
