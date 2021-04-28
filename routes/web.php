<?php

use App\Models\Category;
use App\Http\Controllers\ProdController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {

    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('index');

    Route::get('settings', [App\Http\Controllers\CategoryController::class, 'settingIndex'])->name('settings.index');

    /* Получаем все категории в древовидном виде */
    Route::post('getcats',[App\Http\Controllers\CategoryController::class, 'getCategories']);
    /* Ищем продукты по ГОСТ-у (поле fields) */
    Route::post('findprods',[App\Http\Controllers\ProdController::class, 'findprods']);

    /* Сохранение категорий */
    Route::post('setnewcats',[App\Http\Controllers\CategoryController::class, 'setnewcats']);

    Route::get('set0',function (){

        return view("category.setting0");

    });


});
