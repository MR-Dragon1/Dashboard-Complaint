<?php

use App\Http\Controllers\AnnounsController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SiteController;
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
    return Redirect::route('index-mail');
});


    Auth::routes();
    // Guest
    Route::get('/', [MailController::class, 'index_mail'])->name('index-mail');
    Route::get('/sites', [SiteController::class, 'index_sites'])->name('index-sites');
    Route::get('/announcements', [AnnounsController::class, 'index_announs'])->name('index-announs');
    Route::post('/add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
    Route::put('complaint/{id}', [MailController::class, 'update_complaint'])->name('complaint.update');

    // Customer service
    Route::middleware(['customer-service'])->group(function() {
        Route::post('/add-sites/store', [SiteController::class, 'store_sites'])->name('store-site');
        Route::delete('/sites/{sites}', [SiteController::class, 'delete_sites'])->name('delete-site');
        Route::post('/add-announs/store', [AnnounsController::class, 'store_announs'])->name('store-announ');
    });

    // Administrator  - Team IT
    Route::middleware(['admin'])->group(function() {
        Route::get('/ip-address', [IpController::class, 'index_ip'])->name('index-ip');
        Route::post('/ip-address/store', [IpController::class, 'store_ip'])->name('store-ip');
        Route::delete('/ips/{ips}', [IpController::class, 'delete_ip'])->name('delete-ip');
        Route::get('/log-activity', [LogController::class, 'index_logs'])->name('index-log');
        Route::get('/users', [UserController::class, 'index_users'])->name('index-user');
        Route::post('/add-sites/store', [SiteController::class, 'store_sites'])->name('store-site');
        Route::post('/add-users/store', [UserController::class, 'store_users'])->name('store-user');
        Route::delete('/users/{users}', [UserController::class, 'delete_users'])->name('delete-user');
        Route::get('/infomatic', [MailController::class, 'index_informatic'])->name('index-informatics');
        Route::post('/add-announs/store', [AnnounsController::class, 'store_announs'])->name('store-announ');
        Route::delete('/announs/{announs}', [AnnounsController::class, 'delete_announs'])->name('delete-announ');
    });
});