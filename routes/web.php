<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultiesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UnitsController;
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


    Route::resource('users', UserController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('requests', RequestsController::class);
    Route::resource('items', ItemsController::class);
    // Route::resource('students', StudentsController::class);
    Route::resource('variants', ItemsController::class);
    Route::resource('categories', ItemsController::class);
    Route::resource('units', ItemsController::class);
    Route::resource('faculties', FacultiesController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('units', UnitsController::class);


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

// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');

require __DIR__ . '/auth.php';
