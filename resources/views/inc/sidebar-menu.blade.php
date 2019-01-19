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
            <li class="header">
                Sales
            </li>
            <li class="{{ (Request::is('*sale-item*') ? 'active' : '') }}">
                <a href="{{route('sale_item.index')}}"><i class="fa fa-suitcase"></i><span>Sale Items</span></a>
            </li>
            {{--<li class="{{ (Request::is('*brands*') ? 'active' : '') }}">--}}
                {{--<a href="{{route('brand.index')}}"><i class="fa fa-suitcase"></i><span>Submitted items</span></a>--}}
            {{--</li>--}}
            {{--<li class="{{ (Request::is('*models*') ? 'active' : '') }}">--}}
                {{--<a href='{{route('model.index')}}'><i class="fa fa-share-alt-square"></i><span>On Sale items</span></a>--}}
            {{--</li>--}}
            {{--<li class="{{ (Request::is('*categories*') ? 'active' : '') }}">--}}
                {{--<a href="{{route('category.index')}}"><i class="fa fa-caret-square-o-left"></i><span>Sold items</span></a>--}}
            {{--</li>--}}
            <li class="header">
                App
            </li>
            <li class="{{ (Request::is('*products*') ? 'active' : '') }}">
                <a href="{{route('product.index')}}"><i class="fa fa-product-hunt"></i><span>Products</span></a>
            </li>
            <li class="{{ (Request::is('*items*') ? 'active' : '') }}">
                <a href="{{route('item.index')}}"><i class="fa fa-sitemap"></i><span>Items</span></a>
            </li>

            <li class="{{ (Request::is('*users*') ? 'active' : '') }}">
                <a href="{{route('user.index')}}"><i class="fa fa-users"></i><span>Users</span></a>
            </li>

            <li class="header">
                References
            </li>
            <li class="{{ (Request::is('*brands*') ? 'active' : '') }}">
                <a href="{{route('brand.index')}}"><i class="fa fa-bandcamp"></i><span>Brands</span></a>
            </li>
            <li class="{{ (Request::is('*models*') ? 'active' : '') }}">
                <a href='{{route('model.index')}}'><i class="fa fa-plane"></i><span>Models</span></a>
            </li>
            <li class="{{ (Request::is('*categories*') ? 'active' : '') }}">
                <a href="{{route('category.index')}}"><i class="fa fa-shield"></i><span>Categories</span></a>
            </li>
            <li class="{{ (Request::is('*colors*') ? 'active' : '') }}">
                <a href="{{route('color.index')}}"><i class="fa fa-cog"></i><span>Colors</span></a>
            </li>
            <li class="{{ (Request::is('*status*') ? 'active' : '') }}">
                <a href="{{route('status.index')}}"><i class="fa fa-scribd"></i><span>Status</span></a>
            </li>
            <li class="{{ (Request::is('*tags*') ? 'active' : '') }}">
                <a href="{{route('tag.index')}}"><i class="fa fa-tags"></i><span>Tags</span></a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
