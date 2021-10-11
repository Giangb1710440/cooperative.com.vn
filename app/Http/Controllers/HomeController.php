<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //trang chu
    public function index(){
        Session::put('home','0');
        $product_flu = DB::table('products')->where('id_cate_product','=',1)->take(4)->latest()->get();
        $product_slider = DB::table('products')->take(5)->latest()->get();
        $product_ve = DB::table('products')->where('id_cate_product', '=',2)->take(3)->latest()->get();
        return view('client.index')->with([
            'product_slider'=>$product_slider,
            'product_flu'=>$product_flu,
            'product_ve'=>$product_ve,
            'home'
        ]);
    }

    //trang san pham
    public function page_product($id){
        if($id == 0){
            $product = DB::table('products')->get();
            Session::forget('home');
            Session::put('tieude', "Sản phẩm");
            return view('client.page_product')->with([
                'product' =>$product,
                'tieude'
            ]);
        }elseif ($id == 1){
            $product = DB::table('products')->where('id_cate_product','=',1)->get();
            Session::forget('home');
            Session::put('tieude', "Trái cây");
            return view('client.page_product')->with([
                'product' =>$product,
                'tieude'
            ]);
        }elseif ($id == 2){
            $product = DB::table('products')->where('id_cate_product','=',2)->get();
            Session::forget('home');
            Session::put('tieude', "Rau củ");
            return view('client.page_product')->with([
                'product' =>$product,
                'tieude'
            ]);
        }elseif ($id == 3){
            $product = DB::table('products')->where('id_cate_product','=',3)->get();
            Session::forget('home');
            Session::put('tieude', "Gạo");
            return view('client.page_product')->with([
                'product' =>$product,
                'tieude'
            ]);
        }elseif ($id == 4){
            $product = DB::table('products')->where('id_cate_product','=',4)->get();
            Session::forget('home');
            Session::put('tieude', "Thịt cá trứng");
            return view('client.page_product')->with([
                'product' =>$product,
                'tieude'
            ]);
        }

    }

    //chi tiet san pham

    public function page_detail_product($id){
        Session::forget('home');
        $product_detail = DB::table('products')->where('id','=',$id)->get();
        return view('client.page_detail_product')->with([
            'product_detail'=>$product_detail
        ]);
    }

    //trang gio hang
    public  function page_cart(){
        Session::forget('home');
        return view('client.page_cart');
    }

    public function page_checkout(){
        Session::forget('home');
        return view('client.page_checkout');
    }

    public function page_cate_product(){
        return view('client.page_cate_product');
    }
}
