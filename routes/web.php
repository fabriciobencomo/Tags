<?php

use App\Http\Controllers\TagController;
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

Route::get('/', [TagController::class, 'index']);
Route::post('tags', [TagController::class, 'store'])->name('tags.store');
Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

