<?php

use App\Http\Controllers\Admin\AddonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AItemsListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
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

		// Admin User Approval Routes Start
		Route::controller(ApprovalController::class)->group(function () {
			Route::get('/approve-customers', 'index')
				->name('approve.index');
			Route::post('/approve-customer/{id}', 'approve')
				->name('approve.customer');
			Route::post('/reject-customer/{id}', 'reject')
				->name('reject.customer');
		});
		// Admin User Approval Routes End

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
			Route::get('/inventory/itemlist', 'getItemList');
			Route::get('/addnew/item/{vendor}', 'create')->name('item.create');
			Route::post('/addnew/item', 'store')->name('item.store');
			Route::get('/edit/item/{id}', 'edit')->name('item.edit');
			Route::post('/update/item', 'update')->name('item.update');
			Route::post('/delete/item/{id}', 'destroy')->name('item.destroy');
		});
		// Admin Items List Routes End

		// Admin Inventory Mapping Routes Start
		Route::controller(InventoryController::class)->group(function () {
			// Route::prefix('inventory')->group(function () {});
			Route::get('/inventory', 'index')->name('inventory.index');
			Route::get('/inventory/create', 'create')->name('inventory.create');
			Route::post('/inventory', 'store')->name('inventory.store');
			Route::get('/inventory/{id}', 'show')->name('inventory.show');
			Route::get('/inventory/{id}/edit', 'edit')->name('inventory.edit');
			Route::patch('/inventory/{id}', 'update')->name('inventory.update');
			Route::delete('/inventory/{id}', 'destroy')->name('inventory.destroy');
			
			// Route::prefix('mapping')->group(function () {});
			Route::get('/mapping', 'mapping')->name('inventory.mapping.index');
			Route::get('/mapping/create', 'mappingCreate')->name('inventory.mapping.create');
			Route::post('/mapping', 'mappingStore')->name('inventory.mapping.store');
		});
		// Admin Inventory Mapping Routes End

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

		// Admin Settings Routes Start
		Route::controller(SettingController::class)->group(function () {
			Route::get('/settings/reorder/categories/{branch}', 'reorderCategories');
			// Route::post('/settings/update-category-order', 'updateCategoryOrder');
			Route::get('/settings/reorder/items/{category}', 'reorderItems');
			// Route::post('/settings/update-item-order', 'updateItemOrder');
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
	});
});

// Route::get('/thankyou', [ShopRegistrationController::class, 'thankYou']);

# Front Pages Routes Start
Route::controller(HomeController::class)->group(function () {
	Route::get('/why-join-us', 'whyJoinUs');
	Route::get('/testimonials', 'testimonials');
	Route::get('/about-us', 'aboutUs');
	Route::get('/gallery', 'gallery');
	Route::get('/contact-us', 'contactUs');
	Route::get('/privacy-policy', 'privacyPolicy');
});
# Front Pages Routes End

# Customer Login Routes Start
Route::get('customer/login', [LoginController::class, 'showCustomerLoginForm'])
	->name('customer.login');
Route::post('login/customer', [LoginController::class, 'customerLogin'])
	->name('customer.login.submit');
Route::get('/customer/register', [LoginController::class, 'showCustomerRegistrationForm'])
	->name('customer.register');
Route::post('register/customer', [LoginController::class, 'customerRegister'])
	->name('customer.register.submit');
Route::get('/verify-pin', [LoginController::class, 'showPinVerificationForm'])
	->name('customer.verify.pin');
Route::post('/verify-pin', [LoginController::class, 'verifyPin'])
	->name('customer.verify.pin.submit');
Route::get('customer/verify', [LoginController::class, 'verifyForm'])
	->name('customer.verify');
Route::post('customer/verify', [LoginController::class, 'verify'])
	->name('customer.verify.submit');
# Customer Login Routes End

Route::group(['middleware' => 'auth:customer'], function () {
	# Front End Routes Start
	Route::controller(FrontController::class)->group(function () {
		Route::get('/home', 'index')->name('home');
		Route::get('/', 'index');
		Route::get('/categories', 'getCategories')->name('categories');
		Route::get('/categories/detail/{id}', 'categoryDetail')
		->name('category.detail');
		Route::get('/inventory-status', 'inventoryStatus')
			->name('inventory.status');
		Route::get('/vendors/detail/{id}', 'vendorDetail')
			->name('vendor.detail');
		Route::get('/vendor/{vendorId}/items/detail/{itemId}', 'itemDetail')
			->name('vendor.item.details');
		Route::get('/vendor/{vendorId}/deals/detail/{dealId}', 'dealDetail')
			->name('vendor.deal.details');
		Route::get('/items/detail/{id}', 'itemDetail')->name('item.detail');
		Route::get('/deals/detail/{id}', 'dealDetail')->name('deal.detail');
		Route::get('/load-deals-and-categories/{branch}', 'loadDealsAndCategories')
			->name('load.deals.categories');
		Route::post('/load-suppliers', 'loadSuppliers')->name('load.suppliers');
		Route::post('/save-selected-city', 'saveSelectedCity')
			->name('save.selectedCity');
		Route::get('/inventory-generator', 'inventoryAIGenerator')->name('inventory.generator');
	});
	# Front End Routes End

	# Cart Routes Start
	Route::controller(CartController::class)->group(function () {
		# Route::get('cart', 'cart')->name('cart');
		Route::post('cart/add', 'addToCart')->name('cart.create');
		Route::post('cart/update', 'update')->name('cart.update');
		Route::post('cart/remove', 'remove')->name('cart.remove');
		Route::post('/clear-cart', 'clearCart')->name('cart.clear');
	});
	# Cart Routes End

	Route::controller(CheckoutController::class)->group(function () {
		Route::get('/checkout', 'index')->name('checkout.page');
		Route::post('/checkout', 'checkout')->name('checkout');
		Route::get('/my-orders/{customerID}', 'customerOrders')
			->name('customer.orders');
		Route::get('/favourite-vendor/{vendor}', 'favouriteVendor')
			->name('customer.favourite.vendor');
	});
});