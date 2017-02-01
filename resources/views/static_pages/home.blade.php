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
        <div class="jumbotron">
          <h1> Hello Sky Laravel</h1>
                <p class="lead">
                        欢迎前往<a href="http://sunkeyi.com.cn">风雪夜归人-我的个人博客</a>
                </p>
                <p>
                        一个专注于学习和进步的网站。
                </p>
                <p>
                        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">点击注册</a>
                </p>
        </div>

@stop
