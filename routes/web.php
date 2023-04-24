<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\ClassCategoryController;
use App\Http\Controllers\Admin\StudentController;
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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function () {

  Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
  Route::resource('/faqs',FaqController::class);
  Route::resource('/static_pages',StaticPageController::class);
  Route::resource('/email_templates',EmailTemplateController::class);
  Route::resource('/coupons',CouponController::class);
  Route::resource('/class_categories',ClassCategoryController::class);
  Route::resource('/students',StudentController::class);
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');

    return "cache is clear";

});
