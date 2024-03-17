<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

Route::get('/', [ItemsController::class, 'index'])->name('items.index');
Route::get('/create', [ItemsController::class, 'create'])->name('items.create');
Route::post('/', [ItemsController::class, 'store'])->name('items.store');
Route::get('/{item}', [ItemsController::class, 'show'])->name('items.show');
Route::get('/{item}/edit', [ItemsController::class, 'edit'])->name('items.edit');
Route::put('/{item}', [ItemsController::class, 'update'])->name('items.update');
Route::delete('/{item}', [ItemsController::class, 'destroy'])->name('items.destroy');
