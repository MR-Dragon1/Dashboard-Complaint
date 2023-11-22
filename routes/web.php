<?php

use App\Http\Controllers\AnnounsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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
    // Administrator $ Customer service - Team IT
    // Route::middleware(['admin'])->group(function() {
        Route::delete('/dashboard/announs/{announs}', [AnnounsController::class, 'delete_announs'])->name('delete-announ');
        Route::get('/dashboard/message', [AnnounsController::class, 'index_message'])->name('index-message');
        Route::post('/dashboard/add-announs/store', [AnnounsController::class, 'store_announs'])->name('store-announ');
        Route::put('/dashboard/complaint/{id}', [MailController::class, 'update_complaint'])->name('complaint.update');
        Route::put('/dashboard/user/{id}', [UserController::class, 'update_user'])->name('user.update');
        Route::put('/dashboard/message/{id}', [AnnounsController::class, 'update_message'])->name('message.update');
        Route::post('/dashboard/add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
        Route::get('/dashboard', [MailController::class, 'index_mail'])->name('index-mail');
        Route::get('/dashboard/log-activity', [LogController::class, 'index_logs'])->name('index-log');
        Route::get('/dashboard/spam', [MailController::class, 'index_spam'])->name('index-spam');
        Route::get('/dashboard/users', [UserController::class, 'index_users'])->name('index-user');
        Route::post('/dashboard/add-users/store', [UserController::class, 'store_users'])->name('store-user');
        Route::delete('/dashboard/users/{users}', [UserController::class, 'delete_users'])->name('delete-user');
        Route::get('/dashboard/infomatic', [MailController::class, 'index_informatic'])->name('index-informatics');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // });
});

    // Guest
    Route::middleware(['new-guest'])->group(function() {
        Route::get('/report', [LaporanController::class, 'index_laporan'])->name('index-laporan');
        Route::get('/announcements', [AnnounsController::class, 'index_announs'])->name('index-announs');
        Route::get('/search', [LaporanController::class, 'search'])->name('search');
        Route::get('/status', [LaporanController::class, 'index_status'])->name('index-status');
        Route::post('/dashboard/add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
    });
    Route::middleware(['guest'])->group(function() {
        Route::get('/', function () {
        return Redirect::route('login');
        });
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);
    });