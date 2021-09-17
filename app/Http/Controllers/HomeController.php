<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //trang chu
    public function index(){
        Session::put('home','0');
        return view('client.index')->with('home');
    }

    //trang san pham
    public function page_product(){
        Session::forget('home');
        return view('client.page_product');
    }

    //chi tiet san pham

    public function page_detail_product(){
        Session::forget('home');
        return view('client.page_detail_product');
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
}
