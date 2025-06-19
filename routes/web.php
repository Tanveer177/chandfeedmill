<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Accounts\AccountController;
use App\Http\Controllers\Accounts\LedgerController;
use App\Http\Controllers\Accounts\VoucherController;
use App\Http\Controllers\Inventory\InventoryItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseInvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\SalesInvoiceController;
use App\Http\Controllers\ProductionBatchController;
use App\Http\Controllers\BillOfMaterialController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseManagement\SupplierController as PurchaseManagementSupplierController;
use App\Http\Controllers\PurchaseManagement\PurchaseOrderController as PurchaseManagementPurchaseOrderController;
use App\Http\Controllers\PurchaseManagement\PurchaseInvoiceController as PurchaseManagementPurchaseInvoiceController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ERP Modules
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('accounts/accounts', AccountController::class);
Route::resource('accounts/ledgers', LedgerController::class);
Route::resource('accounts/vouchers', VoucherController::class);
Route::resource('inventory-items', InventoryItemController::class);
Route::resource('customers', CustomerController::class);
Route::resource('sales-orders', SalesOrderController::class);
Route::resource('sales-invoices', SalesInvoiceController::class);
Route::resource('production-batches', ProductionBatchController::class);
Route::resource('bill-of-materials', BillOfMaterialController::class);
Route::resource('reports', ReportController::class);
Route::resource('settings', SettingController::class);
Route::resource('users', UserController::class)->only(['index', 'edit', 'update']);
Route::resource('purchase-management/suppliers', PurchaseManagementSupplierController::class)->names('purchase-management.suppliers');
Route::resource('purchase-management/orders', PurchaseManagementPurchaseOrderController::class)->names('purchase-management.orders');
Route::resource('purchase-management/invoices', PurchaseManagementPurchaseInvoiceController::class)->names('purchase-management.invoices');
