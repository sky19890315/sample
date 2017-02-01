<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-1
 * Time: 上午12:12
 */
?>
<header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            <a href="/" id="logo"> Sunkeyi.com.cn</a>
            <nav>
                <ul class="nav navbar-nav navbar-right">
                    {{--增加用户状态--}}

                    @if(Auth::check())
                    <li><a href="{{ route('users.index') }}">用户列表</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           {{ Auth::user()->name }} <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.show' , Auth::user()->id) }}">个人中心</a></li>
                            <li><a href="{{ route('users.edit' , Auth::user()->id) }}">编辑资料</a></li>
                            <li class="divider"></li>
                            <li>
                                <a id="logout" href="#">
                                    <form action="{{ route('logout') }}" method="post">
                                        {{--防跨站攻击--}}
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-block btn-danger" type="submit" name="button">退出登录</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li><a href="{{ route('help') }}">帮助</a></li>
                    <li><a href="{{ route('login') }}">登录</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
