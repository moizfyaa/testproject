<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// Jetstram Controllers

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('home');
});

// Home Page Controller

Route::get('/', [FrontendController::class, 'index'])->name('home');

// Shop Controllers

Route::get('shop', [ShopController::class, 'shop'])->name('shop');
Route::get('shop_detail{id}', [ShopController::class, 'shop_detail'])->name('shop_detail');
Route::get('shopping_cart', [ShopController::class, 'shopping_cart'])->name('shopping_cart');
Route::get('check_out', [ShopController::class, 'check_out'])->name('check_out');

// Add, Update, Remove Cart Item

Route::get('add-to-cart/{id}', [FrontendController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [FrontendController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [FrontendController::class, 'remove'])->name('remove.from.cart');

// Blog Controllers

Route::get('blog', [BlogController::class, 'blog'])->name('blog');
Route::get('blog_detail_page{id}', [BlogController::class, 'blog_detail'])->name('blog_detail_page');

// About Controllers

Route::get('about', [AboutController::class, 'about'])->name('about');

// Contact Controllers

Route::get('contact', [ContactController::class, 'contact'])->name('contact');

// Dashboard  Controller

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Admin Controllers

//   Show, Add, Update, Delete Product In Admin Panel

Route::get('addproductpage', [ShopController::class, 'addproductpage'])->name('addproductpage');
Route::post('addproduct', [ShopController::class, 'addproduct'])->name('addproduct');
Route::get('showproduct', [ShopController::class, 'showproduct'])->name('showproduct');
Route::get('deleteproduct/{id}', [ShopController::class, 'deleteproduct'])->name('deleteproduct');
Route::get('update_product_view{id}', [ShopController::class, 'update_product_view'])->name('update_product_view');
Route::post('updateproduct/{product}', [ShopController::class, 'updateproduct'])->name('updateproduct');

// Show, Add, Update, Delete Blogs

Route::get('addblogpage', [BlogController::class, 'addblogpage'])->name('addblogpage');
Route::post('addnewblog', [BlogController::class, 'addnewblog'])->name('addnewblog');
Route::get('showblog', [BlogController::class, 'showblog'])->name('showblog');
Route::get('/update_blog_view/{id}', [BlogController::class, 'update_page'])->name('update_blog_view');
Route::post('/updateblog/{id}', [BlogController::class, 'updateblog'])->name('updateblog');
Route::get('/deleteblog/{id}', [BlogController::class, 'deleteblog'])->name('deleteblog');

// Show, Add, Update, Delete Team Member

Route::get('addteam', [AboutController::class, 'addteam'])->name('addteam');
Route::post('addnewmember', [AboutController::class, 'addnewmember'])->name('addnewmember');
Route::get('showteam', [AboutController::class, 'showteam'])->name('showteam');
Route::get('update_team_view{id}', [AboutController::class, 'update_team_view'])->name('update_team_view');
Route::post('/updateteam/{id}', [AboutController::class, 'updateteam'])->name('updateteam');
Route::get('/deleteteam/{id}', [AboutController::class, 'deleteteam'])->name('deleteteam');

// Order Place

Route::get('placeorder', [FrontendController::class, 'placeorder'])->name('placeorder');

// 404 Page Route

Route::any('/{page?}', function () {
    return View::make('errors.404');
})->where('page', '.*');
