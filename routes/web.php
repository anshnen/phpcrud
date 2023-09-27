<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\EmailsController;
use App\Mail\WelcomeMail;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('product', 'ProdController', ['parameters' => ['product' => 'product']]);  
Route::resource('product', 'ProdController');  
/*Route::get('/product', [ProdController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProdController::class, 'create'])->name('product.create');
Route::post('/product', [ProdController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProdController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProdController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProdController::class, 'destroy'])->name('product.destroy');*/

Route::get('/email', [EmailsController::class, 'email']);