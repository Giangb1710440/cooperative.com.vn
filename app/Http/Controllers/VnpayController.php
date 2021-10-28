<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

class VnpayController extends Controller
{
    public function create_vnpay(Request $request)
    {
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/hongshop/return-page-vnpay-checkout";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->input('order_desc');//noi dung thanh toan
        $vnp_OrderType = 200000; //ma loai san pham thanh toan
        $vnp_Amount = $request->input('amount') * 100;

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
        if($request->input('id_user') == -1){

            Session()->put('isset_id_user',-1);
            Session()->put('fullname_c',$request->input('txt_billing_fullname'));
            Session()->put('sdt_c',$request->input('txt_billing_mobile'));
            Session()->put('email_c',$request->input('txt_billing_email'));
            Session()->put('address_c',$request->input('txt_billing_addr1'));
        }else{
            Session()->put('isset_id_user',Auth::user()->id);

        }

        return redirect($vnp_Url);
    }

    public function return_vnpay(Request $request)
    {
        $cart = Session()->get('cart');
        $currentDate = Carbon::now();
        $requiredDate = $currentDate->addDays(6);
//        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            $order = new order();
            $order->id_user  = Auth::user()->id;
            //hoa don ban hang
            $order->id_cate_order  = 1;
            // 1 la cho duyet 2 la da duyet
            $order->status_order = 0;
            $order->status_checkout = 1;
            $order->discount_order = 0;
            $order->total_price_order = $request->input('vnp_Amount')/100;
            $order->note_order = "DATHANHTOANVNPAY";
            $order->save();

            foreach ($cart->items as $key => $value) {
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
        }
        return redirect()->route('checkout')->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');

    }
}
