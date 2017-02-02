<?php
// 命名空间，php5.3引入
namespace App\Http\Controllers;
//调用类
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Status;
use Auth;

class StaticPagesController extends Controller
{
    //增加三个方法 首页，关于和帮助
    // 第一个方法：主页
    public function home()
    {
        /*增加微薄动态*/
        $feed_items = [];

        if (Auth::check()){
            $feed_items = Auth::user()->feed()->paginate(10);
        }



        return view('static_pages/home' , compact('feed_items'));
    }
    // 第二个方法：帮助页
    public function help()
    {
        return  view('static_pages/help') ;
    }
    // 第三个方法：关于页
    public function about()
    {
        return  view('static_pages/about') ;
    }
}
