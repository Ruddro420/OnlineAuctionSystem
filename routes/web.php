<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategory;
use App\Http\Controllers\ProductUpload;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;

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

/* Route::get('/', function () {
    return view('index');
}); */

Route::get('/', [HomeController::class,'index'])->name('index');

/* ChecOut Here  */
Route::get('/checkout/thankyou', [CheckoutController::class,'thankyou'])->name('checkout.thankyou');
Route::get('/checkout/{id}', [CheckoutController::class,'index'])->name('checkout.index');
Route::post('/checkout/store/{id}', [CheckoutController::class,'store'])->name('checkout.store');
Route::delete('/checkout/delete/{order_id}', [CheckoutController::class,'destroy'])->name('checkout.delete');




Auth::routes(['verify' => true]);

Route::prefix('admin')->group(function(){
       //For Dashboard
       Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('admin.dashboard');
       Route::get('/notice/delete/{id}', [DashboardController::class,'destroy'])->name('notice.delete');
   });

   /* Manage User Here ######### */

Route::prefix('user')->group(function(){
    //Student Class Setup

Route::get('/Pview', [UserController::class,'Pview'])->name('setups.user.Pview');
Route::get('/Pedit/{id}', [UserController::class,'Pedit'])->name('setups.user.Pedit');
Route::post('/Pupdate/{id}', [UserController::class,'Pupdate'])->name('setups.user.Pupdate');



    Route::get('/view', [UserController::class,'view'])->name('setups.user.view');
    Route::get('/add', [UserController::class,'add'])->name('setups.user.add');
    Route::post('/store', [UserController::class,'store'])->name('setups.user.store');
    Route::get('/edit/{id}', [UserController::class,'edit'])->name('setups.user.edit');
    Route::post('/update/{id}', [UserController::class,'update'])->name('setups.user.update');
    Route::get('/delete/{id}', [UserController::class,'destroy'])->name('setups.user.delete');

  });

     /* Manage Product Here ######### */

Route::prefix('product')->group(function(){

    //Product Category Setup
    Route::get('/product/category/view', [ProductCategory::class,'view'])->name('product.category.view');
    Route::get('/product/category/add', [ProductCategory::class,'add'])->name('product.category.add');
    Route::post('/product/category/store', [ProductCategory::class,'store'])->name('product.category.store');
    Route::get('/product/category/edit/{id}', [ProductCategory::class,'edit'])->name('product.category.edit');
    Route::post('/product/category/update/{id}', [ProductCategory::class,'update'])->name('product.category.update');
    Route::get('/product/category/delete/{id}', [ProductCategory::class,'destroy'])->name('product.category.delete');

  });


Route::prefix('bid')->group(function(){

            //Product Store Setup
        Route::get('/product/upload/view', [ProductUpload::class,'view'])->name('product.upload.view');
        Route::get('/product/upload/admin/view', [ProductUpload::class,'Aview'])->name('product.upload.Aview');
        Route::get('/product/upload/bid/list', [ProductUpload::class,'bidList'])->name('product.upload.bid.list');
        Route::get('/product/upload/add', [ProductUpload::class,'add'])->name('product.upload.add');
        Route::post('/product/upload/store', [ProductUpload::class,'store'])->name('product.upload.store');
        Route::get('/product/upload/bid/view/{id}', [ProductUpload::class,'bidView'])->name('product.upload.bid.view');
        Route::post('/product/upload/bid/store/{id}', [ProductUpload::class,'bidStore'])->name('product.upload.bid.store');
        Route::get('/product/upload/edit/{id}', [ProductUpload::class,'edit'])->name('product.upload.edit');
        Route::get('/product/upload/admin/edit/{id}', [ProductUpload::class,'Aedit'])->name('product.upload.Aedit');
        Route::post('/product/upload/admin/update/{id}', [ProductUpload::class,'Aupdate'])->name('product.upload.Aupdate');
        Route::post('/product/upload/update/{id}', [ProductUpload::class,'update'])->name('product.upload.update');
        Route::get('/product/upload/delete/{id}', [ProductUpload::class,'destroy'])->name('product.upload.delete');

  });

  Route::prefix('Customerbid')->group(function(){

    //Product Store Setup
Route::get('/product/upload/view', [ProductUpload::class,'view'])->name('product.upload.view');
Route::get('/product/upload/customerView', [ProductUpload::class,'customerView'])->name('product.upload.customer.view');
Route::get('/product/upload/customer/contact/{id}', [ProductUpload::class,'customerdetails'])->name('product.upload.customer.details');
Route::get('/product/upload/bid/list', [ProductUpload::class,'bidList'])->name('product.upload.bid.list');
Route::get('/product/upload/add', [ProductUpload::class,'add'])->name('product.upload.add');
Route::post('/product/upload/store', [ProductUpload::class,'store'])->name('product.upload.store');
Route::get('/product/upload/bid/view/{id}', [ProductUpload::class,'bidView'])->name('product.upload.bid.view');
Route::post('/product/upload/bid/store/{id}', [ProductUpload::class,'bidStore'])->name('product.upload.bid.store');
Route::post('/product/upload/bid/report/store/{id}', [ProductUpload::class,'bidReport'])->name('product.upload.bid.report');
Route::get('/product/upload/edit/{id}', [ProductUpload::class,'edit'])->name('product.upload.edit');
Route::post('/product/upload/update/{id}', [ProductUpload::class,'update'])->name('product.upload.update');
Route::get('/product/upload/delete/{id}', [ProductUpload::class,'destroy'])->name('product.upload.delete');

});






/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
