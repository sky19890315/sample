<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*新增加调用模型*/
use App\Models\User;

use Auth;


class UsersController extends Controller
{
    //第一个方法
    public function create()
    {
        return view('users.create');
    }
    //第二个方法 显示用户
    public function show($id)
    {
        /*根据Id查找，有错误返回错误*/
        $user = User::findOrFail($id);
        return view('users.show' , compact('user'));
    }
    /*第三个方法 保存用户表单提交信息*/
    public function store( Request $request )
    {
        $this->validate($request,[
            'name'      =>  'required|max:50',
            'email'     =>  'required|email|unique:users|max:255',
            'password'  =>  'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name'      =>      $request->name,
            'email'     =>      $request->email,
            'password'  =>      $request->password,
        ]);

        Auth::login($user);

        session()->flash('success' , '欢迎光临 , 您将在这里开启一段美妙的旅程');
        return redirect()->route('users.show',[$user]);

    }
}
