<?php

use App\Http\Controllers\AnnounsController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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





    Route::middleware(['blockIP'])->group(function () {
    Route::get('/', function () {
    return Redirect::route('login');
    });

    Auth::routes();
    // Administrator $ Customer service - Team IT
    Route::middleware(['admin'])->group(function() {
        Route::delete('/dashboard/announs/{announs}', [AnnounsController::class, 'delete_announs'])->name('delete-announ');
        Route::get('/dashboard/message', [AnnounsController::class, 'index_message'])->name('index-message');
        Route::post('/dashboard/add-announs/store', [AnnounsController::class, 'store_announs'])->name('store-announ');
        Route::put('/dashboard/complaint/{id}', [MailController::class, 'update_complaint'])->name('complaint.update');
        Route::post('/dashboard/add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
        Route::get('/dashboard', [MailController::class, 'index_mail'])->name('index-mail');
        Route::get('/dashboard/ip-address', [IpController::class, 'index_ip'])->name('index-ip');
        Route::post('/dashboard/ip-address/store', [IpController::class, 'store_ip'])->name('store-ip');
        Route::delete('/dashboard/ips/{ips}', [IpController::class, 'delete_ip'])->name('delete-ip');
        Route::get('/dashboard/log-activity', [LogController::class, 'index_logs'])->name('index-log');
        Route::get('/dashboard/users', [UserController::class, 'index_users'])->name('index-user');
        Route::post('/dashboard/add-users/store', [UserController::class, 'store_users'])->name('store-user');
        Route::delete('/dashboard/users/{users}', [UserController::class, 'delete_users'])->name('delete-user');
        Route::get('/dashboard/infomatic', [MailController::class, 'index_informatic'])->name('index-informatics');

    });
});

    // Guest
    Route::middleware(['new-guest'])->group(function() {
        Route::get('/report', [LaporanController::class, 'index_laporan'])->name('index-laporan');
        Route::get('/announcements', [AnnounsController::class, 'index_announs'])->name('index-announs');
        Route::get('/search', [LaporanController::class, 'search'])->name('search');
        Route::get('/status', [LaporanController::class, 'index_status'])->name('index-status');
        Route::post('/dashboard/add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
    });