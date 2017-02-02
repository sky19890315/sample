<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    //add sky
    public function __construct()
    {
        /*中间件*/
        $this->middleware('auth' , [
            'only'  => ['store', 'destroy']
        ]);
    }
    /*增加微薄限制*/
    public function store(Request $request)
    {
        /*验证性*/
        $this->validate($request ,[
            'content'   =>  'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content'   =>  $request->content
        ]);
        return redirect()->back();
    }
    /*删除博客*/
    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $this->authorize('destroy' ,$status);
        $status->delete();
        session()->flash('success' , '微薄已成功删除！');
        return redirect()->back();
    }
}














