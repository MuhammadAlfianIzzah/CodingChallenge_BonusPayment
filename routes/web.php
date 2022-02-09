<?php

use App\Http\Controllers\PaymentController;
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

Route::get('/', function () {
    return view('welcome');
})->name("home");
Route::middleware(['auth'])->group(function () {
    Route::get("/BonusPayment", [PaymentController::class, "show"])->name("show-bonus");
    Route::post("/BonusPayment", [PaymentController::class, "store"])->name("post-bonus");
    Route::delete("/BonusPayment/{id}", [PaymentController::class, "destroy"])->name("delete-bonus");
    Route::get("/BonusPayment/{payment:id}", [PaymentController::class, "detail"])->name("detail-bonus");
    Route::get("/BonusPayment/{payment:id}/edit", [PaymentController::class, "edit"])->name("edit-bonus");
    Route::patch("/BonusPayment/{payment:id}/update", [PaymentController::class, "update"])->name("update-bonus");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
