<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-8
 * Time: 下午7:16
 */
?>
{{--20170211注册页面改用默认注册--}}
@extends('layouts.default')
@section('title' , '用户注册')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>注册</h5>
            </div>

            <div class="panel-body">
                {{--引用错误页面--}}
                @include('shared.errors')


                <form method="post" action="/auth/register">
                    {{--增加token防止收到CSRF跨站请求伪造攻击--}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">姓名：</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input type="password" name="password_confirmation" class="form-control" >
                    </div>

                    <button type="submit" class="btn btn-primary">点击注册</button>
                </form>
            </div>
        </div>
    </div>

@stop