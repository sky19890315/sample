<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-1-31
 * Time: 下午5:39
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title> @yield('title','Sky Sample') - laravel project </title>
    {{--增加样式--}}
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('layouts._header')
    {{--导航--}}
    <header class="navbar navbar-fixed-top navbar-inverse">
        {{--盒子1--}}
        <div class="container">
            {{--logo sunkeyi--}}
            <a href="/" id="logo">sunkeyi.com.cn</a>
            {{--导航模块--}}
            <nav>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/help">帮助</a></li>
                    <li><a href="#">登录</a></li>
                </ul>
            </nav>
        </div>
    </header>
    {{--主体内容--}}
    <div class="container">
        @include('shared.messages')
        @yield('content')
        @include('layouts._footer')
    </div>
</body>
</html>
