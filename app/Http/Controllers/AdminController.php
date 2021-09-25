<?php

namespace App\Http\Controllers;

use App\Models\detail_warehouse;
use App\Models\invoice_caterogy;
use App\Models\order_caterogy;
use App\Models\position;
use App\Models\product;
use App\Models\product_caterogy;
use App\Models\role_access;
use App\Models\supplier;
use App\Models\unit;
use App\Models\warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    public function index(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_index');
            }
        }else{
            return redirect()->route('login');
        }
    }

    //them moi loai san pham
    public function page_add_caterogy_product(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_caterogy_product');
            }
        }else{
            return redirect()->route('login');
        }

    }
    public function post_add_caterogy_product(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $pcate = new product_caterogy();
                $pcate->name_cate_product=$res->input('name_caterogy_product');
                $pcate->description_cate_product=$res->input('description_caterogy_product');
                $pcate->save();
                $register_success = Session::get('add_caterogy_product_success');
                Session()->put('add_caterogy_product_success');
                return redirect()->back()->with('add_caterogy_product_success', 'Thêm thành công');
            }
        }else{
            return redirect()->route('login');
        }

    }

    //them moi don vi
    public function page_add_unit(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_unit');
            }
        }else{
            return redirect()->route('login');
        }

    }

    public function post_add_unit(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $unit =new unit();
                $unit->name_unit = $res->input('name_unit');
                $unit->description_unit = $res->input('description_unit');
                $unit->save();
                $register_success = Session::get('add_unit_success');
                Session()->put('add_unit_success');
                return redirect()->back()->with('add_unit_success', 'Thêm thành công');
            }
        }else{
            return redirect()->route('login');
        }

    }

    //them nha cung cap
    public function page_add_suppliers(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_suppliers');
            }
        }else{
            return redirect()->route('login');
        }

    }

    public function post_add_suppliers(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
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
        }else{
            return redirect()->route('login');
        }
    }
    //them loai hoa don
    public function page_add_caterogy_invoice(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_caterogy_invoice');
            }
        }else{
            return redirect()->route('login');
        }

    }
    public function post_add_caterogy_invoice(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $cate_invoice = new invoice_caterogy();
                $cate_invoice->name_cate_invoice=$res->input('name_caterogy_invoice');
                $cate_invoice->description_cate_invoice=$res->input('description_caterogy_invoice');
                $cate_invoice->save();
                $register_success = Session::get('add_cate_invoice_success');
                Session()->put('add_cate_invoice_success');
                return redirect()->back()->with('add_cate_invoice_success', 'Thêm thành công');
            }
        }else{
            return redirect()->route('login');
        }

    }

    //them quyen user
    public function page_add_role_access(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_role_access');
            }
        }else{
            return redirect()->route('login');
        }

    }
    public function post_add_role_access(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $role_access = new role_access();
                $role_access->role_name=$res->input('name_role');
                $role_access->role_description=$res->input('description_role');
                $role_access->save();
                $register_success = Session::get('add_role_access_success');
                Session()->put('add_role_access_success');
                return redirect()->back()->with('add_role_access_success', 'Thêm thành công');
            }
        }else{
            return redirect()->route('login');
        }

    }

    //them chuc vu
    public function page_add_position(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_position');
            }
        }else{
            return redirect()->route('login');
        }

    }
    public function post_add_position(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $position = new position();
                $position->name_position=$res->input('name_position');
                $position->description_position=$res->input('description_position');
                $position->save();
                $register_success = Session::get('add_position_success');
                Session()->put('add_position_success');
                return redirect()->back()->with('add_position_success', 'Thêm thành công');
            }
        }else{
            return redirect()->route('login');
        }

    }

    //them loai don hang
    public function page_add_caterogy_order(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_caterogy_order');
            }
        }else{
            return redirect()->route('login');
        }

    }
    public function post_add_caterogy_order(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $cate_order = new order_caterogy();
                $cate_order->name_cate_order=$res->input('name_caterogy_order');
                $cate_order->description_cate_order=$res->input('description_caterogy_order');
                $cate_order->save();
                $register_success = Session::get('add_cate_order_success');
                Session()->put('add_cate_order_success');
                return redirect()->back()->with('add_cate_order_success', 'Thêm thành công');
            }
        }else{
            return redirect()->route('login');
        }

    }

    //them kho hang
    public function page_add_warehouse(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                return view('server.page_add_warehouse');
            }
        }else{
            return redirect()->route('login');
        }

    }
    public function post_add_warehouse(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $warehouse = new warehouse();
                $warehouse->address_warehouse=$res->input('address_warehouse');
                $warehouse->image_warehouse=$res->input('images_warehouse');
                $warehouse->description_warehouse=$res->input('description_warehouse');
                $warehouse->save();
                $register_success = Session::get('add_warehouse_success');
                Session()->put('add_warehouse_success');
                return redirect()->back()->with('add_warehouse_success', 'Thêm thành công');
            }
        }else{
            return redirect()->route('login');
        }

    }

    //them moi san pham
    public function page_add_product(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $cate_product = DB::table('product_caterogys')->get();
                $unit=DB::table('units')->get();
                return view('server.page_add_product')->with([
                    'cate_product'=>$cate_product,
                    'unit'=>$unit
                ]);
            }
        }else{
            return redirect()->route('login');
        }

    }

    public function post_add_product(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                if (product::where('name_product', '=',$res->input('name_product'))->count() > 0) {
                    $register_success = Session::get('no_add_product');
                    Session()->put('no_add_product');
                    return redirect()->back()->with('no_add_product', 'Thêm thành công');
                }else {
                    $product = new product();
                    //image
                    $res->validate([
                        'image' => 'required',
                        'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
                    ]);

                    if ($res->hasfile('image')) {
                        foreach ($res->file('image') as $file) {
                            $name = $file->getClientOriginalName();
                            $file->move(public_path() . '/uploads/', $name);
                            $imgData[] = $name;
                        }
                    }
                    $product->image_product = json_encode($imgData);
                    $product->id_cate_product = $res->input('cate_product');
                    $product->id_unit = $res->input('unit_product');
                    $product->name_product = $res->input('name_product');
                    $product->description_product = $res->input('description_product');
                    $product->status_product = "Mới thêm";
                    $product->cost_price_product = $res->input('cost_price');
                    $product->sale_price_product = $res->input('sale_price');
                    $product->save();
                    $register_success = Session::get('add_product');
                    Session()->put('add_product');
                    return redirect()->back()->with('add_product', 'Thêm thành công');
                }
            }
        }else{
            return redirect()->route('login');
        }
    }

    //khoi tao kho hang
    public function page_add_detail_warehouse(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $product = DB::table('products')->get();
                $warehouse = DB::table('warehouses')->get();
                $unit = DB::table('units')->get();
                Session()->put('qty_tonkho',0);
                return view('server.page_add_detail_warehouse')->with([
                    'product'=>$product,
                    'warehouse'=>$warehouse,
                    'unit'=>$unit

                ]);
            }
        }else{
            return redirect()->route('login');
        }

    }

    public function  post_detail_warehouse(Request $res){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                if (detail_warehouse::where('id_product', '=',$res->input('id_product'))->count() > 0) {
                    $register_success = Session::get('no_add_detail_warehouse');
                    Session()->put('no_add_detail_warehouse');
                    return redirect()->back()->with('no_add_detail_warehouse', 'Không thành công');
                }else{
                    $detail_warehouse = new detail_warehouse();
                    $detail_warehouse-> id_product  = $res->input('id_product');
                    $detail_warehouse-> id_warehouse  = $res->input('warehouse_product');
                    $detail_warehouse-> qty_opening_stock = $res->input('qty_khoi_tao');
                    $detail_warehouse-> qty_import_warehouse = 0;
                    $detail_warehouse-> qty_export_warehouse = 0;
                    $detail_warehouse-> inventory_warehouse = $res->input('qty_ton_kho');
                    $detail_warehouse->save();
                    $register_success = Session::get('success_add_detail_warehouse');
                    Session()->put('success_add_detail_warehouse');
                    return redirect()->back()->with('success_add_detail_warehouse', 'Thêm thành công');
                }
            }
        }else{
            return redirect()->route('login');
        }

    }


    public function getUpdateUnit(Request $request){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $request->session()->forget('id_product_warehouse');
                $unit = product::find($request->quantity);

                if($request->id and $request->quantity){
                    Session()->put('id_product_warehouse',$unit);
                }
            }
        }else{
            return redirect()->route('login');
        }
    }


}
