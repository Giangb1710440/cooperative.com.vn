<?php

namespace App\Http\Controllers;

use App\Models\invoice_caterogy;
use App\Models\order_caterogy;
use App\Models\position;
use App\Models\product_caterogy;
use App\Models\role_access;
use App\Models\supplier;
use App\Models\unit;
use App\Models\warehouse;
use Illuminate\Http\Request;
use Session;
class AdminController extends Controller
{
    public function index(){
        return view('server.page_index');
    }

    //them moi loai san pham
    public function page_add_caterogy_product(){
        return view('server.page_add_caterogy_product');
    }
    public function post_add_caterogy_product(Request $res){
        $pcate = new product_caterogy();
        $pcate->name_cate_product=$res->input('name_caterogy_product');
        $pcate->description_cate_product=$res->input('description_caterogy_product');
        $pcate->save();
        $register_success = Session::get('add_caterogy_product_success');
        Session()->put('add_caterogy_product_success');
        return redirect()->back()->with('add_caterogy_product_success', 'Thêm thành công');
    }

    //them moi don vi
    public function page_add_unit(){
        return view('server.page_add_unit');
    }

    public function post_add_unit(Request $res){
        $unit =new unit();
        $unit->name_unit = $res->input('name_unit');
        $unit->description_unit = $res->input('description_unit');
        $unit->save();
        $register_success = Session::get('add_unit_success');
        Session()->put('add_unit_success');
        return redirect()->back()->with('add_unit_success', 'Thêm thành công');
    }

    //them nha cung cap
    public function page_add_suppliers(){
        return view('server.page_add_suppliers');
    }

    public function post_add_suppliers(Request $res){
            $supplier = new supplier();
            $supplier->name_supplier=$res->input('name_supplier');
            $supplier->phone_supplier=$res->input('phone_supplier');
            $supplier->email_supplier=$res->input('email_supplier');
            $supplier->address_supplier=$res->input('address_supplier');
            $supplier->save();
            $register_success = Session::get('add_supplier_success');
            Session()->put('add_supplier_success');
            return redirect()->back()->with('add_supplier_success', 'Thêm thành công');
    }
    //them loai hoa don
    public function page_add_caterogy_invoice(){
        return view('server.page_add_caterogy_invoice');
    }
    public function post_add_caterogy_invoice(Request $res){
        $cate_invoice = new invoice_caterogy();
        $cate_invoice->name_cate_invoice=$res->input('name_caterogy_invoice');
        $cate_invoice->description_cate_invoice=$res->input('description_caterogy_invoice');
        $cate_invoice->save();
        $register_success = Session::get('add_cate_invoice_success');
        Session()->put('add_cate_invoice_success');
        return redirect()->back()->with('add_cate_invoice_success', 'Thêm thành công');
    }

    //them quyen user
    public function page_add_role_access(){
        return view('server.page_add_role_access');
    }
    public function post_add_role_access(Request $res){
        $role_access = new role_access();
        $role_access->role_name=$res->input('name_role');
        $role_access->role_description=$res->input('description_role');
        $role_access->save();
        $register_success = Session::get('add_role_access_success');
        Session()->put('add_role_access_success');
        return redirect()->back()->with('add_role_access_success', 'Thêm thành công');
    }

    //them chuc vu
    public function page_add_position(){
        return view('server.page_add_position');
    }
    public function post_add_position(Request $res){
        $position = new position();
        $position->name_position=$res->input('name_position');
        $position->description_position=$res->input('description_position');
        $position->save();
        $register_success = Session::get('add_position_success');
        Session()->put('add_position_success');
        return redirect()->back()->with('add_position_success', 'Thêm thành công');
    }

    //them loai don hang
    public function page_add_caterogy_order(){
        return view('server.page_add_caterogy_order');
    }
    public function post_add_caterogy_order(Request $res){
        $cate_order = new order_caterogy();
        $cate_order->name_cate_order=$res->input('name_caterogy_order');
        $cate_order->description_cate_order=$res->input('description_caterogy_order');
        $cate_order->save();
        $register_success = Session::get('add_cate_order_success');
        Session()->put('add_cate_order_success');
        return redirect()->back()->with('add_cate_order_success', 'Thêm thành công');
    }

    //them kho hang
    public function page_add_warehouse(){
        return view('server.page_add_warehouse');
    }
    public function post_add_warehouse(Request $res){
        $warehouse = new warehouse();
        $warehouse->address_warehouse=$res->input('address_warehouse');
        $warehouse->image_warehouse=$res->input('images_warehouse');
        $warehouse->description_warehouse=$res->input('description_warehouse');
        $warehouse->save();
        $register_success = Session::get('add_warehouse_success');
        Session()->put('add_warehouse_success');
        return redirect()->back()->with('add_warehouse_success', 'Thêm thành công');
    }
}
