<?php

namespace App\Http\Controllers;
use App\Models\giohang;
use App\Models\order;
use App\Models\order_detail;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
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

    public function page_contact(){
        Session::forget('home');
        return view('client.page_contact');
    }
    public function page_discount(){
        Session::forget('home');
        $product = DB::table('products')->where('sale','!=',0)->get();
        return view('client.page_discount')->with([
            'product'=>$product
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

//    Chuc nang gio hang
    public function addCard($id, Request $request){
        if (Auth::check()){
            $product = product::find($id);
            $oldCart = Session('cart')?Session::get('cart'):null; // neu co session cart thi lay cart, không thi null
            $qty_p=$request->input('qty_product');
            $cart = new giohang($oldCart);
            $cart->add($product, $id, $qty_p);
            $request->session()->put('cart', $cart);
            session()->put('add_cart_success');
            return redirect()->back()->with(
                'add_cart_success',
                'Đã thêm vào giỏ hàng'
            );
        }else{
            $register_success = Session::get('error_login');
            Session::put('error_login');
            return redirect()->back()->with('error_login', 'Hãy đăng nhập');
        }
    }
    //    Chuc nang gio hang
    public function addCard_qty($id){
        if (Auth::check()){
            $product = product::find($id);
            $oldCart = Session('cart')?Session::get('cart'):null; // neu co session cart thi lay cart, không thi null
            $cart = new giohang($oldCart);
            $cart->add($product, $id,1);
            session()->put('cart', $cart);
            session()->put('add_cart_success');
            return redirect()->back()->with(
                'add_cart_success',
                'Đã thêm vào giỏ hàng'
            );
        }else{
            $register_success = Session::get('error_login');
            Session::put('error_login');
            return redirect()->back()->with('error_login', 'Hãy đăng nhập');
        }
    }

    public function updateCart(Request $request){
        if($request->id and $request->quantity){
            $oldCart = Session::has('cart')?Session::get('cart'):null;
            $cart = new giohang($oldCart);
            $cart->update_cart($request->id,$request->quantity);
            session()->put('cart', $cart);
        }
    }

    public function getDeleteCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new giohang($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        $delete_cart = Session::get('delete_cart');
        Session::put('delete_cart');

        return redirect()->back()->with('delete_cart', 'Đã xóa sản phẩm ra khỏi giỏ hàng');
    }

    public function page_checkout(){
        Session::forget('home');
        return view('client.page_checkout');
    }

    public function post_checkout(Request $request){
        $cart = Session::get('cart');
        if(count($cart->items)==0){
            Session::put('order_Nsuccess');
            return redirect()->back()->with('order_Nsuccess','Giỏ hàng rỗng!');
        }else {
            $order = new order();
            $order->id_user  = $request->input('user_id');
            //hoa don ban hang
            $order->id_cate_order  = 1;
            // 1 la cho duyet 2 la da duyet
            $order->status_order = 0;
            $order->discount_order = 0;
            $order->total_price_order = $request->input('total_order');
            $order->note_order = $request->input('ghichu');
            $order->save();

            foreach ($cart->items as $key => $value) {
                $orderDetail = new order_detail();
                $orderDetail->id_order = $order->id;
                $orderDetail->id_product  = $key;
                $orderDetail->quality_order = $value['qty'];
                $orderDetail->unit_price_order = $value['price'];
                $orderDetail->discount_order_detail = 0;
                $orderDetail->save();
            }
            Session::forget('cart');
            $order_success = Session::get('order_success');
            Session::put('order_success');
            return redirect()->route('home')->with('order_success', 'Đặt hàng thành công');
        }
    }

    public function page_cate_product(){
        return view('client.page_cate_product');
    }
}
