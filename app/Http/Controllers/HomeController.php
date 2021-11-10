<?php

namespace App\Http\Controllers;
use App\Models\detail_warehouse;
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

    protected function page_news(){
        Session::forget('home');
        return view('client.page_blog');
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
        $wareHouse = DB::table('detail_warehouses')->where('id_product','=',$id)->get();
        return view('client.page_detail_product')->with([
            'product_detail'=>$product_detail,
            'wareHouse'=>$wareHouse
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
            $wareHouse_product = DB::table('detail_warehouses')->where('id_product','=',$id)->get();
            $product = product::find($id);
            $oldCart = Session('cart') ? Session::get('cart') : null; // neu co session cart thi lay cart, không thi null
            $qty_p=$request->input('qty_product');
            //kiem tra neu ton tai
            if ($oldCart){
                if(array_key_exists($id, $oldCart->items)){
                    $temp_qty=$oldCart->items[$id]['qty'] + $qty_p;
                }else{
                    $temp_qty = $qty_p;
                }
            }else{
                $temp_qty=$qty_p;
            }

            foreach ($wareHouse_product as $wareHouse_products){
                //lay ra so luong ton cua san pham
                $qty_input = $wareHouse_products->inventory_warehouse;
            }
            if ($temp_qty > $qty_input){
                Session::put('non_qty');
                return redirect()->back()->with(
                    'non_qty',
                    'So luong khong hop le'
                );
            }
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
            $wareHouse_product = DB::table('detail_warehouses')->where('id_product','=',$id)->get();
            $product = product::find($id);
            $oldCart = Session('cart') ? Session::get('cart') : null; // neu co session cart thi lay cart, không thi null

            if ($oldCart){
                if(array_key_exists($id, $oldCart->items)){
                    $temp_qty=$oldCart->items[$id]['qty']+1;
                }else{
                    $temp_qty = 1;
                }
            }else{
                $temp_qty=1;
            }

            foreach ($wareHouse_product as $wareHouse_products){
                //lay ra so luong ton cua san pham
                $qty_input = $wareHouse_products->inventory_warehouse;
            }

            if ($temp_qty > $qty_input){
                Session::put('non_qty');
                return redirect()->back()->with(
                    'non_qty',
                    'So luong khong hop le'
                );
            }
            $cart = new giohang($oldCart);
            $cart->add($product, $id, 1);
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
            $qty_product = $request->quantity;
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
        if (Auth::check()){
            if(count($cart->items)==0){
                Session::put('order_Nsuccess');
                return redirect()->back()->with('order_Nsuccess','Giỏ hàng rỗng!');
            }else {
                if ($request->input('bank_code') == "0"){
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
                        $checkOutWarehouse = DB::table('detail_warehouses')->where('id_product','=',$key)->get();
                        foreach ($checkOutWarehouse as $checkOutWarehouses){
                            $id_ware = $checkOutWarehouses->id;
                        }
                        $warehouse_update = detail_warehouse::find($id_ware);
                        $warehouse_update -> qty_export_warehouse += $value['qty'];
                        $warehouse_update -> inventory_warehouse -= $value['qty'];
                        $warehouse_update->save();
                        $orderDetail = new order_detail();
                        $orderDetail->id_order = $order->id;
                        $orderDetail->id_product  = $key;
                        $orderDetail->quality_order = $value['qty'];
                        $orderDetail->unit_price_order = $value['item']['sale_price_product']*((100-$value['item']['sale'])/100);
                        $orderDetail->discount_order_detail = $value['discount'];
                        $orderDetail->save();

                    }
                    Session::forget('cart');
                    $order_success = Session::get('order_success');
                    Session::put('order_success');
                    return redirect()->route('home')->with('order_success', 'Đặt hàng thành công');
                }else{
                    $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY
                    $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/cooperative.com.vn/return-vnpay";
                    $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = $request->input('note_vnpay');//noi dung thanh toan
                    $vnp_OrderType = 200000; //ma loai san pham thanh toan
                    $vnp_Amount =  $request->input('total_order_vnpay')* 100;

                    $vnp_BankCode = $request->input('bank_code');
                    $vnp_Locale = 'vn';
                    $vnp_IpAddr = request()->ip();

                    $inputData = array(
                        "vnp_Version" => "2.0.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . $key . "=" . $value;
                        } else {
                            $hashdata .= $key . "=" . $value;
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url."?".$query;
                    if (isset($vnp_HashSecret)) {
                        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                    }
                    Session::put('total_vnpay',$request->input('total_order_vnpay'));
                    return redirect($vnp_Url);
                }
            }
        }else{
            Session::put('error_login');
            return redirect()->back()->with('error_login','hay dang nhap!');
        }
    }

    public function page_cate_product(){
        return view('client.page_cate_product');
    }

//trang tim kiem
    public function searchProduct(Request $request){
        $keyWord = $request->input('search_product');
        $product = DB::table('products')->where('name_product', 'LIKE', '%'.$keyWord.'%')->paginate(8);
        $count = DB::table('products')->where('name_product', 'LIKE', '%'.$keyWord.'%')->count();
        return view('client.page_search')->with([
            'product' => $product,
            'count' => $count,
            'keyWord'=>$keyWord
        ]);
    }
}
