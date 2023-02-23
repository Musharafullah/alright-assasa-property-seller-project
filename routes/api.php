<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\InventoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyApi;
use App\Http\Controllers\NewApiController;
use App\Http\Controllers\Validator;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Models\Area;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get("/areas", [AreaController::class, 'show']);
    Route::get("/extras", [AreaController::class, 'extras']);

    Route::get("/inventory/all", [PropertyController::class, 'index']);
    Route::get("/user/inventory/{user_id}", [PropertyController::class, 'userInventory']);
    Route::post("/inventory", [PropertyController::class, 'add']);
    Route::post("/inventory/{id}", [PropertyController::class, 'update']);
    Route::post("/inventory/{id}/status/update", [PropertyController::class, 'updateInventoryStatus']);
    Route::delete("/inventory/{id}", [PropertyController::class, 'delete']);

    Route::group(["prefix" => "users"], function () {
        Route::get("/type/admins", [UserController::class, "admins"]);
        Route::get("/type/dealers", [UserController::class, "dealers"]);
        Route::get("/type/users", [UserController::class, "users"]);
        Route::get("/{dealer_id}", [UserController::class, "dealerUsers"]);
        Route::post("/", [UserController::class, 'add']);
        Route::post("/remove_image", [UserController::class, 'removeUserImage']);
        Route::post("/update/{id}", [UserController::class, 'update']);
    });
});
    Route::get('allAgency',[PropertyController::class, 'allAgency']);
    Route::post('login', [AuthController::class, 'login']);