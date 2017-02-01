<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-1
 * Time: 下午11:37
 */
?>
@extends('layouts.default')
@section('title' , '重置密码')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">重置密码</div>

                    <div class="panel-body">

                    @include('shared.errors')

                    <form method="post" action="{{ route('password.update') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <div class="col-md-4 control-label">邮箱地址：</div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 control-label">密码：</div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 control-label">重置密码：</div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">重置密码</button>
                            </div>
                        </div>
                     </form>

                           </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

