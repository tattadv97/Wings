<?php

use App\Http\Controllers\CetakTransactionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\logController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\PoController;
use App\Http\Controllers\PoDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportOperationalController;
use App\Http\Controllers\ReportPo;
use App\Http\Controllers\ReportTransactionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UnitController;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function() {
    return view('template.index');
})->middleware('auth');
Route::get('/form', function() {
    return view('template.form');
});

Route::resource('/product', ProductController::class)->middleware('auth');
Route::resource('/info', InfoController::class)->parameters([
    'info' => 'info:data'
])->middleware('auth');
Route::resource('/customer', CustomerController::class)->middleware('auth');
Route::resource('/unit', UnitController::class)->middleware('auth');
Route::resource('/supplier', SupplierController::class)->middleware('auth');
Route::resource('/transaction', TransactionController::class)->parameters([
    'transaction' => 'transaction:invoice'
])->middleware('auth');
Route::get('/cetak', [TransactionController::class, 'cetak'])->name('cetak')->middleware('auth');
Route::resource('/transactionDetail', TransactionDetailController::class)->middleware('auth');
Route::resource('/po', PoController::class)->parameters([
    'po' => 'po:purchaseNo'
])->middleware('auth');
Route::resource('/poDetail', PoDetailsController::class)->middleware('auth');
Route::resource('/register', RegisterController::class)->middleware('auth');
Route::resource('/operational', OperationalController::class)->middleware('auth');
Route::resource('/report', ReportTransactionController::class)->middleware('auth');
Route::resource('/reportPo', ReportPo::class)->middleware('auth');
Route::resource('/reportOperational', ReportOperationalController::class)->middleware('auth');

Route::resource('/cetakTransaction', CetakTransactionController::class)->middleware('auth');

Route::get('/log', [logController::class, 'index'])->name('login');
Route::post('log', [logController::class, 'store']);
Route::post('logout', [logController::class, 'logout']);



