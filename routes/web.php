<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController as C;
use App\Http\Controllers\ProductController as P;
use App\Http\Controllers\PhotoController as F;
use App\Http\Controllers\StarController;
use App\Models\Star;

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
})->name('front-index');


Route::prefix('cats')->name('cats-')->group(function () {
    Route::get('/{cat}', [C::class, 'show'])->name('show');//->middleware('role:admin|user');
    Route::get('/', [C::class, 'index'])->name('index');//->middleware('role:admin');
    
    Route::get('/create/new', [C::class, 'create'])->name('create');//->middleware('role:admin');
    Route::post('/create', [C::class, 'store'])->name('store');//->middleware('role:admin|user');
    
    
    Route::get('/edit/{cat}', [C::class, 'edit'])->name('edit');//->middleware('role:admin');
    Route::put('/edit/{cat}', [C::class, 'update'])->name('update');//->middleware('role:admin');
    Route::delete('/delete/{cat}', [C::class, 'destroy'])->name('delete');//->middleware('role:admin');
    Route::post('/donate/{cat}', [C::class, 'addDonation'])->name('addDonation');
});

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index');//->middleware('role:admin|client');
    Route::get('/colors', [P::class, 'colors'])->name('colors');//->middleware('role:admin');
    Route::get('/color-name', [P::class, 'colorName'])->name('color-name');//->middleware('role:admin');
    Route::get('/create', [P::class, 'create'])->name('create');//->middleware('role:admin');
    Route::post('/create', [P::class, 'store'])->name('store');//->middleware('role:admin');
    Route::get('/{product}', [P::class, 'show'])->name('show');//->middleware('role:admin');
    Route::get('/edit/{product}', [P::class, 'edit'])->name('edit');//->middleware('role:admin');
    Route::put('/edit/{product}', [P::class, 'update'])->name('update');//->middleware('role:admin');
    Route::delete('/delete/{product}', [P::class, 'destroy'])->name('delete');//->middleware('role:admin');
});
//photo model
Route::prefix('photos')->name('photos-')->group(function () {
    Route::get('/create/gallery', [F::class, 'createPhoto'])->name('createPhoto');
    Route::post('/addto/gallery', [F::class, 'storeGal'])->name('storeGal');
    Route::delete('/delete/{photo}', [F::class, 'destroyGal'])->name('deleteGal');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//stars controleris
Route::post('/stars/{id}', [StarController::class, 'store'])->name('stars.store');

