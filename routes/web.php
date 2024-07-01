<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultiesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\ItemVariantsController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\InventoryReportController;
use App\Models\Items;
use Illuminate\Support\Facades\Route;

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
    return view('kiosk');
});

Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'items'], function () {
        require __DIR__ . '/items.php';
    });

    Route::resource('users', UserController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('requests', RequestsController::class);
    // Route::resource('students', StudentsController::class);
    Route::resource('variants', ItemVariantsController::class);
    Route::resource('faculties', FacultiesController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('units', UnitsController::class);
    Route::resource('trainers', TrainerController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::get('/maintenance/generate-pdf', [MaintenanceController::class, 'generatePDF'])->name('maintenance.generatePDF');
    Route::get('/maintenance/get-item-variants/{id}', [InventoryReportController::class, 'getvariant'])->name('maintenance.getvariant');
    
    Route::resource('inventory', InventoryReportController::class);
    Route::get('/inventory/get-item-variants/{id}', [InventoryReportController::class, 'getvariant'])->name('maintenance.getvariant');


    // Student Routes
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/create-request', [RequestsController::class, 'showCreateForm'])->name('create.request');
Route::get('/track-request', [RequestsController::class, 'showTrackForm'])->name('track.request');
Route::get('/log-list-request', [RequestsController::class, 'showLogList'])->name('log.list.request');
Route::get('/track-request/details', [RequestsController::class, 'trackRequest'])->name('track.request.details');

// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');


// Cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::delete('/cart/remove/{index}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/destroy', [CartController::class, 'destroyCart'])->name('cart.destroy');
Route::get('/cart/requestors', [CartController::class, 'showRequestors'])->name('cart.requestors');
Route::post('/cart/add/requestor', [CartController::class, 'addRequestorToCart'])->name('cart.addRequestor');

Route::get('/print-details', [PrintController::class, 'print'])->name('print');

require __DIR__ . '/auth.php';
