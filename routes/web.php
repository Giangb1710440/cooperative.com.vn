<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListController;

//client
Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('/page-product',[HomeController::class,'page_product'])->name('page_product');

Route::get('/page-detail-product',[HomeController::class,'page_detail_product'])->name('page_detail_product');

Route::get('/page-cart',[HomeController::class,'page_cart'])->name('page_cart');

Route::get('/page-checkout',[HomeController::class,'page_checkout'])->name('page_checkout');


//---------------------------------------SERVER
//trang chu
Route::get('page-admin',[AdminController::class,'index'])->name('admin_home');
//-----them moi
//them loai san pham
Route::get('page-add-caterogy-product',[AdminController::class,'page_add_caterogy_product'])->name('page_add_caterogy_product');
Route::post('post-add-caterogy-product',[AdminController::class,'post_add_caterogy_product'])->name('post_add_caterogy_product');

//them don vi tinh
Route::get('page-add-unit',[AdminController::class,'page_add_unit'])->name('page_add_unit');
Route::post('post-add-unit',[AdminController::class,'post_add_unit'])->name('post_add_unit');

//them san pham
Route::get('page-add-product',[AdminController::class,'page_add_product'])->name('page_add_product');

//them nha cung cap
Route::get('page-add-suppliers',[AdminController::class,'page_add_suppliers'])->name('page_add_suppliers');
Route::post('post-add-suppliers',[AdminController::class,'post_add_suppliers'])->name('post_add_suppliers');
//them loai hoa don
Route::get('page-add-caterogy-invoice',[AdminController::class,'page_add_caterogy_invoice'])->name('page_add_caterogy_invoice');
Route::post('post-add-caterogy-invoice',[AdminController::class,'post_add_caterogy_invoice'])->name('post_add_caterogy_invoice');
//them quyen user
Route::get('page-add-role_access',[AdminController::class,'page_add_role_access'])->name('page_add_role_access');
Route::post('post-add-role-access',[AdminController::class,'post_add_role_access'])->name('post_add_role_access');
//them moi chuc vu
Route::get('page-add-position',[AdminController::class,'page_add_position'])->name('page_add_position');
Route::post('post-add-position',[AdminController::class,'post_add_position'])->name('post_add_position');
//them loai don hang
Route::get('page-add-caterogy-order',[AdminController::class,'page_add_caterogy_order'])->name('page_add_caterogy_order');
Route::post('post-add-caterogy-order',[AdminController::class,'post_add_caterogy_order'])->name('post_add_caterogy_order');
//them kho hang
Route::get('page-add-warehouse',[AdminController::class,'page_add_warehouse'])->name('page_add_warehouse');
Route::post('post-add-warehouse',[AdminController::class,'post_add_warehouse'])->name('post_add_warehouse');

//-------------------------------------LIET KE
Route::get('list-caterogy-product',[ListController::class,'list_caterogy_product'])->name('list_caterogy_product');
Route::get('list-position',[ListController::class,'list_position'])->name('list_position');
Route::get('list-unit',[ListController::class,'list_unit'])->name('list_unit');
Route::get('list-invoice-caterogy',[ListController::class,'list_invoice_caterogy'])->name('list_invoice_caterogy');
Route::get('list-role-access',[ListController::class,'list_role_access'])->name('list_role_access');
Route::get('list-supplier',[ListController::class,'list_supplier'])->name('list_supplier');



//--------------------//AUTH


    //them thanh vien
Route::get('add-user',[LoginController::class,'add_user'])->name('add_user');
    //dang nhap
Route::get('/page-login',[LoginController::class,'login'])->name('login');
Route::post('/post-login',[LoginController::class,'check_login'])->name('post_login');
    //dang ky
Route::get('/page-sign-up',[LoginController::class,'page_sign_up'])->name('page_sign_up');
Route::post('/post-sign-up',[LoginController::class,'check_sign_up'])->name('post_sign_up');
    //logot
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
