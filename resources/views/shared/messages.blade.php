<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-1
 * Time: 上午11:30
 */
?>
@foreach(['danger' , 'warning' , 'success' , 'info' ,'status'] as $msg)
    @if(session()->has($msg))
        <div class="flash-message">
            <p class="alert alert-{{ $msg }}">
                {{ session()->get($msg) }}
            </p>
        </div>
    @endif
@endforeach