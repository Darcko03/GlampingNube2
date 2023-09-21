<?php


use App\Http\Controllers\CustomerController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\DomeController;
use App\Http\Controllers\characteristiccontroller;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CharacteristicDomeController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


//Route::resource('characteristicss', characteristicscontroller::class)->parameters(['characteristicss'=>'characteristics'])->names('characteristics');

Route::resource('characteristics', characteristicController::class)->names([
    'index' => 'characteristics.index',
    'create' => 'characteristics.create',
    'store' => 'characteristics.store',
    'show' => 'characteristics.show',
    'edit' => 'characteristics.edit',
    'update' => 'characteristics.update',
    'destroy' => 'characteristics.destroy',
])->middleware('auth');

Route::resource('domes', domeController::class)->names([
    'index' => 'domes.index',
    'create' => 'domes.create',
    'store' => 'domes.store',
    'show' => 'domes.show',
    'edit' => 'domes.edit',
    'update' => 'domes.update',
    'destroy' => 'domes.destroy',
])->middleware('auth');

Route::resource('offers', offerController::class)->names([
    'index' => 'offers.index',
    'create' => 'offers.create',
    'store' => 'offers.store',
    'show' => 'offers.show',
    'edit' => 'offers.edit',
    'update' => 'offers.update',
    'destroy' => 'offers.destroy',
])->middleware('auth');

Route::resource('services', serviceController::class)->names([
    'index' => 'services.index',
    'create' => 'services.create',
    'store' => 'services.store',
    'show' => 'services.show',
    'edit' => 'services.edit',
    'update' => 'services.update',
    'destroy' => 'services.destroy',
])->middleware('auth');

Route::resource('permissions', permissionController::class)->names([
    'index' => 'permissions.index',
    'create' => 'permissions.create',
    'store' => 'permissions.store',
    'show' => 'permissions.show',
    'edit' => 'permissions.edit',
    'update' => 'permissions.update',
    'destroy' => 'permissions.destroy',
])->middleware('auth');

Route::resource('roles', RoleController::class)->names([
    'index' => 'roles.index',
    'create' => 'roles.create',
    'store' => 'roles.store',
    'show' => 'roles.show',
    'edit' => 'roles.edit',
    'update' => 'roles.update',
    'destroy' => 'roles.destroy',
])->middleware('auth');

Route::resource('customers', CustomerController::class)->names([
    'index' => 'customers.index',
    'create' => 'customers.create',
    'store' => 'customers.store',
    'show' => 'customers.show',
    'edit' => 'customers.edit',
    'update' => 'customers.update',
    'destroy' => 'customers.destroy',
])->middleware('auth');

Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'show' => 'users.show',
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
])->middleware('auth');

Route::resource('payment-methods', PaymentMethodController::class)->names([
    'index' => 'payment-methods.index',
    'create' => 'payment-methods.create',
    'store' => 'payment-methods.store',
    'show' => 'payment-methods.show',
    'edit' => 'payment-methods.edit',
    'update' => 'payment-methods.update',
    'destroy' => 'payment-methods.destroy',
])->middleware('auth');

Route::resource('bookings', BookingController::class)->names([
    'index' => 'bookings.index',
    'create' => 'bookings.create',
    'store' => 'bookings.store',
    'show' => 'bookings.show',
    'edit' => 'bookings.edit',
    'update' => 'bookings.update',
    'destroy' => 'bookings.destroy',
])->middleware('auth');



Route::get('/verificar-reserva', 'BookingController@verificarReserva')->name('verificar.reserva');



/*Route::resource('characteristic-domes', CharacteristicDomeController::class)->names([
    'index' => 'characteristic-domes.index',
    'create' => 'characteristic-domes.create',
    'store' => 'characteristic-domes.store',
    'show' => 'characteristic-domes.show',
    'edit' => 'characteristic-domes.edit',
    'update' => 'characteristic-domes.update',
    'destroy' => 'characteristic-domes.destroy',
])->middleware('auth');


Route::resource('role-permissions', RolePermissionController::class)->names([
    'index' => 'role-permissions.index',
    'create' => 'role-permissions.create',
    'store' => 'role-permissions.store',
    'show' => 'role-permissions.show',
    'edit' => 'role-permissions.edit',
    'update' => 'role-permissions.update',
    'destroy' => 'role-permissions.destroy',
])->middleware('auth');*/

