<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Inventory;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Home;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\CustomerController;

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


/********************************* Admin Routes********************************************* */
 //Route::view('admin','admin.viw_login')->name('admin');

Route::view('admin','admin.viw_login')->name('admin');
Route::post('valid-auth',[Login::class,'valid_auth']);
Route::get('admin/dashboard',[Login::class,'dashboard'])->name('admin/dashboard');
Route::get('logout',[Login::class,'logout'])->name('logout');
Route::get('admin/inventory',[Inventory::class,'index'])->name('admin/inventory');
Route::post('admin/inventory/insert',[Inventory::class,'insert_inventory'])->name('admin/inventory/insert');
Route::get('admin/inventory/list',[Inventory::class,'get_inventory'])->name('admin/inventory/list');
Route::post('admin/inventory/update',[Inventory::class,'update_inventory'])->name('admin/inventory/update');
Route::get('admin/inventory/delete/{id}',[Inventory::class,'delete_inventory'])->name('admin/inventory/delete');

Route::post('admin/inventory/save-item-details', [Inventory::class, 'storeItem'])->name('save.item.details');
 
Route::get('admin/inventory/get-item-details/{itemId}',[Inventory::class,'getItemDetails'])->name('admin/inventory/get-item-details');
 
Route::post('admin/inventory/update-item', [Inventory::class, 'updateItem'])->name('admin/inventory/update-item');
 
 
Route::post('admin/inventory/adjustment', [Inventory::class, 'submitForm'])->name('inventory.adjustment.submit'); 
Route::post('admin/inventory/webdetails', [Inventory::class, 'webDetailsstore'])->name('admin/inventory/webdetails');

Route::post('admin/inventory/upload-standard-pricing',[Inventory::class,'uploadStandardPricing'])->name('admin/inventory/upload-standard-pricing');
 



Route::view('admin/message','admin.viw_message')->name('admin.message');
Route::get('admin/order/{orderid}',[OrdersController::class,'order_detail'])->name('admin.order');
Route::get('admin/orders',[OrdersController::class,'index'])->name('admin.orders');
Route::get('admin/orders-create',[OrdersController::class,'orderCreate'])->name('admin.orders.create');
Route::post('admin/orders-store',[OrdersController::class,'orderStore'])->name('admin.orders.store');
Route::get('admin/orders-edit/{orderid}',[OrdersController::class,'orderEdit'])->name('admin.orders.edit');
Route::get('admin/order-wizard/{orderid}',[OrdersController::class,'orderWizard'])->name('admin.orders.wizard');

Route::post('admin/order-cost/store',[OrdersController::class,'orderWizardCostStore'])->name('admin.orders.cost.store');
Route::post('admin/order-shipping/store',[OrdersController::class,'orderWizardShippingStore'])->name('admin.orders.shipping.store');

Route::get('admin/orders-product-edit/{productid}',[OrdersController::class,'editProductOrder'])->name('admin.product.orders.edit');
Route::get('admin/orders-cost-edit/{costid}',[OrdersController::class,'editCostOrder'])->name('admin.wizard.cost.edit');
Route::get('admin/orders-shipping-edit/{shippingid}',[OrdersController::class,'editShippingOrder'])->name('admin.shippping.orders.edit');
   
Route::post('admin/orders-product-store/',[OrdersController::class,'StoreProductOrder'])->name('admin.product.orders.store');
Route::post('admin/orders-cost-store/',[OrdersController::class,'StoreCostOrder'])->name('admin.wizard.cost.store');
Route::post('admin/orders-shipping-store/',[OrdersController::class,'StoreShippingOrder'])->name('admin.shippping.orders.store');

Route::get('admin/order-shipping/{orderid}',[OrdersController::class,'orderShippingAdd'])->name('admin.orders.shiping');
Route::post('admin/order-details/store',[OrdersController::class,'orderDetailsStores'])->name('admin.orders.details.store');
Route::post('admin/order-details/submit',[OrdersController::class,'orderDetailSubmit'])->name('admin.orders.submit');
 
   
Route::get('admin/orders-additem/{orderid}',[OrdersController::class,'orderAddItem'])->name('admin.orders.additem'); 
Route::get('/filter-items', [OrdersController::class, 'filterItems'])->name('filter.items');
Route::get('/filter-items/{itemId}/{orderId}', [OrdersController::class, 'getItems']);

Route::post('admin/order/item-store',[OrdersController::class,'orderWizardItemStore'])->name('admin.orders.item.store');

// Approve routes
Route::post('admin/order/pending/approved/',[OrdersController::class,'orderPendingApproved'])->name('order.pending.approved');
 


// Printing Routes
Route::get('/printing_a_artwork_add/{id}',[OrdersController::class,'printingAArtwork'])->name('printing_a_artwork_add');
// Route::get('/printing_b_artwork_add/{itemId}/{orderId}',[OrdersController::class,'printingBArtwork'])->name('order.printing_b_artwork_add');
// Route::get('/printing_c_artwork_add/{itemId}/{orderId}',[OrdersController::class,'printingCArtwork'])->name('order.printing_c_artwork_add');
    
// Route::get('/embroidery_a_artwork_add/{itemId}/{orderId}',[OrdersController::class,'embroideryAArtwork'])->name('order.embroidery_a_artwork_add');
// Route::get('/embroidery_b_artwork_add/{itemId}/{orderId}',[OrdersController::class,'embroideryBArtwork'])->name('order.embroidery_b_artwork_add');
// Route::get('/pad_print_add/{itemId}/{orderId}',[OrdersController::class,'padPrint'])->name('order.pad_print_add');
Route::get('/printing_b_artwork_add/{id}',[OrdersController::class,'printingBArtwork'])->name('order.printing_b_artwork_add');
Route::get('/printing_c_artwork_add/{id}',[OrdersController::class,'printingCArtwork'])->name('order.printing_c_artwork_add');
    
Route::get('/embroidery_a_artwork_add/{id}',[OrdersController::class,'embroideryAArtwork'])->name('order.embroidery_a_artwork_add');
Route::get('/embroidery_b_artwork_add/{id}',[OrdersController::class,'embroideryBArtwork'])->name('order.embroidery_b_artwork_add');
Route::get('/pad_print_add/{id}',[OrdersController::class,'padPrint'])->name('order.pad_print_add');
  
Route::post('printing/insert',[OrdersController::class,'insertPrinting'])->name('printing.insert');
  
//view order
Route::get('/view/{orderid}',[OrdersController::class,'viewOrder'])->name('admin.orders.view');


//view order
Route::get('/open-model-Stock-control',[Inventory::class,'openModelData'])->name('open-model-Stock-control');
 
 //part ship
 Route::get('/partship/{orderid}',[OrdersController::class,'partShipOrder'])->name('admin.orders.partship');
 
// Staff Route
Route::get('admin/staff',[StaffController::class,'index'])->name('admin/staff');
Route::post('admin/staff/insert',[StaffController::class,'insert_staff'])->name('admin/staff/insert');
Route::get('admin/staff/list',[StaffController::class,'get_staff'])->name('admin/staff/list');
Route::post('admin/staff/update',[StaffController::class,'update_staff'])->name('admin/staff/update');
Route::get('admin/staff/delete/{id}',[StaffController::class,'delete_staff'])->name('admin/staff/delete');

Route::get('admin/permission/',[StaffController::class,'Permission'])->name('admin.permission');
   


// Acounting Routes

Route::get('admin/accounting/default',[AccountingController::class,'index'])->name('admin/accounting/default');
Route::get('admin/accounting/createinvoice',[AccountingController::class,'invoiceForm'])->name('admin/accounting/createinvoice');
Route::get('admin/accounting/newQuotes',[AccountingController::class,'newQuotes'])->name('admin/accounting/newQuotes');

Route::get('/filter-customer', [AccountingController::class, 'filterCustomer'])->name('filter.customer');  
Route::get('/filter-customer/{customerId}', [AccountingController::class, 'getItems']);

Route::post('admin/accounting/save-invoice', [AccountingController::class, 'saveInvoice'])->name('admin/accounting/save-invoice');;

//technoshark
Route::get('admin/customer', [CustomerController::class, 'index'])->name('customer');

Route::get('/search',[CustomerController::class,'searchData'])->name('search.student');

/********************************* Front Routes********************************************* */
// Route::get('/', function () {
//     return view('front.viw_index');
// });
Route::get('/',[Home::class,'index']);
// Route::view('product','front.viw_product')->name('product');
Route::view('customer-experience','front.viw_customer_experience')->name('customer-experience');
Route::view('about','front.viw_about')->name('about');
Route::view('organization','front.viw_organization')->name('organization');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('view-cart', [CartController::class, 'view_cart'])->name('viewcart');
Route::get('cart/remove/{id}',[CartController::class,'remove_product'])->name('remove_product');
Route::get('shop/item/{productid}',[ProductController::class,'index'])->name('shop.item');
Route::get('shop/cart/checkout',[CheckoutController::class,'index'])->name('shop.cart.checkout');
Route::post('shop/place/order',[CheckoutController::class,'order_insert'])->name('shop.place.order');
Route::get('product',[ProductController::class,'products_listing'])->name('product');


