<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function list_caterogy_product(){
        $cate_product = DB::table('product_caterogys')->get();
        return view('server.csdl_server.list_caterogy_product')->with([
            'cate_product'=>$cate_product
        ]);
    }
    public function list_position (){
        $position = DB::table('positions')->get();
        return view('server.csdl_server.list_position')->with([
            'position'=>$position
        ]);
    }
    public function list_unit (){
        $list_unit = DB::table('units')->get();
        return view('server.csdl_server.list_unit')->with([
            'list_unit'=>$list_unit
        ]);
    }
    public function list_invoice_caterogy (){
        $list_invoice_cate = DB::table('invoice_caterogys')->get();
        return view('server.csdl_server.list_invoice_caterogy')->with([
            'list_invoice_cate'=>$list_invoice_cate
        ]);
    }
        public function list_order_caterogy (){
        $list_order_caterogy = DB::table('order_caterogys')->get();
        return view('server.csdl_server.list_caterogy_order')->with([
            'list_order_caterogy'=>$list_order_caterogy
        ]);
    }
    public function list_role_access (){
        $list_role_access = DB::table('role_accesss')->get();
        return view('server.csdl_server.list_role_access')->with([
            'list_role_access'=>$list_role_access
        ]);
    }

    public function list_supplier(){
        $supplier = DB::table('suppliers')->get();
        return view('server.csdl_server.list_supplier')->with([
            'supplier'=>$supplier
        ]);
    }
    public function list_warehouse(){
        $warehouses = DB::table('warehouses')->get();
        return view('server.csdl_server.list_warehouse')->with([
            'warehouses'=>$warehouses
        ]);
    }

    public function list_customer(){
        $customer = DB::table('customers')->get();
        return view('server.csdl_server.list_customer')->with([
            'customer'=>$customer
        ]);
    }
    public function list_user(){
        $user = DB::table('users')->get();
        return view('server.csdl_server.list_user')->with([
            'user'=>$user
        ]);
    }
    public function list_product(){
        $product = DB::table('products')->get();
        return view('server.csdl_server.list_product')->with([
            'product'=>$product
        ]);
    }
}
