<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
    //trang dang ky
    public function page_sign_up(){
        return view('auth.page_signup');
    }
    //kiem tra dang ky

    public function check_sign_up(Request $res)
    {
        $password = $res->input('password');
        $confirm = $res->input('confirm');

        if (User::where('email', '=', $res->input('email'))->count() > 0) {
            return redirect()->back()->with('error_email', 'trung email');
        }
        if (strcasecmp($password, $confirm) != 0) {
            $register_success = Session::get('noconfirm');
            Session::put('noconfirm');
            return redirect()->back()->with('noconfirm', 'Xác nhận mật khẩu sai');
        } else {
            //image
            $user = new User;
            $user->role_id = 3;
            $user->id_position = 1;
            $user->name_user = $res->input('name');
            $user->email = $res->input('email');
            $user->password = bcrypt($res->input('password'));
            $user->address_user = $res->input('address');
            $user->phone_user = $res->input('phone');
            $user->sex_user = $res->input('sex');
            $user->birthday_user = $res->input('birthday');
            $user->image_user=$res->input('image');
            $user->save();
            $register_success = Session::get('signup_success');
            Session::put('signup_success');
            return redirect()->route('login')->with('signup_success', 'Đăng ký tài khoản thành công');
        }
    }

        // kiem tra mat khau co trung khong

    //trang dang nhap
    public function login(){
        return view('auth.login');
    }

    //kiem tra dang nhap
    public function check_login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password,'role_id'=>1||2])){
            $register_success = Session::get('login_success');
            Session()->put('login_success');
            return redirect()->route('admin_home')->with('login_success','thanh cong');
        }elseif (Auth::attempt(['email' => $email, 'password' => $password,'role_id'=>3])){
            $register_success = Session::get('register_success');
            Session()->put('register_success');
            return redirect()->route('home')->with('register_success','thanh cong');
        } else{
            $register_success = Session::get('no_login_success');
            Session()->put('no_login_success');
            return redirect()->back()->with('no_login_success', 'Email hoặc mật khẩu của bạn không đúng!');
        }

    }
//dang xuất
    public function logout(Request $request){
        if (Auth::check()){
            if (Auth::user()->role_id == 1 or Auth::user()->role_id == 2){
                Auth::logout();
                Session::forget('cart');
                return redirect()->route('login');
            }else{
                Auth::logout();
                Session::forget('cart');
                return redirect()->back();
            }
        }else{
            Auth::logout();
            Session::forget('cart');
            return redirect()->route('home');
        }
    }
    //them thanh vien
    public function add_user(){
        return view('server.page_add_user');
    }

    function index()
    {
        return view('welcome');
    }

    function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = User::select('name')
            ->where('name', 'LIKE', '%'.$query.'%')
            ->get();

        return response()->json($filter_data);
    }

    public function profile_user_admin($id){
        if (Auth::check()){
            if(Auth::user()->role_id !== 1){
                return redirect()->route('home');
            }else{
                $role= DB::table('role_accesss')->get();
                $user = DB::table('users')->where('id','=',$id)->get();
                $order = DB::table('orders')->where('id_user','=',$id)->get();
                return view('auth.page_user_admin')->with([
                    'role'=>$role,
                    'user'=>$user,
                    'order'=>$order
                ]);
            }
        }else{
            return redirect()->route('login');
        }
    }
    public function post_edit_profile($id, Request $request){
        $user = User::find($id);
        $old_password = $user->password;
        if($request->input('new_password')){
            if ($request->input('password')){
                if (password_verify($request->input('password'),$old_password)){
                    if($request->input('new_password') == $request->input('confifm_password')){
                        $user->password = bcrypt($request->input('confifm_password'));
                    }else{
                        Session()->put('no_confirm_pass');
                        return redirect()->back()->with('no_confirm_pass', 'xac nhan mk sai');
                    }
                }else{
                    Session()->put('no_confirm_old');
                    return redirect()->back()->with('no_confirm_old', 'xac nhan mk cu sai');
                }
            }else{
                    Session()->put('no_old_passwd');
                    return redirect()->back()->with('no_old_passwd', ' chua nhap mk cu');
            }
        }

        if ($request->input('image_account')){
            $user->image_user = $request ->input('image_account');
        }
        $user->name_user = $request->input('name_user');
        $user->address_user = $request->input('address_user');
        $user->phone_user = $request->input('phone_user');
        $user->sex_user = $request->input('sex_user');
        $user->birthday_user = $request->input('birthday_user');
        $user->save();
        $register_success = Session::get('update_profile_success');
        Session::put('update_profile_success');
        return redirect()->back()->with('update_profile_success', 'success');

    }

    public function  page_profile_client($id){
        if (Auth::check()){
            if ($id == Auth::user()->id){
                Session::forget('home');
                $user = DB::table('users')->where('id','=',Auth::user()->id)->get();
                $role =DB::table('role_accesss')->get();
                $order = DB::table('orders')->where('id_user','=',$id)->get();
                return view('client.page_profile_client')->with([
                    'user' => $user,
                    'role'=> $role,
                    'order'=>$order
                ]);
            }else{
                return redirect()->route('login')->with('update_profile_success', 'success');
            }
        }else{
            return redirect()->route('login')->with('update_profile_success', 'success');
        }
    }
}
