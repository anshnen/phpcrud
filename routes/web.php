<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DownFileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\QRCodeController;


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
Route::resource('product', 'ProdController')->name('index', 'product.index');  
/*Route::get('/product', [ProdController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProdController::class, 'create'])->name('product.create');
Route::post('/product', [ProdController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProdController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProdController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProdController::class, 'destroy'])->name('product.destroy');*/

Route::get('/email', [EmailsController::class, 'email']);

Route::get('/upload-file', [UploadController::class, 'createForm']);
Route::post('/upload-file', [UploadController::class, 'fileUpload'])->name('fileUpload');
Route::get('/file', [DownFileController::class, 'showFileList'])->name('file.list');
Route::get('download/{filePath}', [DownFileController::class, 'downloader'])->name('file.downloader');

Route::get('/register', 'AuthController@register')->name('register');
Route::post('/store', 'AuthController@store')->name('store');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/authenticate', 'AuthController@authenticate')->name('authenticate');
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::controller(ImportExportController::class)->group(function(){
    Route::get('import_export', 'importExport');
    Route::post('import', 'import')->name('import');
    Route::get('export', 'export')->name('export');
});


Route::controller(QRCodeController::class)->group(function(){
    Route::get('qrcode', 'getQRForm');
    Route::post('decode', 'postDecodeQR')->name('decode');
});