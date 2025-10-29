<?php

use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\RentConfigController;
use App\Http\Controllers\Web\AdsController;
use App\Http\Controllers\Web\Areas\AreaController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Categories\CategoriesController;
use App\Http\Controllers\Web\Categories\SubCategoriesController;
use App\Http\Controllers\Web\Cities\CityController;
use App\Http\Controllers\Web\Currency\CurrencyController;
use App\Http\Controllers\Web\Customers\CustomerController;
use App\Http\Controllers\Web\Dashboard\DashboardController;
use App\Http\Controllers\Web\Messages\MessageController;
use App\Http\Controllers\Web\NotificationController;
use App\Http\Controllers\Web\Rents\RentController;
use App\Http\Controllers\Web\Social\SocialLinkController;
use App\Http\Controllers\Web\SubscriptionController;
use App\Http\Controllers\Web\Vehicle_Attributes\VehicleAttributesController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin|visitor|root'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('root');

    Route::controller(CategoriesController::class)->group(function(){
        Route::get('categories', 'index')->name('categories');
        Route::get('categories/add', 'create')->name('categories.add');
        Route::post('categories/store', 'store')->name('categories.store');
         Route::get('categories/edit/{id}', 'edit')->name('categories.edit');
         Route::post('categories/update/{id}', 'update')->name('categories.update');
        Route::get('categories/delete/{id}', 'delete')->name('categories.delete');
    });

    Route::controller(SubCategoriesController::class)->group(function(){
        Route::get('subcategories', 'subcategories')->name('sub.categories');
        Route::get('subcategories/add', 'create')->name('subcategories.create');
        Route::post('subcategories/store', 'store')->name('subcategories.store');
        Route::get('subcategories/edit/{i}', 'edit')->name('subcategories.edit');
        Route::post('subcategories/update/{id}', 'update')->name('subcategories.update');
        Route::get('subcategories/delete/{id}', 'delete')->name('subcategories.delete');
    });

    Route::controller(VehicleAttributesController::class)->group(function(){
        Route::get('transmissions', 'transmissions')->name('transmissions');
        Route::get('transmission/add', 'transmissionCreate')->name('transmission.create');
        Route::post('transmission/store', 'transmissionStore')->name('transmission.store');
        Route::get('transmission/edit/{id}', 'transmissionEdit')->name('transmission.edit');
        Route::post('transmission/update/{id}', 'transmissionUpdate')->name('transmission.update');
        Route::get('transmission/delete/{id}', 'transmissionDelete')->name('transmission.delete');

        Route::get('fuels', 'fuels')->name('fuels');
        Route::get('fuel/add', 'fuelCreate')->name('fuel.create');
        Route::post('fuel/store', 'fuelStore')->name('fuel.store');
        Route::get('fuel/edit/{id}', 'fuelEdit')->name('fuel.edit');
        Route::post('fuel/update/{id}', 'fuelUpdate')->name('fuel.update');
        Route::get('fuel/delete/{id}', 'fuelDelete')->name('fuel.delete');

        Route::get('vehicle_types', 'vehicleTypes')->name('vehicle_types');
        Route::get('vehicleType/add', 'vehicleTypeCreate')->name('vehicleType.create');
        Route::post('vehicle-types/store', 'vehicleTypeStore')->name('vehicle-types.store');
        Route::get('vehicleType/edit/{id}', 'vehicleTypeEdit')->name('vehicleType.edit');
        Route::post('vehicleType/update/{id}', 'vehicleTypeUpdate')->name('vehicleType.update');
        Route::get('vehicleType/delete/{id}', 'vehicleTypeDelete')->name('vehicleType.delete');
    });

    //customer
    Route::get('/customers', [CustomerController::class, 'index'])->name('customer');
    Route::get('/customers/{customer}/show', [CustomerController::class, 'show'])->name('customer.show');

    //message
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');

    //rents
    Route::get('/rents', [RentController::class, 'index'])->name('rent');
    Route::get('/rents/{rent}/toggle-status', [RentController::class, 'toggleActivationStatus'])->name('rent.status.toggle');
    Route::get('/rents/{rent}/details', [RentController::class, 'show'])->name('rent.details');

    //city
    Route::get('/cities', [CityController::class, 'index'])->name('city');
    Route::post('/cities', [CityController::class, 'store'])->name('city.add');
    Route::post('/cities/{city}/edit', [CityController::class, 'edit'])->name('city.edit');

    //area
    Route::get('/areas', [AreaController::class, 'index'])->name('area');
    Route::post('/areas', [AreaController::class, 'store'])->name('area.add');
    Route::get('/areas/create', [AreaController::class, 'create'])->name('area.create');
    Route::post('/areas/store', [AreaController::class, 'areaStore'])->name('area.store');
    Route::get('/areas/{area}/edit', [AreaController::class, 'edit'])->name('area.edit');
    Route::post('/areas/{area}/update', [AreaController::class, 'update'])->name('area.update');

    //currency
    Route::get('/setting/currenct', [CurrencyController::class, 'index'])->name('setting.currency');
    Route::post('/setting/currenct', [CurrencyController::class, 'updateOrCreate'])->name('setting.currency');

    //social Link
    Route::get('/social-link', [SocialLinkController::class, 'index'])->name('setting.socialLink');
    Route::post('/social-link', [SocialLinkController::class, 'store'])->name('setting.socialLink.store');
    Route::post('/social-link/{social}', [SocialLinkController::class, 'update'])->name('setting.socialLink.update');
    Route::get('/social-link/{social}', [SocialLinkController::class, 'delete'])->name('setting.socialLink.delete');

    // Notification routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notification.index');
    Route::post('/send-notifications', [NotificationController::class, 'sendNotification'])->name('notification.send');

    //subscription
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::post('/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscription.store');
    Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscription.edit');
    Route::post('/subscriptions/{subscription}/update', [SubscriptionController::class, 'update'])->name('subscription.update');
    Route::get('/subscriptions/{subscription}/toggle-status', [SubscriptionController::class, 'toggleStatus'])->name('subscription.status.toggle');

    // App Settings routes
    Route::get('/setting', [AppSettingController::class, 'index'])->name('setting.index');
    Route::post('/setting', [AppSettingController::class, 'update'])->name('setting.update');

    // Rent Config Route
    Route::controller(RentConfigController::class)->group(function () {
        Route::get('/rent-config', 'index')->name('rentconfig.index');
        Route::post('/rent-config/update/{id?}', 'update')->name('rentconfig.update');
    });

    // Ads routes
    Route::controller(AdsController::class)->group(function () {
        Route::get('/ads', 'index')->name('ads.index');
        Route::get('/ads/create', 'create')->name('ads.create');
        Route::post('/ads/store', 'store')->name('ads.store');
        Route::get('/ads/{ads}/edit', 'edit')->name('ads.edit');
        Route::post('/ads/{ads}/update', 'update')->name('ads.update');
        Route::get('/ads/{ads}/destroy', 'destroy')->name('ads.destroy');
    });

    //bkash payment config
    Route::controller(PaymentGatewayController::class)->group(function () {
        Route::get('/bkash-config', 'index')->name('bkash.index');
        Route::post('/bkash-config', 'update')->name('bkash.update');
    });
});

//bkash payment gateway
Route::controller(PaymentGatewayController::class)->group(function () {
    Route::get('/bkash-payment', 'createPayment')->name('bkash.paymentGateway');
    Route::get('/bkash-payment/{rent}/callback', 'chargePayment')->name('bkash.callback');
    Route::get('/bkash-payment/execute/{token}', 'executePayment')->name('bkash.execute');
});
