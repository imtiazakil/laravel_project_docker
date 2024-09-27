<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('home');
});
Route::post('/items', [ItemController::class, 'store']);
Route::get('/view', [ItemController::class, 'view']);
Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('items.edit'); // Show edit form
Route::post('/update/{id}', [ItemController::class, 'update'])->name('items.update'); // Update the item
Route::delete('/delete/{id}', [ItemController::class, 'destroy'])->name('items.destroy'); // Delete the item