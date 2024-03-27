<?php

use App\Http\Controllers\Admin\AddonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AShopsListController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AItemsListController;
use App\Http\Controllers\ShopRegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
// use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\VendorTypeController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ReservationController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// ================= Admin Routes =================
Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])
	->name('admin.login');
Route::post('/login/admin', [LoginController::class, 'adminLogin'])
	->name('admin.login.submit');

Route::group(['middleware' => 'auth:admin'], function () {
	Route::prefix('admin')->group(function () {
		// Admin Dashboard Routes Start
		Route::controller(AdminDashboardController::class)->group(function () {
			Route::get('/dashboard', 'index')->name('dashboard.index');
			Route::get('/dashboard/order-details/{id}', 'orderDetails');
			Route::get('/order/approve/{id}', 'approveOrder');
			Route::get('/dashboard/deliver/{id}', 'deliverOrder');
			Route::post('/dashboard/picked/{id}', 'pickOrder');
			Route::get('/dashboard/cancel/{id}', 'cancelOrder');
			Route::get('/dashboard/order/history', 'orderHistory');
			Route::get('/open-store/{id}', 'openStore');
			Route::post('/update/shop/{id}', 'updateStore');
			Route::post('/shop/registered', 'newShopCreating');
			Route::get('/approved/shop', 'approvedShopList');
			Route::get('/edit/store/{id}', 'editStore');
			Route::post('/updated/shop/{id}', 'adminStoreUpdated');
			Route::get('/register/new/rider', 'createNewRider');
			Route::get('/approved/rider', 'approvedRiderList');
			Route::post('/update/rider/{id}', 'updateStoreRider');
			Route::post('/edit/rider/{id}', 'updateRiderApproved');
			Route::post('/assign/rider/{id}', 'assignAreaRider');
		});
		// Admin Dashboard Routes End

		// Admin Operators Routes Start
		Route::controller(OperatorController::class)->group(function () {
			Route::get('/operators', 'index')->name('operators.index');
			Route::get('/operators/create', 'create')->name('operators.create');
			Route::post('/operators', 'store')->name('operators.store');
			Route::get('/operators/{id}', 'show')->name('operators.show');
			Route::get('/operators/{id}/edit', 'edit')->name('operators.edit');
			Route::put('/operators/{id}', 'update')->name('operators.update');
			Route::delete('/operators/{id}', 'destroy')->name('operators.destroy');
		});
		// Admin Operators Routes End

		// Admin Shops List Routes Start
		Route::controller(AShopsListController::class)->group(function () {
			Route::get('/new-shops-list', 'showNewShopList');
			Route::get('/new-rider-list', 'showNewRiderList');
			Route::get('/open-store/rider/{id}', 'openStoreRider');
			Route::get('/assignarea/rider/{id}', 'assignareaRider');
			Route::get('/open-store/rider/approved/{id}', 'openStoreRiderApproved');
			Route::get('/customer/list', 'customerList');
		});
		// Admin Shops List Routes End

		// Admin Category Routes Start
		Route::controller(CategoriesController::class)->group(function () {
			Route::get('/categories', 'index')->name('categories.index');
			Route::get('/categories/create', 'create')->name('categories.create');
			Route::post('/categories', 'store')->name('categories.store');
			Route::get('/categories/{id}', 'show')->name('categories.show');
			Route::get('/categories/{id}/edit', 'edit')->name('categories.edit');
			Route::put('/categories/{id}', 'update')->name('categories.update');
			Route::delete('/categories/{id}', 'destroy')->name('categories.destroy');
		});
		// Admin Category Routes End

		// Admin Items List Routes Start
		Route::controller(AItemsListController::class)->group(function () {
			Route::get('/store/{id}', 'index');
			Route::post('/upload-store-items/store/{id}', 'storeItems');
			Route::get('/inventory/status', 'status');
			// Route::get('/branch/itemlist/{branch}', 'branchItemList');
			Route::get('/inventory/itemlist', 'getItemList');
			Route::get('/addnew/item/{vendor}', 'create')->name('item.create');
			Route::post('/addnew/item', 'store')->name('item.store');
			Route::get('/edit/item/{id}', 'edit')->name('item.edit');
			Route::post('/update/item', 'update')->name('item.update');
			Route::post('/delete/item/{id}', 'destroy')->name('item.destroy');
		});
		// Admin Items List Routes End

		// Admin Branch Routes Start
		// Route::controller(BranchesController::class)->group(function () {
		// 	Route::get('/branches', 'index')->name('branches.index');
		// 	Route::get('/branches/create', 'create')->name('branches.create');
		// 	Route::post('/branches', 'store')->name('branches.store');
		// 	Route::get('/branches/{id}', 'show')->name('branches.show');
		// 	Route::get('/branches/{id}/edit', 'edit')->name('branches.edit');
		// 	Route::put('/branches/{id}', 'update')->name('branches.update');
		// 	Route::delete('/branches/{id}', 'destroy')->name('branches.destroy');
		// 	Route::get('/branch/orders/{id}', 'getBranchOrders')
		// 		->name('branches.orders');
		// 	Route::get('/branch/vendors/{id}', 'getBranchVendors')
		// 		->name('branches.vendors');
		// });
		// Admin Branch Routes End

		// Admin User Routes Start
		Route::controller(UserController::class)->group(function () {
			Route::get('/addnew/user', 'create')->name('user.create');
			Route::post('/addnew/user', 'store')->name('user.store');
			Route::get('/user/list', 'index')->name('user.index');
		});
		// Admin User Routes End

		// Admin Deal Routes Start
		Route::controller(DealController::class)->group(function () {
			Route::get('/branch/deals/{branch}', 'index')->name('deal.index');
			Route::get('/deals/create/{branch}', 'create')->name('deal.create');
			Route::post('/deals', 'store')->name('deal.store');
			Route::post('/deals/add-info', 'addInfo')->name('deal.info');
			Route::get('/deals/add-items/{vendor}', 'showItemsForm')
				->name('deal.itemsForm');
			Route::post('/deals/add-items', 'addItems')->name('deal.add-items');
			Route::get('/deals/save-deal/{vendor}', 'showSaveDealForm')
				->name('deal.saveDeal');
			Route::post('/deals/load-items/{deal?}', 'loadItems')
				->name('deal.loadItems');
			Route::post('/deals/add-ons/{deal?}', 'loadAddOns')
				->name('deal.loadAddOns');
			Route::post('/deals/update-status', 'updateStatus')
				->name('deal.updateStatus');
			Route::get('/deals/{id}/edit/{vendor}', 'edit')->name('deal.edit');
			Route::post('/deals/{id}/edit-info', 'editInfo')
				->name('deal.edit.info');
			Route::get('/deals/{id}/edit-items/{vendor}', 'showEditItemsForm')
				->name('deal.edit.itemsForm');
			Route::post('/deals/{id}/edit-items', 'editItems')
				->name('deal.edit.items');
			Route::get('/deals/{id}/edit-deal/{vendor}', 'showEditDealForm')
				->name('deal.edit.editDeal');
			Route::post('/deals/{id}/update', 'update')->name('deal.update');
			Route::delete('/deal/{id}', 'destroy')->name('deal.destroy');
			Route::get('/deals/addons/add/{deal}', 'addDealAddOn')
				->name('deal.addons.add');
			Route::post('/deals/addons/add', 'storeDealAddOn')
				->name('deal.addons.store');
			Route::get('/deals/{deal}/addons/edit', 'editDealAddon')
				->name('deal.addons.edit');
			Route::post('/deals/addons/edit', 'updateDealAddOn')
				->name('deal.addons.update');
		});
		// Admin Deal Routes End

		// Admin Addon Routes Start
		Route::controller(AddonController::class)->group(function () {
			Route::get('/get-addons/{category}', 'getAddons')->name('get-addons');
			Route::post('/items/{item}/addons', 'saveAddons')->name('save-addons');
			Route::get('/get-added-addons/{item}', 'getAddedAddons');
			Route::post('/items/{item}/remove-addon', 'removeAddon');
		});
		// Admin Addon Routes End

		// Admin Reservation Routes Start
		Route::controller(ReservationController::class)->group(function () {
			Route::get('/reservations/{branch}', 'index')
				->name('reservation.index');
			Route::get('/reservation/reserve/{id}', 'markAsReserved')
				->name('reservation.reserve');
			Route::get('/reservation/cancel/{id}', 'cancelReservation')
				->name('reservation.cancel');
		});
		// Admin Reservation Routes End

		// Admin Settings Routes Start
		Route::controller(SettingController::class)->group(function () {
			Route::get('/settings/reorder', 'getReorderingView');
			Route::get('/settings/reorder/categories/{branch}', 'reorderCategories');
			Route::post('/settings/update-category-order', 'updateCategoryOrder');
			Route::get('/settings/reorder/items/{category}', 'reorderItems');
			Route::post('/settings/update-item-order', 'updateItemOrder');
			Route::get('/settings/show-old-cart', 'showOldCart')
				->name('settings.show-old-cart');
			Route::post('/settings/clean-old-cart', 'cleanOldCart')
				->name('settings.clean-old-cart');
		});
		// Admin Settings Routes End

		// Admin City Routes Start
		Route::controller(CityController::class)->group(function () {
			Route::get('/cities', 'index')->name('cities.index');
			Route::get('/cities/create', 'create')->name('cities.create');
			Route::post('/cities', 'store')->name('cities.store');
			Route::get('/cities/{id}', 'show')->name('cities.show');
			Route::get('/cities/{id}/edit', 'edit')->name('cities.edit');
			Route::put('/cities/{id}', 'update')->name('cities.update');
			Route::delete('/cities/{id}', 'destroy')->name('cities.destroy');
		});
		// Admin City Routes End

		// Admin Vendors Routes Start
		Route::controller(VendorController::class)->group(function () {
			Route::get('/vendors', 'index')->name('vendors.index');
			Route::get('/vendors/create', 'create')->name('vendors.create');
			Route::post('/vendors', 'store')->name('vendors.store');
			Route::get('/vendors/{id}', 'show')->name('vendors.show');
			Route::get('/vendors/{id}/edit', 'edit')->name('vendors.edit');
			Route::put('/vendors/{id}', 'update')->name('vendors.update');
			Route::delete('/vendors/{id}', 'destroy')->name('vendors.destroy');
			Route::get('/vendors/orders/{id}', 'getVendorOrders')
				->name('vendors.orders');
			Route::get('/vendors/item-list/{id}', 'vendorItemList')
				->name('vendors.items');
			Route::get('/vendors/deals/{id}', 'vendorDealList')
				->name('vendors.deals');
		});
		// Admin Vendors Routes End

		// Admin Vendor Type Routes Start
		Route::controller(VendorTypeController::class)->group(function () {
			Route::get('/vendor-types', 'index')
				->name('vendorTypes.index');
			Route::get('/vendor-types/create', 'create')
				->name('vendorTypes.create');
			Route::post('/vendor-types', 'store')
				->name('vendorTypes.store');
			Route::get('/vendor-types/{id}', 'show')
				->name('vendorTypes.show');
			Route::get('/vendor-types/{id}/edit', 'edit')
				->name('vendorTypes.edit');
			Route::put('/vendor-types/{id}', 'update')
				->name('vendorTypes.update');
			Route::delete('/vendor-types/{id}', 'destroy')
				->name('vendorTypes.destroy');
		});
		// Admin Vendor Type Routes End
	});
});

# Front End Routes Start
Route::controller(FrontController::class)->group(function () {
	Route::get('/home', 'index')->name('home');
	Route::get('/', 'index');
	Route::get('/vendors/detail/{id}', 'vendorDetail')
		->name('vendor.detail');
	Route::get('/vendor/{vendorId}/items/detail/{itemId}', 'itemDetail')
		->name('vendor.item.details');
	Route::get('/vendor/{vendorId}/deals/detail/{dealId}', 'dealDetail')
		->name('vendor.deal.details');
	Route::get('/items/detail/{id}', 'itemDetail')->name('item.detail');
	Route::get('/deals/detail/{id}', 'dealDetail')->name('deal.detail');
	# Added by Sohail Asghar [25-Sept-2023]
	Route::get('/load-deals-and-categories/{branch}', 'loadDealsAndCategories')
		->name('load.deals.categories');
	Route::post('/load-vendors', 'loadVendors')->name('load.vendors');
	Route::post('/save-selected-location', 'saveSelectedLocation')
		->name('save.selectedLocation');
});
# Front End Routes End

// Route::get('/', [HomeController::class, 'index']);

// Start Shop Routes
// Route::get('/shop-registration', [ShopRegistrationController::class, 'shopRegistationForm']);
// Route::post('/shop/register', [ShopRegistrationController::class, 'shopRegistration']);
// Route::get('/shop/login', [LoginController::class, 'showshopLoginForm']);
// Route::post('/login/shop', [LoginController::class, 'shopLogin']);

// Route::group(['middleware' => 'auth:shop'], function () {
// 	Route::view('/shop', 'shop');
// 	Route::view('/shop/dashboard', 'layouts.shop');
// 	Route::resource('shops', ShopController::class);
// 	Route::resource('/shop/items', ShopController::class);
// 	Route::get('/shop/shop-product-list', [ShopController::class, 'showProductList']);
// 	Route::post('/shop/upload-store-items/{id}', [ShopController::class, 'storeItems']);
// });
// End Shop Routes
Route::get('/thankyou', [ShopRegistrationController::class, 'thankYou']);

// Customer Routes Start
Route::get('/customer-registration', [ShopRegistrationController::class, 'customerRegistationForm'])->name('customer.register');
Route::post('/customer/register', [ShopRegistrationController::class, 'customerRegistration']);
// Customer Routes End

// Rider Routes Start
Route::get('/rider-registration', [ShopRegistrationController::class, 'riderRegistationForm']);
Route::post('/rider/register', [ShopRegistrationController::class, 'riderRegistration']);
// Rider Routes End

// Front Pages Routes Start
Route::controller(HomeController::class)->group(function () {
	Route::get('/why-join-us', 'whyJoinUs');
	Route::get('/testimonials', 'testimonials');
	Route::get('/about-us', 'aboutUs');
	Route::get('/gallery', 'gallery');
	Route::get('/contact-us', 'contactUs');
	Route::get('/privacy-policy', 'privacyPolicy');
});
// Front Pages Routes End

// Customer Login Routes Start
Route::get('customer/login', [LoginController::class, 'showCustomerLoginForm'])
	->name('customer.login');
Route::post('login/customer', [LoginController::class, 'customerLogin'])
	->name('customer.login.submit');
Route::get('customer/verify', [LoginController::class, 'verifyForm'])
	->name('customer.verify');
Route::post('customer/verify', [LoginController::class, 'verify'])
	->name('customer.verify.submit');
// Customer Login Routes End

// ================= Rider route =================
// Route::get('/rider/login', [LoginController::class, 'showRiderLoginForm']);
// Route::post('/login/rider', [LoginController::class, 'riderLogin']);

// Route::group(['middleware' => 'auth:rider'], function () {
//     Route::view('/rider', 'rider');
//     Route::view('/rider/dashboard', 'layouts.rider');
// });

// ================= Shop route =================
// Route::get('/shop/login', [LoginController::class, 'showshopLoginForm']);
// Route::post('/login/shop', [LoginController::class, 'shopLogin']);

// Route::group(['middleware' => 'auth:shop'], function () {
//     Route::view('/shop', 'shop');
//     Route::view('/shop/dashboard', 'layouts.shop');
// });

// Cart Routes Start
Route::controller(CartController::class)->group(function () {
	// Route::get('cart', 'cart')->name('cart');
	Route::post('cart/add', 'addToCart')->name('cart.create');
	Route::post('cart/update', 'update')->name('cart.update');
	Route::post('cart/remove', 'remove')->name('cart.remove');
	Route::post('/clear-cart', 'clearCart')->name('cart.clear');
});
// Cart Routes End

Route::group(['middleware' => 'auth:customer'], function () {
	Route::controller(CheckoutController::class)->group(function () {
		Route::get('/checkout', 'index')->name('checkout.page');
		Route::post('/checkout', 'checkout')->name('checkout');
		Route::get('/my-orders/{customerID}', 'customerOrders')
			->name('customer.orders');
	});
});