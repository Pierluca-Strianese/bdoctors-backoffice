<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\BraintreeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guest\PageController as GuestPageController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [GuestPageController::class, 'home'])->name('guest.home');


Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');

// Rotta per visualizzare l'elenco dei messaggi nel cestino
Route::get('/admin/messages/trashed', [MessageController::class, 'trashed'])->name('admin.messages.trashed');

// Rotta per eliminare un messaggio specifico
Route::delete('/admin/messages/{message}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
Route::put('/admin/messages/{id}/restore', [MessageController::class, 'restore'])->name('admin.messages.restore');
Route::delete('/admin/messages/trashed/{id}/delete', [MessageController::class, 'Harddelete'])->name('admin.messages.trashed.hard-delete');


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
            Route::resource('doctors', DoctorController::class);
            Route::resource('users',   UserController::class);
            Route::resource('reviews', ReviewController::class);
            
            Route::resource('messages', MessageController::class);

        

            Route::resource('promotions', PromotionController::class);
            Route::resource('dashboard',DashboardController::class);
            
            Route::any('/payment', [BraintreeController::class, 'token'])->name('doctors.payment');
            Route::any('/payment/checkout', [BraintreeController::class, 'pay'])->name('doctors.checkout');
});

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
