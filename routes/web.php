<?php

use App\Http\Controllers\VnpayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListController;

//client
Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('/page-product/{id}',[HomeController::class,'page_product'])->name('page_product');

Route::get('/page-detail-product/{id}',[HomeController::class,'page_detail_product'])->name('page_detail_product');

Route::get('/page-cart',[HomeController::class,'page_cart'])->name('page_cart');
Route::get('/page-contact',[HomeController::class,'page_contact'])->name('page_contact');
Route::get('/page-discount',[HomeController::class,'page_discount'])->name('page_discount');

Route::get('page-news',[HomeController::class,'page_news'])->name('page_news');

Route::get('/page-cate-product',[HomeController::class,'page_cate_product'])->name('page_cate_product');


Route::get('page-profile-client/{id}',[LoginController::class,'page_profile_client'])->name('page_profile_client');
//them gio hang
Route::get('add-card/{id}',[HomeController::class,'addCard'])->name('addCard');
Route::get('add-card-qty/{id}',[HomeController::class,'addCard_qty'])->name('addCard_qty');
Route::get('update-cart', [HomeController::class,'updateCart'])->name('getUpdateCart');
Route::get('delete-cart/{id}', [HomeController::class,'getDeleteCart'])->name('getDeleteCart');
//thanh toan
Route::get('/page-checkout',[HomeController::class,'page_checkout'])->name('page_checkout');
Route::post('/dat-hang', [HomeController::class,'post_checkout'])->name('post_checkout');

//thanh toan vnpay

//Route::post('page-vnpay-checkout',[VnpayController::class,'create_vnpay'])->name('create_vnpay');
Route::get('return-vnpay',[VnpayController::class,'return_vnpay'])->name('return_checkout_vnpay');
//---------------------------------------SERVER
//trang chu
Route::get('page-admin',[AdminController::class,'index'])->name('admin_home');
//-----them moi
//them loai san pham
Route::get('page-add-caterogy-product',[AdminController::class,'page_add_caterogy_product'])->name('page_add_caterogy_product');
Route::post('post-add-caterogy-product',[AdminController::class,'post_add_caterogy_product'])->name('post_add_caterogy_product');
Route::get('post-delete-caterogy-product/{id}',[AdminController::class,'post_delete_catep'])->name('post_delete_catep');
Route::post('post-edit-caterogy-product/{id}',[AdminController::class,'post_edit_catep'])->name('post_edit_catep');

//them don vi tinh
Route::get('page-add-unit',[AdminController::class,'page_add_unit'])->name('page_add_unit');
Route::post('post-add-unit',[AdminController::class,'post_add_unit'])->name('post_add_unit');
Route::get('post-delete-unit/{id}',[AdminController::class,'post_delete_unit'])->name('post_delete_unit');
Route::post('post-edit-unit/{id}',[AdminController::class,'post_edit_unit'])->name('post_edit_unit');

                                                //them san pham
Route::get('page-add-product',[AdminController::class,'page_add_product'])->name('page_add_product');
Route::post('post-add-product',[AdminController::class,'post_add_product'])->name('post_add_product');
Route::post('post-edit-product/{id}/{cate_edit}',[AdminController::class,'post_edit_product'])->name('post_edit_product');
Route::get('post-delete-product/{id}',[AdminController::class,'post_delete_product'])->name('post_delete_product');

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
Route::post('post-edit-position/{id}',[AdminController::class,'post_edit_position'])->name('post_edit_position');
//them loai don hang
Route::get('page-add-caterogy-order',[AdminController::class,'page_add_caterogy_order'])->name('page_add_caterogy_order');
Route::post('post-add-caterogy-order',[AdminController::class,'post_add_caterogy_order'])->name('post_add_caterogy_order');
Route::get('post-delete-caterogy-order/{id}',[AdminController::class,'post_delete_caterogy_order'])->name('post_delete_caterogy_order');
Route::post('post-edit-caterogy-order/{id}',[AdminController::class,'post_edit_invoice_cate'])->name('post_edit_invoice_cate');

//them kho hang
//Route::get('page-add-warehouse',[AdminController::class,'page_add_warehouse'])->name('page_add_warehouse');
//Route::post('post-add-warehouse',[AdminController::class,'post_add_warehouse'])->name('post_add_warehouse');
//Route::get('post-delete-warehouse/{id}',[AdminController::class,'post_delete_warehouse'])->name('post_delete_warehouse');




//khoi tao kho hang
Route::get('page-add-detail-warehouse',[AdminController::class,'page_add_detail_warehouse'])->name('page_add_detail_warehouse');
Route::post('post_detail_warehouse',[AdminController::class,'post_detail_warehouse'])->name('post_detail_warehouse');

//quan ly kho hang

Route::get('page-list-detail-warehouse',[AdminController::class,'page_list_detail_warehouse'])->name('page_list_detail_warehouse');
//xoa ton kho dua theo id san pham
Route::get('page-delete-warehouse-product/{id}',[AdminController::class,'post_delete_warehouse'])->name('post_delete_warehouse');
//edit ton kho dau theo id san pham
Route::post('page-edit-warehouse-product/{id}',[AdminController::class,'post_edit_warehouse'])->name('post_edit_warehouse');
// cap nhat trong trang warehouse
Route::get('update-unit', [AdminController::class,'getUpdateUnit'])->name('getUpdateUnit');


//---------------------------DIARY
//them moi ky thuat canh tac
Route::get('page-add-technique',[AdminController::class,'page_add_technique'])->name('page_add_technique');
Route::post('post-add-technique',[AdminController::class,'post_add_technique'])->name('post_add_technique');
Route::get('post-delete-technique/{id}',[AdminController::class,'post_delete_technique'])->name('post_delete_technique');
Route::post('post-edit-technique/{id}',[AdminController::class,'post_edit_technique'])->name('post_edit_technique');

//them  giai doan san xuat
Route::get('page-add-gdst',[AdminController::class,'page_add_gdst'])->name('page_add_gdst');
Route::post('post_add-gdst',[AdminController::class,'post_add_gdst'])->name('post_add_gdst');
Route::get('post-delete-gdst/{id}',[AdminController::class,'post_delete_gdst'])->name('post_delete_gdst');
Route::post('post-edit-gdst-csdl/{id}',[AdminController::class,'post_edit_edit_csdl'])->name('post_edit_edit_csdl');

//them moi diary
Route::get('page-add-diary',[AdminController::class,'page_add_diary'])->name('page_add_diary');
Route::post('page-add-diary',[AdminController::class,'post_add_diary'])->name('post_add_diary');
//danh sach diary
Route::get('list-diary',[ListController::class,'list_diary'])->name('list_diary');
//them moi giai doan sinh truong

Route::post('post-gdst/{id}',[AdminController::class,'post_gdst'])->name('post_gdst');
Route::post('post-bp/{id}',[AdminController::class,'post_bonphan'])->name('post_bonphan');
Route::post('post-pt/{id}',[AdminController::class,'post_phunthuoc'])->name('post_phunthuoc');
Route::post('post-thsb/{id}',[AdminController::class,'post_thsb'])->name('post_thsb');
Route::post('post-thu-hoach/{id}',[AdminController::class,'post_thuhoach'])->name('post_thuhoach');

//edit nhat ky nong ho
Route::post('post-edit-gdst/{id}',[AdminController::class,'post_edit_gdsts'])->name('post_edit_gdsts');
Route::post('post-edit-bp/{id}',[AdminController::class,'post_edit_bonphan'])->name('post_edit_bonphan');
Route::post('post-edit-pt/{id}',[AdminController::class,'post_edit_phunthuoc'])->name('post_edit_phunthuoc');
Route::post('post-edit-thsb/{id}',[AdminController::class,'post_edit_thsb'])->name('post_edit_thsb');
Route::post('post-edit-th/{id}',[AdminController::class,'post_edit_th'])->name('post_edit_th');

//delete diary farmer

Route::get('page-delete-gdst/{id}',[AdminController::class,'page_delete_gdst'])->name('page_delete_gdst');
Route::get('page-delete-bp/{id}',[AdminController::class,'page_delete_bp'])->name('page_delete_bp');
Route::get('page-delete-pt/{id}',[AdminController::class,'page_delete_pt'])->name('page_delete_pt');
Route::get('page-delete-thsb/{id}',[AdminController::class,'page_delete_thsb'])->name('page_delete_thsb');
Route::get('page-delete-th/{id}',[AdminController::class,'page_delete_th'])->name('page_delete_th');
Route::get('page-delete-diary/{id}',[AdminController::class,'post_delete_diary'])->name('post_delete_diary');

//edit quyen user
Route::post('post-edit-role-user/{id}',[AdminController::class,'post_edit_role_user'])->name('post_edit_role_user');



//-------------------------------------LIET KE
Route::get('list-caterogy-product',[ListController::class,'list_caterogy_product'])->name('list_caterogy_product');
Route::get('list-position',[ListController::class,'list_position'])->name('list_position');
Route::get('list-unit',[ListController::class,'list_unit'])->name('list_unit');
Route::get('list-invoice-caterogy',[ListController::class,'list_invoice_caterogy'])->name('list_invoice_caterogy');
Route::get('list-order-caterogy',[ListController::class,'list_order_caterogy'])->name('list_order_caterogy');
Route::get('list-role-access',[ListController::class,'list_role_access'])->name('list_role_access');
Route::get('list-5',[ListController::class,'list_supplier'])->name('list_supplier');
Route::get('list-warehouse',[ListController::class,'list_warehouse'])->name('list_warehouse');
Route::get('list-customer',[ListController::class,'list_customer'])->name('list_customer');
Route::get('list-user',[ListController::class,'list_user'])->name('list_user');
Route::get('list-product',[ListController::class,'list_product'])->name('list_product');
Route::get('detail-diary/{id}',[ListController::class,'detail_diary'])->name('detail_diary');

//quan ly don hang
Route::get('list-order',[ListController::class,'list_order'])->name('list_order');
Route::get('post-delete-order/{id}',[AdminController::class,'post_delete_order'])->name('post_delete_order');
Route::get('post-edit-status-order/{id}',[AdminController::class,'getUpdate_status_order'])->name('getUpdate_status_order');







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

Route::get('/typeahead_autocomplete', [LoginController::class, 'index']);

Route::get('/typeahead_autocomplete/action', [LoginController::class, 'action'])->name('typeahead_autocomplete.action');

//quan ly nguoi dung
Route::get('profile-user-page-admin/{id}',[LoginController::class,'profile_user_admin'])->name('profile_user_admin');
Route::post('post-edit-profile/{id}',[LoginController::class,'post_edit_profile'])->name('post_edit_profile');
