<?php

use App\Http\Controllers\AnnounsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Mails;

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

Route::domain(env('DOMAIN_BACKEND'))->group(function() {
    Route::middleware(['guest'])->group(function() {
        Route::get('/', function () {
            return Redirect::route('login');
        });
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);
    });

    Route::middleware(['blockIP'])->group(function () {
        Route::delete('announs/{announs}', [AnnounsController::class, 'delete_announs'])->name('delete-announ');
        Route::get('message', [AnnounsController::class, 'index_message'])->name('index-message');
        Route::post('add-announs/store', [AnnounsController::class, 'store_announs'])->name('store-announ');
        Route::put('complaint/{id}', [MailController::class, 'update_complaint'])->name('complaint.update');
        Route::put('user/{id}', [UserController::class, 'update_user'])->name('user.update');
        Route::put('message/{id}', [AnnounsController::class, 'update_message'])->name('message.update');
        Route::post('add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
        Route::get('/home', [MailController::class, 'index_mail'])->name('index-mail');
        Route::get('log-activity', [LogController::class, 'index_logs'])->name('index-log');
        Route::get('spam', [MailController::class, 'index_spam'])->name('index-spam');
        Route::get('infomatic', [MailController::class, 'index_informatic'])->name('index-informatics');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('users', [UserController::class, 'index_users'])->name('index-user');
        Route::delete('users/{users}', [UserController::class, 'delete_users'])->name('delete-user');
        Route::post('add-users/store', [UserController::class, 'store_users'])->name('store-user');
        Route::delete('codes/{codes}', [CodeController::class, 'delete_codes'])->name('delete-code');
        Route::post('add-codes/store', [CodeController::class, 'store_code'])->name('store-code');
        Route::get('codes', [CodeController::class, 'index_code'])->name('index-code');
        Route::get('/get-codes-data', [CodeController::class, 'getDataForSearch']);

        # BEGIN::INI KODE BARU
        Route::get('/notification', function() {
            $count = Mails::where('status', 0)->count();

            $response = "data: $count\n\n";

            return response($response)
                ->header('Content-Type', 'text/event-stream')
                ->header('Cache-Control', 'no-cache');
        });
        # END::INI KODE BARU
    });
});
