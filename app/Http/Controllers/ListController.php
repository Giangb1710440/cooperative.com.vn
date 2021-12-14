<?php

namespace App\Http\Controllers;

use App\Models\order_caterogy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $user = DB::table('users')->get();
                $position = DB::table('positions')->get();
                return view('server.csdl_server.list_position')->with([
                    'position'=>$position,
                    'user'=>$user
                ]);
            }
        }else{
            return redirect()->route('login');
        }
    }
    //quan ly don hang
    public function list_order(){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $unit = DB::table('units')->get();
                return view('server.csdl_server.list_order')->with([
                    'unit'=>$unit,
                ]);
            }
        }else{
            return redirect()->route('login');
        }
    }
    public function list_unit (){
        $list_unit = DB::table('units')->get();
        return view('server.csdl_server.list_unit')->with([
            'list_unit'=>$list_unit
        ]);
    }
    public function list_invoice_caterogy (){
        $list_order_cate = DB::table('order_caterogys')->get();
        return view('server.csdl_server.list_invoice_caterogy')->with([
            'list_order_cate'=>$list_order_cate
        ]);
    }
        public function list_order_caterogy (){
        $list_order_caterogy = DB::table('order_caterogys')->get();
        return view('server.csdl_server.list_caterogy_order')->with([
            'list_order_caterogy'=>$list_order_caterogy
        ]);
    }
    public function list_role_access (){

        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $list_role_access = DB::table('role_accesss')->get();
                $user = DB::table('users')->get();
                return view('server.csdl_server.list_role_access')->with([
                    'list_role_access'=>$list_role_access,
                    'user'=>$user
                ]);
            }
        }else{
            return redirect()->route('login');
        }
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
        $unit =DB::table('units')->get();
        $cate_product =DB::table('product_caterogys')->get();
        return view('server.csdl_server.list_product')->with([
            'product'=>$product,
            'unit'=>$unit,
            'cate_product'=>$cate_product
        ]);
    }

    public function list_diary(){
        $diary = DB::table('farmer_diarys')->get();
        $product =DB::table('products')->get();
        $technique = DB::table('techniques')->get();
        return view('server.csdl_server.list_diary')->with([
            'diary'=>$diary,
            'product'=>$product,
            'technique'=>$technique
        ]);
    }

    public function detail_diary(Request $res){
        $detail_diary = DB::table('farmer_diarys')->where('id',$res->id)->get();
        foreach ($detail_diary as $detail_diarys){
            $product = DB::table('products')->where('id','=',$detail_diarys->id_product)->get();
            $technique = DB::table('techniques')->where('id','=',$detail_diarys->id_technique)->get();
            $phunthuoc = DB::table('phunthuocs')->where('id_diary','=',$detail_diarys->id)->get();
            $bonphan=DB::table('bonphans')->where('id_diary','=',$detail_diarys->id)->get();
            $thsb=DB::table('tdsbs')->where('id_diary','=',$detail_diarys->id)->get();
            $thuhoach=DB::table('thuhoachs')->where('id_diary','=',$detail_diarys->id)->get();
            break;
        }
        $gdst=DB::table('gdsts')->get();
        $detail_gdst = DB::table('detail_gdsts')->get();
        return view('server.csdl_server.detail_diary')->with([
            'detail_diary'=>$detail_diary,
            'product' => $product,
            'technique'=>$technique,
            'gdst'=>$gdst,
            'detail_gdst'=>$detail_gdst,
            'phunthuoc'=>$phunthuoc,
            'bonphan'=>$bonphan,
            'thsb'=>$thsb,
            'thuhoach'=>$thuhoach
        ]);
    }
}
