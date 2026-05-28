<?php

use App\Http\Controllers\ItemSaleController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return redirect()->route('items.create');
});
Route::get('/items', [ItemSaleController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemSaleController::class, 'create'])->name('items.create');

Route::post('/items', [ItemSaleController::class, 'store'])->name('items.store');
