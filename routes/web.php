<?php

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\DealerController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




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
Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared";
});
Auth::routes(["register" => false]);

Route::redirect('/', '/login')->name('home');

Route::group(["middleware" => "auth", "prefix" => "admin"], function () {
    Route::resource("users", UserController::class)->middleware('can:manage_user');
    Route::resource("dealers", DealerController::class)->middleware('can:admin');
    Route::resource("inventory", InventoryController::class);
    Route::resource("areas", AreaController::class)->middleware('can:admin');
    Route::put("inventory/update/status/{inventory_id}", [InventoryController::class, "updateStatus"]);
    Route::get('inventory-detail/{id}', [InventoryController::class, 'inventory_detail']);
});
Route::group(["middleware" => "auth"], function () {
    Route::get("/profile", [HomeController::class, "profile"]);
    Route::put("/profile", [HomeController::class, "updateProfile"]);
    Route::get('in-active/{id}', [UserController::class, 'isActive']);
    Route::get('/activitise', [HomeController::class, 'index']);
    Route::get('/export-data/{id}', [InventoryController::class, 'export']);
   
    Route::get('details/{id}', [DealerController::class, 'details']);
    Route::get('user/{id}', [UserController::class, 'user']);
});

    Route::post('get-phases', [AreaController::class, 'get_phases']);


    Route::get('file-active/{id}', [UserController::class, 'activeSub']);
    Route::get('file-inactive/{id}', [UserController::class, 'inactiveSub']);

    Route::get('export/', [InventoryController::class, 'export_all']);
    Route::get('delete-phase/{id}',[AreaController::class, 'delete']);