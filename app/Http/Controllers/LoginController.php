<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Session;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Social; //sử dụng model Social
use Socialite;
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
                Session::put('id',$login->id);
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
    public function login_google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
            $account_name = Customer::where('id',$authUser->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('id',$account_name->id);
        }elseif($login_gg){
            $account_name = Customer::where('id',$authUser->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('id',$account_name->id);
        }
        Toastr::success('Đăng nhập thành công!', 'Thành công');
        return redirect('/');


    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $login_gg = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
            ]);

            $orang = Customer::where('customer_email',$users->email)->first();

            if(!$orang){
                $orang = Customer::create([
                    'customer_name' => $users->name,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
            $login_gg->login()->associate($orang);
            $login_gg->save();
            return $login_gg;
        }
    }
}
