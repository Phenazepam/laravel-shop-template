<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\MainController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', MainController::class)->name('main.view');

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', [CategoryController::class, 'Index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'Create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'Store'])->name('category.store');
    Route::get('/{category}/edit', [CategoryController::class, 'Edit'])->name('category.edit');
    Route::get('/{category}', [CategoryController::class, 'Show'])->name('category.show');
    Route::patch('/{category}', [CategoryController::class, 'Update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'Delete'])->name('category.delete');
});

Route::group(['prefix' => 'tags'], function() {
    Route::get('/', [TagController::class, 'Index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'Create'])->name('tag.create');
    Route::post('/', [TagController::class, 'Store'])->name('tag.store');
    Route::get('/{tag}/edit', [TagController::class, 'Edit'])->name('tag.edit');
    Route::get('/{tag}', [TagController::class, 'Show'])->name('tag.show');
    Route::patch('/{tag}', [TagController::class, 'Update'])->name('tag.update');
    Route::delete('/{tag}', [TagController::class, 'Delete'])->name('tag.delete');
});