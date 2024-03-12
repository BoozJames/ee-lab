<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::resource('users', UserController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('requests', RequestsController::class);
    Route::resource('items', ItemsController::class);
    Route::resource('students', StudentsController::class);

    // Placeholder routes for students
    // Route::get('/student', function () {
    //     // Logic for student list
    // })->name('student.index');

    // Route::get('/student/campus', function () {
    //     // Logic for student campus page
    // })->name('student.campus');

    // Route::get('/student/college', function () {
    //     // Logic for student college page
    // })->name('student.college');

    // Route::get('/student/program', function () {
    //     // Logic for student program page
    // })->name('student.program');

    // Route::get('/student/course', function () {
    //     // Logic for student course page
    // })->name('student.course');

    // Placeholder route for instructor
    Route::get('/instructor', function () {
        // Logic for instructor list
    })->name('faculties.index');

    Route::resource('variants', ItemsController::class);
    Route::resource('categories', ItemsController::class);
    Route::resource('units', ItemsController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');

require __DIR__ . '/auth.php';
