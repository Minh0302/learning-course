<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Session;
use Brian2694\Toastr\Facades\Toastr;
session_start();

class LoginController extends Controller
{
    public function login_index(){
        return view('pages.login.signin');
    }
    public function register_index(){
        return view('pages.login.signup');
    }
    public function handle_register(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect('/home');
    }
    public function handle_login(Request $request){
        $data = $request->all();
        $email = $data['email_account'];
        $password = md5($request->password_account);
        $login = Customer::where('customer_email',$email)->where('customer_password',$password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('customer_id',$login->customer_id);
                Session::put('customer_name',$login->customer_name);
                Toastr::success('Đăng nhập thành công!', 'Thành công');
                return Redirect('/home');
            }
        }else{
            Toastr::error('Email hoặc Password không đúng!', 'Thất bại');
            return Redirect('/login');
        }
    }
    public function handle_logout(){
        Session::flush();
        return Redirect('/home');
    }
}
