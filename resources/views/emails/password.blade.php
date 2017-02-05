<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-2
 * Time: 上午12:01
 */
?>

<p> 点击下面链接重置密码： </p>

    <a href="{{  route('password.update') .'/'. $token  }}">
        {{ route('password.update' .'/' .$token) }}
    </a>
