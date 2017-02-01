<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-1
 * Time: 下午11:14
 */
?>
@extends('layouts.default')
@section('title','重置密码')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">重置密码</div>
                    <div class="panel-body">
                        @include('shared.errors')
                        <form method="post" action="{{ route('password.reset') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-4 control-label">邮箱地址：</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>
{{--第一个表单++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
                            <div class="form-group">
                                <div class=" col-md-6  col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
