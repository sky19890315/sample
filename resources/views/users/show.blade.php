<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-1
 * Time: 上午9:36
 */
?>
@extends('layouts.default')
@section('title' , $user->name)
@section('content')
    {{--增加div--}}
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="col-md-12">
                <div class="col-md-offset-2 col-md-8">
                    <section class="user_info">
                        @include('shared.user_info' , ['user' => $user])
                    </section>
                </div>
            </div>
            {{--新增微博系统--}}
            <div class="col-md-12">
                {{--增加关注视图--}}
                @if(Auth::check())
                    @include('users._follow_form')
                @endif

                @if(count($statuses) >0)
                    <ol class="statuses">
                        @foreach( $statuses as $status )
                            @include('statuses._status')
                        @endforeach
                    </ol>
                    {{--分页--}}
                    {!! $statuses->render() !!}
                @endif
            </div>
        </div>
    </div>
@stop
