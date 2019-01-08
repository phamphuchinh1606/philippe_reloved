<?php
use App\Common\Constant;
$auth = Auth::user();
//$authInfo = Common::userInfo($auth->id);
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img @if($auth->avatar) src="{{\App\Common\ImageCommon::showImage($auth->avatar)}}" @else src="{{asset(Constant::$PATH__DEFAULT__AVATAR)}}" @endif class="img-circle" alt="{{$auth->full_name}} Avatar">
                {{--<img src="{{asset(Utils::$PATH__IMAGE)}}/1536166244.png" class="img-circle"/>--}}
            </div>
            <div class="pull-left info">
                <p>{{ $auth->fullname }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">APP</li>
            <!-- Optionally, you can add icons to the links -->
            {{--<li class="{{ (Request::is('*dashboard*') || Request::is('/') ? 'active' : '') }}">--}}
                {{--<a href="{{route('dashboard')}}">--}}
                    {{--<i class="fa fa-home"></i><span>HOME</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="{{ (Request::is('*users*') ? 'active' : '') }}">
                <a href="{{route('user.index')}}"><i class="fa fa-users"></i><span>List User</span></a>
            </li>
            <li class="{{ (Request::is('*brands*') ? 'active' : '') }}">
                <a href="{{route('brand.index')}}"><i class="fa fa-bandcamp"></i><span>List Brand</span></a>
            </li>
            <li class="{{ (Request::is('*models*') ? 'active' : '') }}">
                <a href='{{route('model.index')}}'><i class="fa  fa-plane"></i><span>List Model</span></a>
            </li>
            {{--Product--}}
            {{--<li class="{{ (Request::is('*actions*') ? 'active' : '') }}">--}}
                {{--<a href="{{route('action.index')}}"><i class="fa fa-shield"></i><span>Actions</span></a>--}}
            {{--</li>--}}
            {{--<li class="{{ (Request::is('*event-beat*') ? 'active' : '') }}">--}}
                {{--<a href="{{route('event_beat.index')}}"><i class="fa fa-calendar" aria-hidden="true"></i><span>Event Beats</span></a>--}}
            {{--</li>--}}


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
