<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-8
 * Time: 下午7:18
 */
?>
{{--2017年2月1日对该项目进行改造，采用AUTH认证方式--}}
@extends('layouts.default')
@section('title' , '登录')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>登录</h5>
            </div>

            <div class="panel-body">
                @include('shared.errors')

                <form method="post" action="/auth/login">
                    {{--防止跨站攻击--}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('emails') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码 (<a href="{{ route('password.reset') }}">忘记密码</a> ):</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" name="remember">记住我</label>
                    </div>

                    <button type="submit" class="btn btn-primary">登录</button>

                </form>

                <hr>

                <p>wow！还没有帐号？<a href="/auth/register">赶紧注册一个吧！</a></p>

            </div>

        </div>
    </div>
@stop
