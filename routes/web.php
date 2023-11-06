<?php

use App\Http\Controllers\AnnounsController;
use App\Http\Controllers\InformaticController;
use App\Http\Controllers\MailController;
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
    Route::get('/complaints/{complaint}', [MailController::class, 'show_complaint'])->name('show_complaint');
    Route::post('/add-complaints/store', [MailController::class, 'store_complaint'])->name('store-complaint');
    Route::post('/complaints/{complaint}/comments', [MailController::class, 'store_comment'])->name('store-comment');
    Route::delete('comments/{id}', [MailController::class, 'delete_comment'])->name('comments-delete');

    // Customer service
    Route::middleware(['customer-service'])->group(function() {
        Route::put('/update-complaint', [MailController::class, 'update_complaint'])->name('update-complaint');
        Route::post('/add-sites/store', [SiteController::class, 'store_sites'])->name('store-site');
        Route::delete('/sites/{sites}', [SiteController::class, 'delete_sites'])->name('delete-site');
        Route::get('/add-announs', [AnnounsController::class, 'create_announs'])->name('add-announs');
        Route::post('/add-announs/store', [AnnounsController::class, 'store_announs'])->name('store-announ');
    });

    // Administrator  - Team IT
    Route::middleware(['admin'])->group(function() {
        Route::get('/users', [UserController::class, 'index_users'])->name('index-user');
        Route::post('/add-sites/store', [SiteController::class, 'store_sites'])->name('store-site');
        Route::post('/add-users/store', [UserController::class, 'store_users'])->name('store-user');
        Route::delete('/users/{users}', [UserController::class, 'delete_users'])->name('delete-user');
        Route::get('/infomatic', [InformaticController::class, 'index_informatic'])->name('index-informatics');
        Route::put('/update-informatic', [InformaticController::class, 'update_informatic'])->name('update-informatic');
        Route::get('/add-announs', [AnnounsController::class, 'create_announs'])->name('add-announs');
        Route::post('/add-announs/store', [AnnounsController::class, 'store_announs'])->name('store-announ');
        Route::delete('/announs/{announs}', [AnnounsController::class, 'delete_announs'])->name('delete-announ');
    });
});