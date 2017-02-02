<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*新增加调用模型*/
use App\Models\User;

use Auth;

use Mail;


class UsersController extends Controller
{
    /*中间件过滤用户以及权限管理*/
    public function __construct()
    {
        $this->middleware('auth' , [
           'only'   =>      ['edit' , 'update' ,'destroy']
        ]);
        /*判断是否登录*/
        $this->middleware('guest' , [
            'only'  =>      ['create']
        ]);
    }

    //第一个方法
    public function create()
    {
        return view('users.create');
    }
    //第二个方法 显示用户
    /*修改成显示微薄*/
    public function show($id)
    {
        /*根据Id查找，有错误返回错误*/
        $user = User::findOrFail($id);
        /*增加微博状态*/
        /*倒序排列，每一页显示三十条*/
        $statuses = $user->statuses()->orderBy('created_at' , 'desc')->paginate(10);
        /*增加返回值*/
        /*compact接收多个参数，并一一返回到用户个人页面的视图上*/
        return view('users.show' , compact('user' ,'statuses'));
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
            'password'  =>      $request->password
        ]);

        $this->sendEmailConfirmationTo($user);
        session()->flash('success' , '验证邮件已发送到你的注册邮箱，请注意查收！');
        return redirect('/');


        Auth::login($user);

        session()->flash('success' , '欢迎光临 , 您将在这里开启一段美妙的旅程');
        return redirect()->route('users.show',[$user]);

    }
    /*第四个方法 编辑用户资料*/
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update' , $user);
        return view('users.edit' , compact('user'));
    }
    /*第五个方法 提交更改*/
    public function update($id , Request $request)
    {
        $this->validate($request , [
           'name'           =>      'required|max:50' ,
           'password'       =>      'required|confirmed|min:6',
        ]);

        $user = User::findOrFail($id);
        $this->authorize('update' , $user);

        $data = array_filter([
            'name'          =>      $request->input('name'),
            'password'      =>      $request->input('password'),
        ]);
        $user->update($data);

        session()->flash('success' , '恭喜您！个人资料更新成功！');

        return redirect()->route('users.show' , $id);

    }
    /*第六个方法 管理员*/
    public function index()
    {
        $users  =   User::paginate(15);
        return  view('users.index' , compact('users'));
    }
    /*第七个方法 删除用户*/
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('destroy' , $user);
        $user->delete();
        session()->flash('success','成功删除用户！');
        return  back();
    }

    /*第八个方法 邮件服务*/
    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'sunkeyi2017@gmail.com';
        $name = 'sky';
        $to     =   $user->email;
        $subject = "感谢注册 skylaravel ,请确认您的邮箱";

        Mail::send($view , $data,function ($message) use ($from , $name ,$to ,$subject)
        {
            $message->from($from , $name)->to($to)->subject($subject);
        });
    }

    /*确认邮件*/
    public function confirmEmail($token)
    {
        $user = User::where('activation_token' , $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success' , "恭喜您！激活成功！");
        return redirect()->route('users.show' , [$user]);

    }



}
