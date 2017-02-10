<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;

class MailController extends Controller
{
    public function send()
    {
        $name = 'weibo-sky';
        $flag = Mail::send('emails.test',['name'=>$name],function($message){
            $to = '296675685@qq.com';
            $message ->to($to)->subject('激活邮件！');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }

}
