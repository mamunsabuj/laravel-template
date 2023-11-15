<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;

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
    return view('app');
});


Route::resource('/products', ProductController::class);
Route::resource('/purchase', PurchaseController::class);
Route::resource('/sale', SaleController::class);

Route::get('/api/get-all-products', [ProductController::class, 'getAllProducts']);
Route::get('/api/get-product/{product}', [ProductController::class, 'getProductById']);
Route::post('/api/purchase-create', [PurchaseController::class, 'store']);
Route::get('/api/get-pur-batches/{id}', [PurchaseController::class, 'getPurBatches']);
Route::get('/api/get-product-stock/{product_id}/{batch}', [PurchaseController::class, 'getProdutStock']);
Route::post('/api/sale-create', [SaleController::class, 'store']);
