<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Invoice_Report;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::get('/dashboard', [HomeController::class ,'index'])->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('InvoiceDetails/{id}',[InvoicesDetailsController::class,'edit']);
Route::get('view_file/{invoice_number}/{file_name}',[InvoicesDetailsController::class,'open_file']);
Route::get('get_file/{invoice_number}/{file_name}',[InvoicesDetailsController::class,'get_file']);
Route::post('/delete_file',[InvoicesDetailsController::class,'destroy'])->name('delete_file');



Route::get('invoice_edit/{id}',[InvoicesController::class,'edit']);
Route::get('/section/{id}',[InvoicesController::class,'get_products']);
Route::get('invoice_update/{id}',[InvoicesController::class,'update']);
Route::get('invoice_delete/{id}',[InvoicesController::class,'destroy']);
Route::get('invoice_show/{id}',[InvoicesController::class,'show']);
Route::get('invoice_ChangeStatus/{id}',[InvoicesController::class,'ChangeStatus']);
Route::get('invoice/PaidInvoice',[InvoicesController::class,'PaidInvoice'])->name('PaidInvoice');
Route::get('invoice_archive',[InvoicesController::class,'archive']);
Route::get('invoice/UnpaidInvoice',[InvoicesController::class,'UnpaidInvoice'])->name('UnpaidInvoice');
Route::get('Print_invoice/{id}',[InvoicesController::class,'Print_invoice']);
Route::get('invoice/PartialyPaidInvoice',[InvoicesController::class,'PartialyPaidInvoice'])->name('PartialyPaidInvoice');




Route::get('archive_delete',[ArchiveController::class,'destroy']);
Route::get('Restore_invoice',[ArchiveController::class,'update']);
Route::get('invoice_archive/{id}',[ArchiveController::class,'destroy']);
Route::get('invoices_reports',[Invoice_Report::class,'index']);
Route::get('User_reports',[Invoice_Report::class,'User_reports']);

Route::get('Search_user_reports',[Invoice_Report::class,'Search_user_reports']);

Route::get('Search_Invoice',[Invoice_Report::class,'Invoice_Search']);





Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);

});


Route::resource('invoice',InvoicesController::class);
Route::resource('section',SectionsController::class);
Route::resource('product',ProductsController::class);
Route::resource('Archive',ArchiveController::class);





require __DIR__.'/auth.php';
