<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-2
 * Time: 下午1:00
 */
?>
@include('shared.errors')


<form action="{{ route('statuses.store') }}" method="post">
    {{--防跨站注入--}}
    {!! csrf_field() !!}

    <textarea  class="form-control" rows="3" placeholder="聊点新鲜事吧..."  name="content">
        {{ old('content') }}
    </textarea>
    <button type="submit" class="btn btn-primary pull-right">点击发布</button>
</form>
