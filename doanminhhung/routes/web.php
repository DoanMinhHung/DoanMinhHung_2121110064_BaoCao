<?php

use App\Http\Controllers\frontend\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\frontend\TimkiemController;

Route::get('/', [SiteController::class, 'index']) ->name('site.index');
Route::get('/san-pham',[SiteController::class, 'product'])->name('site.product');
Route::get('/bai-viet',[SiteController::class, 'post'])->name('site.post');
Route::get('/gio-hang',function(){echo "Tất cả bài viết"; }); 
Route::post('/tim-kiem', [TimkiemController::class, 'search'])->name('site.search');
Route::get('/khach-hang',function(){echo "Tất cả bài viết"; });
Route::get('/lien-he',function(){echo "Tất cả bài viết"; });
Route::get('/dangnhap', [LoginController::class, 'index'])->name('site.loginn');
Route::get('/dangky', [LoginController::class, 'index'])->name('site.signup');



Route::get('/', [SiteController::class,'index']);
Route::get('/',[SiteController::class,'index'] )->name('home');
Route::get('/admin/login',[AuthController::class,'getlogin'])->name('site.login');
Route::post('/admin/login',[AuthController::class,'postlogin'])->name('admin.postlogin');

Route::prefix('admin')->middleware('loginAdmin')->group(function () {
    
    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');

    Route::prefix('brand')->group(function () {
        Route::get('/status/{id}',[BrandController::class, 'status'])->name('brand.status');
        Route::get('/restore/{brand}',[BrandController::class, 'restore'])->name('brand.restore');
        Route::get('/destroy/{brand}',[BrandController::class, 'destroy'])->name('brand.destroy');

    });
    Route::get('brand/delete/{brand}',[BrandController::class, 'delete'])->name('brand.delete');
    Route::get('brand/trash',[BrandController::class, 'trash'])->name('brand.trash');
    Route::resource('brand',BrandController::class);

    // Route::get('brand/status/{brand}',[BrandController::class, 'status'])->name('brand.status');

    Route::get('category/trash',[CategoryController::class, 'trash'])->name('category.trash');
    Route::get('category/status/{category}',[CategoryController::class, 'status'])->name('category.status');
    // Route::get('category/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');
    Route::get('category/restore/{category}',[CategoryController::class, 'restore'])->name('category.restore');
    // Route::get('category/restore/{trash}',[CategoryController::class, 'trash'])->name('category.trash');
    Route::get('category/delete/{category}',[CategoryController::class, 'delete'])->name('category.delete');
    Route::resource('category',CategoryController::class);

    Route::get('product/trash',[ProductController::class, 'trash'])->name('product.trash');
    Route::get('product/status/{product}',[ProductController::class, 'status'])->name('product.status');
    // Route::get('product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/restore/{product}',[ProductController::class, 'restore'])->name('product.restore');
    // Route::get('product/restore/{trash}',[ProductController::class, 'trash'])->name('product.trash');
    Route::get('product/delete/{product}',[ProductController::class, 'delete'])->name('product.delete');
    Route::resource('product',ProductController::class);

    Route::get('contact/trash',[ContactController::class, 'trash'])->name('contact.trash');
    Route::get('contact/status/{contact}',[ContactController::class, 'status'])->name('contact.status');
    // Route::get('contact/delete/{id}',[ContactController::class, 'delete'])->name('contact.delete');
    Route::get('contact/restore/{contact}',[ContactController::class, 'restore'])->name('contact.restore');
    // Route::get('contact/restore/{trash}',[ContactController::class, 'trash'])->name('contact.trash');
    Route::get('contact/delete/{contact}',[ContactController::class, 'delete'])->name('contact.delete');
    Route::resource('contact',ContactController::class);

    Route::get('menu/trash',[MenuController::class, 'trash'])->name('menu.trash');
    Route::get('menu/status/{menu}',[MenuController::class, 'status'])->name('menu.status');
    // Route::get('menu/delete/{id}',[MenuController::class, 'delete'])->name('menu.delete');
    Route::get('menu/restore/{menu}',[MenuController::class, 'restore'])->name('menu.restore');
    // Route::get('menu/restore/{trash}',[MenuController::class, 'trash'])->name('menu.trash');
    Route::get('menu/delete/{menu}',[MenuController::class, 'delete'])->name('menu.delete');
    Route::resource('menu',MenuController::class);

    Route::get('slider/trash',[SliderController::class, 'trash'])->name('slider.trash');
    Route::get('slider/status/{slider}',[SliderController::class, 'status'])->name('slider.status');
    // Route::get('slider/delete/{id}',[SliderController::class, 'delete'])->name('slider.delete');
    Route::get('slider/restore/{slider}',[SliderController::class, 'restore'])->name('slider.restore');
    // Route::get('slider/restore/{trash}',[SliderController::class, 'trash'])->name('slider.trash');
    Route::get('slider/delete/{slider}',[SliderController::class, 'delete'])->name('slider.delete');
    Route::resource('slider',SliderController::class);

    Route::get('topic/trash',[TopicController::class, 'trash'])->name('topic.trash');
    Route::get('topic/status/{topic}',[TopicController::class, 'status'])->name('topic.status');
    // Route::get('topic/delete/{id}',[TopicController::class, 'delete'])->name('topic.delete');
    Route::get('topic/restore/{topic}',[TopicController::class, 'restore'])->name('topic.restore');
    // Route::get('topic/restore/{trash}',[TopicController::class, 'trash'])->name('topic.trash');
    Route::get('topic/delete/{topic}',[TopicController::class, 'delete'])->name('topic.delete');
    Route::resource('topic',TopicController::class);

    Route::get('order/trash',[OrderController::class, 'trash'])->name('order.trash');
    Route::get('order/status/{order}',[OrderController::class, 'status'])->name('order.status');
    // Route::get('order/delete/{id}',[OrderController::class, 'delete'])->name('order.delete');
    Route::get('order/restore/{order}',[OrderController::class, 'restore'])->name('order.restore');
    // Route::get('order/restore/{trash}',[OrderController::class, 'trash'])->name('order.trash');
    Route::get('order/delete/{order}',[OrderController::class, 'delete'])->name('order.delete');
    Route::resource('order',OrderController::class);

    Route::get('post/trash',[PostController::class, 'trash'])->name('post.trash');
    Route::get('post/status/{post}',[PostController::class, 'status'])->name('post.status');
    // Route::get('post/delete/{id}',[PostController::class, 'delete'])->name('post.delete');
    Route::get('post/restore/{post}',[PostController::class, 'restore'])->name('post.restore');
    // Route::get('post/restore/{trash}',[PostController::class, 'trash'])->name('post.trash');
    Route::get('post/delete/{post}',[PostController::class, 'delete'])->name('post.delete');
    Route::resource('post',PostController::class);

    Route::get('user/trash',[UserController::class, 'trash'])->name('user.trash');
    Route::get('user/status/{user}',[UserController::class, 'status'])->name('user.status');
    // Route::get('user/delete/{id}',[UserController::class, 'delete'])->name('user.delete');
    Route::get('user/restore/{user}',[UserController::class, 'restore'])->name('user.restore');
    // Route::get('user/restore/{trash}',[UserController::class, 'trash'])->name('user.trash');
    Route::get('user/delete/{user}',[UserController::class, 'delete'])->name('user.delete');
    Route::resource('user',UserController::class);
});


Route::get('{slug}', [SiteController::class, 'index'])->name('site.slug');
Route::get('/', [SiteController::class, 'index']) ->name('site.index');