<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\mealController ;
use App\Http\Controllers\admin\orderController ;
use App\Http\Controllers\admin\categoryController ;
use App\Http\Controllers\admin\userController ;
// use App\Http\Controllers\admin\mealController ;
use App\Http\Controllers\admin\materialController ;
use App\Http\Controllers\admin\supplierController ;
use App\Http\Controllers\admin\mediaController ;
use App\Http\Controllers\admin\roleController ;
use App\Http\Controllers\admin\settingsController ;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::prefix('articles')->group(function () {
        Route::get('/', [mealController::class, 'index'])->name('articles') ;
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', [orderController::class, 'index'])->name('orders') ;
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [categoryController::class, 'index'])->name('categories') ;
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [userController::class, 'index'])->name('users') ;
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [settingsController::class, 'index'])->name('settings') ;
        Route::get('/roles', [roleController::class, 'index'])->name('roles') ;
        Route::get('/content', [settingsController::class, 'content'])->name('content') ;
        Route::get('/social-media', [mediaController::class, 'index'])->name('media-social') ;
        Route::get('/option-order', [settingsController::class, 'option'])->name('order-settings') ;
        Route::get('/lang', [settingsController::class, 'lang'])->name('languages') ;
    });
    Route::prefix('charges')->group(function () {
        Route::get('/materials', [materialController::class, 'index'])->name('materials') ;
        Route::get('/supplier', [supplierController::class, 'index'])->name('supplier') ;
        Route::get('/branches', function () {return view('pages.admin.settings.charges.branches.index');})->name("branches");
        Route::get('/costs', function () {return view('pages.admin.costs.index');})->name("costs");
    });
});
Route::middleware('guest')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::get('/', function () {return view('pages.auth.login');})->name("login");
    });

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
