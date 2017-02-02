<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-2
 * Time: 下午1:32
 */
?>
@if(count($feed_items) >0)
    <ol class="statuses">
        @foreach($feed_items as $status)
            @include('statuses._status' , ['user' => $status->user])
        @endforeach
        {!! $feed_items->render() !!}
    </ol>
@endif

