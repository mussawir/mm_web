<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\Api\V1\MobileShopsItemsListController;
use App\Http\Controllers\Admin\AShopsListController;
use App\Http\Controllers\Admin\AItemsListController;
use App\Http\Controllers\Mobile\Api\V1\MobileCustomerOrdersController;
use App\Http\Controllers\Mobile\Api\V1\MobileCustomerRegistrationController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopKeeperLoginController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopKeeperRegistrationController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopkeerOrdersListController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopItemGroupController;
use App\Http\Controllers\Mobile\Api\V1\MobileLocationController;
use App\Http\Controllers\Mobile\Api\V1\MobileCustomerRegOtpController;
use App\Http\Controllers\Mobile\Api\V1\MobileNsaLeadsController;
use App\Http\Controllers\Mobile\Api\V1\MobileRiderController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopAddOnController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopDealController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopReservationController;
use App\Http\Controllers\Mobile\Api\V1\MobileShopsCategoryController;
use App\Http\Controllers\Mobile\Api\V1\MobileVendorController;
use App\Http\Controllers\Mobile\Api\V1\MobileOperatorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['guest:admin'])->group(function () {
	Route::resource('shops', AShopsListController::class);
	Route::get('/new/shops/list',[AShopsListController::class,'showNewShopList']);
	Route::get('/shop/details/{id}',[AShopsListController::class,'shopDetails']);
	Route::get('/shop/area/details',[AShopsListController::class,'shopAreaDetails']);
	Route::resource('items', AItemsListController::class);
});

// Bhejdo Admin Side Apis
// Route::get('web/v1/all/items/list',[AItemsListController::class,'index']);
// Route::get('web/v1/items/list/{id}',[AItemsListController::class,'show']);

Route::prefix('v1')->group(function () {
	// Bhejdo Customer Side Apis

	//Srk..3-30-2023 NsaLeads Api
	Route::post('/location/leads',[MobileNsaLeadsController::class, 'store']);
	// Api nr 21-3-23
	//Route::get('/city/list',[MobileAreandSubAreaController::class,'getcity']); nr
	//Route::get('/area/list',[MobileAreandSubAreaController::class,'index']); nr
	//Route::get('/subarea/list',[MobileAreandSubAreaController::class,'show']); nr
	//Route::get('/shop/categories/{id}',[MobileAreandSubAreaController::class,'getCategories']);
	// Route::get('/shops/list',[MobileShopsListController::class, 'index']);
	# Added by Sohail Asghar on 25-May-2023
	Route::post('/admin/login', [MobileShopKeeperLoginController::class, 'login']);
	Route::post('/vendor/login', [MobileShopKeeperLoginController::class, 'vendorLogin']);
	// Route::get('/shops/list/{id}/{cid}/{sid}',[MobileShopsListController::class, 'show']);
	// Route::get('/items/list/{id}',[MobileShopsItemsListController::class, 'show']);
	//Route::post('/create/order',[MobileCustomerOrdersController::class, 'store']);
	Route::post('/update/order/{id}',[MobileCustomerOrdersController::class, 'update']);
	Route::post('/create/customer',[MobileCustomerRegistrationController::class,'store']);
	Route::post('/customer/login',[MobileCustomerRegistrationController::class,'login']);
	// Route::get('/checkotp/{cid}/{otp}',[MobileCustomerRegOtpController::class,'checkOtp']);
	// new api for checking otp
	Route::post('/checkotp',[MobileCustomerRegOtpController::class,'checkOtp']);
	// new api for checking number
	Route::post('/checknumber',[MobileCustomerRegOtpController::class,'checkNumber']);

	Route::post('/update/customer/{cid}',[MobileCustomerRegOtpController::class,'update']);
	Route::get('/show/customer/otp/{cid}',[MobileCustomerRegOtpController::class,'showCustRegOtp']);
	Route::get('/get/customers/list',[MobileCustomerRegistrationController::class,'index']);
	/** Musavir 14-2-2023 **/
	Route::get('/getcategories/{id}',[MobileShopsItemsListController::class,'getCategories']);
	# Addd by Sohail Asghar - 21-July-2023
	Route::get('/getparentcategories/{branch}',[MobileShopsItemsListController::class,'getParentCategories']);
	Route::get('/parent-categories-by-vendor-type/{vendorType}',[MobileShopsItemsListController::class,'getParentCategoriesByVendorType']);
	/** Srk 3/4/23  **/
	Route::get('/most/used/categories/{id}',[MobileShopsItemsListController::class,'musedCategories']);

	Route::get('/getcatitems/{categoryId}/{vendorId}',[MobileShopsItemsListController::class,'getItemsByCategory']);
	Route::get('/getcatitems/{categoryId}',[MobileShopsItemsListController::class,'getItemsByCat']);

	Route::post('/favourite/shop',[MobileShopsItemsListController::class,'favouriteStore']);
	// Route::get('/favourite/shop/list/{id}',[MobileShopsListController::class,'favouriteStoreList']);

	// create order for login users
	Route::post('/create/order',[MobileCustomerOrdersController::class, 'createOrder']);
	Route::get('/show/orders/{customer}',[MobileCustomerOrdersController::class, 'showOrders']);

	// reset pin for login users
	Route::get('/reset/pin/{phonenumber}',[MobileCustomerRegistrationController::class, 'update']);
	Route::get('/customer/received/order/{customer}',[MobileCustomerOrdersController::class, 'customerReceivedOrder']);
	Route::get('/products/detail/{id}',[MobileCustomerOrdersController::class, 'productdetails']);
	Route::get('/group/item/list',[MobileCustomerOrdersController::class, 'groupdetails']);
	Route::get('/customer/verified/{id}', [MobileCustomerRegistrationController::class, 'verified_Customer']);

	// Bhejdo Rider Side Apis
	Route::get('/rider/list',[MobileRiderController::class, 'index']);
	Route::get('/rider/order/list/{riderId}', [MobileRiderController::class, 'getOrderList']);
	Route::get('/rider/order/picked/{orderId}/{riderId}', [MobileRiderController::class, 'orderPicked']);
	Route::get('/rider/order/delivered/{id}', [MobileRiderController::class, 'orderDelivered']);
	Route::post('/rider/order/returned', [MobileRiderController::class, 'orderReturned']);
	Route::get('/rider/order/list/delivered/{riderId}', [MobileRiderController::class, 'orderDeliveredList']);
	Route::get('/rider/order/list/returned/{riderId}', [MobileRiderController::class, 'orderReturnShow']);
	Route::post('/rider/registration', [MobileRiderController::class, 'riderReg']);
	Route::post('/rider/login',[MobileRiderController::class, 'riderLogin']);

	// Bhejdo ShoopKeeper Side Apis
	Route::get('/shopkeeper/list',[MobileShopKeeperLoginController::class, 'index']);
	Route::get('/shopkeeper/orders/list/{id}/{status}',[MobileShopkeerOrdersListController::class, 'show']);
	Route::post('/shopkeeper/registration',[MobileShopKeeperRegistrationController::class, 'create']);
	Route::get('/shopkeeper/orders/details/{id}',[MobileShopkeerOrdersListController::class, 'getOrdersDetail']);
	Route::post('/shopkeeper/orders/deliver',[MobileShopkeerOrdersListController::class, 'orderDeliverToRider']);
	Route::post('/shopkeeper/orders/pickup',[MobileShopkeerOrdersListController::class, 'orderPickup']);
	Route::post('/shopkeeper/orders/cancel',[MobileShopkeerOrdersListController::class, 'orderCancel']);
	// Sorab creating an api to change order status
	Route::get('/shopkeeper/orders/change/status/{id}/{status}',[MobileShopkeerOrdersListController::class, 'orderStatusChange']);
	// shopkeeper api created date 23/sep/2022 //
	Route::post('/shopkeeper/create/group/{name}',[MobileShopItemGroupController::class, 'createGroup']);
	Route::get('/shopkeeper/group/add/items/{group_id}/{item_id}',[MobileShopItemGroupController::class, 'groupAddItem']);
	Route::get('/shopkeeper/group/delete/{group_id}',[MobileShopItemGroupController::class, 'groupDeleteItem']);
	Route::get('/shopkeeper/group/item/list/{id}',[MobileShopItemGroupController::class, 'getGroupItemList']);
	Route::get('/shopkeeper/group/remove/items/{group_id}/{item_id}',[MobileShopItemGroupController::class, 'groupRemoveItem']);
	Route::get('/shopkeeper/group/list/{id}',[MobileShopItemGroupController::class, 'getGroupList']);
	Route::post('/shopkeeper/edit/group/{group_id}/{name1}',[MobileShopItemGroupController::class, 'editGroup']);

	Route::get('/shopkeeper/stop/delivery/{shop_id}',[MobileShopKeeperLoginController::class, 'stopDelievry']);
	Route::get('/shopkeeper/start/delivery/{shop_id}',[MobileShopKeeperLoginController::class, 'startDelivery']);
	Route::get('/shopkeeper/point/shop/{shop_id}',[MobileShopKeeperLoginController::class, 'pointShop']);

	Route::get('/shopkeeper/orders/delivered/{id}',[MobileShopkeerOrdersListController::class, 'orderDelivered']);
	Route::post('/shopkeeper/orders/delivers',[MobileShopkeerOrdersListController::class, 'orderDelivers']);
	Route::post('/shopkeeper/add/item/{name}',[MobileShopsItemsListController::class, 'shopAddItem']);
	# Added by Sohail Asghar on 06-June-2023
	# Category Endpoints Start
	Route::post('/shopkeeper/add/category/{id}',[MobileShopsCategoryController::class, 'shopAddCategory']);
	Route::get('/shopkeeper/category/{id}',[MobileShopsCategoryController::class, 'getCategory']);
	Route::post('/shopkeeper/update/category/{id}/{shopId}',[MobileShopsCategoryController::class, 'updateCategory']);
	Route::get('/shopkeeper/remove/category/{id}/{shopId}',[MobileShopsCategoryController::class, 'removeCategory']);
	# Category Endpoints End
	# Added by Sohail Asghar on 22-June-2023
	# Deals Endpoints Start
	Route::get('/shopkeeper/deal/list/{vendorId}', [MobileShopDealController::class, 'index']);
	Route::post('/shopkeeper/add/deal/{branch}', [MobileShopDealController::class, 'addDeal']);
	Route::get('/shopkeeper/deal/{deal}',[MobileShopDealController::class, 'getDeal']);
	Route::post('/shopkeeper/update/deal/{deal}/{branch}', [MobileShopDealController::class, 'updateDeal']);
	Route::get('/shopkeeper/remove/deal/{deal}/{branch}', [MobileShopDealController::class, 'removeDeal']);
	# Deals Endpoints End
	# Reservation Endpoints Start
	Route::post('/reservation/add/{branch}',[MobileShopReservationController::class, 'store']);
	Route::get('/reservation/list/{customerId}',[MobileShopReservationController::class,'getReservations']);
	Route::get('/reservation/list/branch/{branch}',[MobileShopReservationController::class,'getBranchReservations']);
	# Reservation Endpoints End
	Route::get('/shopkeeper/item/{item}',[MobileShopsItemsListController::class, 'getItem']);
	Route::post('/shopkeeper/update/item/{id}/{name}',[MobileShopsItemsListController::class, 'update']);
	Route::get('/shopkeeper/item/list/all/{vendor}',[MobileShopsItemsListController::class, 'getAllItemList']);
	Route::get('/shopkeeper/category/list/{id}',[MobileShopsItemsListController::class, 'getCategories']);
	Route::get('/shopkeeper/product/remove/items/{id}',[MobileShopsItemsListController::class, 'productRemoveItem']);
	Route::post('/shopkeeper/add/clone/item/{shop_id}',[MobileShopsItemsListController::class, 'cloneItem']);
	// Route::get('/markets/list',[MobileMarketController::class, 'getMarketList']);
	// Route::get('/markets/category/list',[MobileMarketController::class, 'getMarketCategoryList']);
	Route::get('/shopkeeper/orders/ready/{id}',[MobileShopkeerOrdersListController::class, 'getreadyord']);
	Route::get('/shopkeeper/verified/{id}', [MobileShopKeeperRegistrationController::class, 'verified_Shopkeeper']);
	// Route::get('/shopkeeper/checking/subarea/city', [MobileShopkeerOrdersListController::class, 'verified_subarea']);
	// Sorab
	Route::post('/shopkeeper/fcmToken', [MobileShopKeeperLoginController::class, 'updateFCMToken']);


	// Bhejdo Service Area APIs
	Route::get('/location/list',[MobileLocationController::class,'index']);
	Route::get('/location/current/{country}/{state}/{city}/{neighborhood}',[MobileLocationController::class,'current']);
	Route::get('/location',[MobileLocationController::class,'getLocation']);

	Route::get('/category/subcategories/{category}/{vendor}',[MobileShopsCategoryController::class, 'fetchSubCategories']);

	Route::get('/city/list', [MobileShopsCategoryController::class, 'fetchCities']);
	Route::get('/city/branches/list/{city}', [MobileLocationController::class, 'fetchCityBranches']);
	Route::get('/city/branch/count', [MobileLocationController::class, 'cityBranchCount']);

	// Added by Sohail Asghar - 15-AUG-2023
	Route::get('/shopkeeper/currency', [MobileShopsItemsListController::class, 'fetchCurrency']);

	Route::get('/shopkeeper/addons/{category}', [MobileShopAddOnController::class, 'getCategoryAddons']);
	Route::get('/shopkeeper/item/addons/{item}', [MobileShopAddOnController::class, 'getItemAddons']);
	Route::get('/shopkeeper/items/all/{item}', [MobileShopAddOnController::class, 'getAllItems']);
	Route::post('/shopkeeper/items/{item}/addons', [MobileShopAddOnController::class, 'saveAddons']);
	Route::post('/shopkeeper/items/{item}/remove-addon', [MobileShopAddOnController::class, 'removeAddon']);

	// Deal Addons
	Route::get('/shopkeeper/deal/addons/{deal}', [MobileShopAddOnController::class, 'getDealAddons']);
	Route::post('/shopkeeper/deals/{deal}/remove-deal-addon', [MobileShopAddOnController::class, 'removeDealAddon']);
	Route::post('/shopkeeper/deals/{deal}/addons', [MobileShopAddOnController::class, 'saveDealAddons']);
	# Added by Sohail Asghar [07-SEPT-2023]
	Route::get('/subcategory/items/{category}',[MobileShopsCategoryController::class, 'fetchChildCategoriesItems']);

	# Operator app routes
	Route::post('/operator/login', [MobileOperatorController::class, 'operatorLogin']);
	Route::post('/operator/dashboard/stats', [MobileOperatorController::class, 'dashboardStats']);
	Route::get('/operator/num/vendors', [MobileOperatorController::class, 'numberOfVendors']);
	Route::get('/operator/vendors/list', [MobileOperatorController::class, 'vendorsList']);
	Route::post('/operator/dashboard/vendor/stats', [MobileOperatorController::class, 'vendorStats']);

	# Added by Sohail Asghar [22-DEC-2023]
	Route::prefix('vendors')->group(function() {
		Route::get('/list', [MobileVendorController::class, 'index']);
		Route::get('/deals/{id}', [MobileVendorController::class, 'getVendorDeals']);
		Route::get('/items/{id}', [MobileVendorController::class, 'getVendorItems']);
		Route::get('/categories/{id}', [MobileVendorController::class, 'getVendorCategories']);
		Route::get('/types/{isFood}', [MobileVendorController::class, 'getVendorTypes']);
		Route::get('/delivery/{id}', [MobileVendorController::class, 'getVendorDeliveryDetails']);
		Route::get('/details/{id}', [MobileVendorController::class, 'getVendorDetails']);
		Route::post('/check/range' ,[MobileVendorController::class, 'checkInRange']);
	});
});