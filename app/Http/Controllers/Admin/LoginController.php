<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends CommonCotroller
{
    public function login(Request $request)
    {
        $username = $request->input('user_name');
        $password = $request->input('user_pass');
        if($username){
           /* if(strtoupper($input['code'])!=$code){
                return back()->with('msg','验证码错误');
            }*/
            $user =User::first();

            if($user->user_name != $username || $user->user_pass != md5($password)){
                #return back()->with('msg','用户名或密码错误!');
                return Redirect('admin/login')->withErrors(['用户名或密码错误']);
            }
            session(['user'=>$user]);
            return redirect('admin/index');
        }else{
        return view('admin.login');
    }
    }


    public function quit(){
        session(['user'=>null]);
        return redirect('admin/login');
    }
}
