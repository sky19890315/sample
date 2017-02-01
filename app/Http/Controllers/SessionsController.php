<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//调用
use Auth;

class SessionsController extends Controller
{
    //用户登录
    public function create()
    {
        return view('sessions.create');
    }
    //验证用户
    public function store(Request $request)
    {
        $this->validate($request ,[
            'email'     =>      'required|email|max:255',
            'password'  =>      'required'

        ]);

        $credentials = [
          'email'       =>      $request->email,
          'password'    =>      $request->password,
        ];

        if (Auth::attempt($credentials , $request->has('remember')))
        {
//            登录成功
            session()->flash('success' , '欢迎回来！');
            return redirect()->route('users.show' , [Auth::user()]);
        }else{
//            登录失败
            session()->flash('danger' , '很抱歉，您的邮箱或密码错误, 请重试！');
            return redirect()->back();
        }
    }
//    退出登录
    public function destroy()
    {
        Auth::logout();
        session()->flash('success' , '您已成功退出！');
        return redirect('login');
    }

}
