<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-1
 * Time: 下午7:54
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>注册确认链接</title>
    </head>
<body>
    <h1>感谢您在weibo-sky网站进行注册</h1>
    <p>
        <a href="{{ route('confirm_email' , $user->activation_token) }}">
            {{ route('confirm_email' , $user->activation_token) }}
        </a>
    </p>
    <p>
        如果不是您本人的操作，请忽略次邮件。
    </p>
</body>
</html>
