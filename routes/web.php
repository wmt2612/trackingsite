<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ToolController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('cloned-websites', [PageController::class, 'clonedWebsites'])->name('cloned_websites');
    Route::get('update-cloned-website/{id}', [PageController::class, 'updateClonedWebsites'])->name('update_site');
    Route::patch('update-alert-message-site/{id}', [PageController::class, 'updateAlertMessageSite'])->name('update_alert_message');
    Route::get('/settings', [PageController::class, 'settings'])->name('settings');
    Route::post('/settings', [PageController::class, 'updateSettings'])->name('update_settings');
    Route::prefix('tools')->name('tools.')->group(function() {
        Route::get('sha1', [ToolController::class, 'toolSha1'])->name('sha1');
        Route::get('base64', [ToolController::class, 'toolBase64'])->name('base64');
    });
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
});
Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/login', [DashboardController::class, 'postLogin'])->name('post_login');
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
