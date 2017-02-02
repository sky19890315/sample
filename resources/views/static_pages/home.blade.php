<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-1-31
 * Time: 下午5:35
 */
?>
@extends('layouts.default')
@section('title','主页')
@section('content')
        {{--第一个盒子--}}

          <h1> Hello ! Welcome to Weibo-sky </h1>
            <center><h4>本站是一个微博网站,无限乐趣，不至于此！</h4></center>
            <hr/>
                <p class="lead">
                        您还可以前往<a href="http://sunkeyi.com.cn">风雪夜归人-我的个人博客</a>
                </p>
                <p>
                        一个专注于学习和进步的网站。
                </p>
                <br/>

            <hr/>
            @if(Auth::check())
                <div class="row">
                    <div class="col-md-8">
                        <section class="status_form">
                            @include('shared.status_form')
                        </section>
                        {{--增加博客列表--}}
                        @include('shared/feed')
                    </div>
                    <aside class="col-md-4">
                        <section class="user_info">
                            @include('shared.user_info' , ['user' => Auth::user()])
                        </section>
                    </aside>
                </div>
            @else
          <div class="jumbotron">
                <p> 您选择以下注册 , 则将注册成为本站会员!</p>
                <p>
                        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">点击注册</a>
                </p>
                <br/>
                <br/>
                <br/>

                <p>本站是一个微博系统 ,欢迎前来体验！</p>
          </div>
    @endif
@stop
