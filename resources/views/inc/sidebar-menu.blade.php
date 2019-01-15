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
            <li class="active treeview menu-open">
                <a href="#">
                    <span>Sales</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="">
                    <li class="{{ (Request::is('*brands*') ? 'active' : '') }}">
                        <a href="{{route('brand.index')}}"><i class="fa fa-bandcamp"></i><span>Submitted items</span></a>
                    </li>
                    <li class="{{ (Request::is('*models*') ? 'active' : '') }}">
                        <a href='{{route('model.index')}}'><i class="fa  fa-plane"></i><span>On Sale items</span></a>
                    </li>
                    <li class="{{ (Request::is('*categories*') ? 'active' : '') }}">
                        <a href="{{route('category.index')}}"><i class="fa fa-shield"></i><span>Sold items</span></a>
                    </li>
                </ul>
            </li>
            <li class="active treeview menu-open">
                <a href="#">
                    <span>App</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="">
                    <li class="{{ (Request::is('*products*') ? 'active' : '') }}">
                        <a href="{{route('product.index')}}"><i class="fa fa-shield"></i><span>Products</span></a>
                    </li>
                    <li class="{{ (Request::is('*items*') ? 'active' : '') }}">
                        <a href="{{route('item.index')}}"><i class="fa fa-shield"></i><span>Items</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ (Request::is('*users*') ? 'active' : '') }}">
                <a href="{{route('user.index')}}"><i class="fa fa-users"></i><span>Users</span></a>
            </li>
            <li class="active treeview menu-open">
                <a href="#">
                    <span>References</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="">
                    <li class="{{ (Request::is('*brands*') ? 'active' : '') }}">
                        <a href="{{route('brand.index')}}"><i class="fa fa-bandcamp"></i><span>Brands</span></a>
                    </li>
                    <li class="{{ (Request::is('*models*') ? 'active' : '') }}">
                        <a href='{{route('model.index')}}'><i class="fa  fa-plane"></i><span>Models</span></a>
                    </li>
                    <li class="{{ (Request::is('*categories*') ? 'active' : '') }}">
                        <a href="{{route('category.index')}}"><i class="fa fa-shield"></i><span>Categories</span></a>
                    </li>
                    <li class="{{ (Request::is('*colors*') ? 'active' : '') }}">
                        <a href="{{route('color.index')}}"><i class="fa fa-shield"></i><span>Colors</span></a>
                    </li>
                    <li class="{{ (Request::is('*status*') ? 'active' : '') }}">
                        <a href="{{route('status.index')}}"><i class="fa fa-shield"></i><span>Status</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
