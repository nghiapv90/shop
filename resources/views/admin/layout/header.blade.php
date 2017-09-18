
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Admin Area </a>
    </div>
    <!-- /.navbar-header -->

    {{--<ul class="nav navbar-top-links navbar-right">--}}
        {{--<!-- /.dropdown -->--}}
        {{--<li class="dropdown">--}}
            {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                {{--<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>--}}
            {{--</a>--}}
            {{--<ul class="dropdown-menu dropdown-user">--}}
            {{--<ul class="top-details menu-beta l-inline">--}}
                {{--@if(isset($user_login))--}}
                {{--<li><a href="#"><i class="fa fa-user fa-fw"></i>{{$user_login->full_name}} Profile</a>--}}
                {{--</li>--}}
                {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                {{--</li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="{{route('adminlogout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}
                {{--</li>--}}
                    {{--@endif--}}
                {{--@if(Auth::check())--}}
                    {{--<li><a href="">Chào bạn {{Auth::user()->full_name}}</a></li>--}}
                    {{--<li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>--}}
                {{--@else--}}
            {{--</ul>--}}
            {{--<!-- /.dropdown-user -->--}}
        {{--</li>--}}
        {{--<!-- /.dropdown -->--}}
    {{--</ul>--}}
    <!-- /.navbar-top-links -->
    <div class="pull-right auto-width-right">
        <ul class="top-details menu-beta l-inline">
            {{--<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>--}}
            @if(Auth::check())
                <li><a href="">Chào bạn {{Auth::user()->full_name}}</a></li>
                <li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
            @else
                <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                <li><a href="{{route('dangki')}}">Đăng kí</a></li>
            @endif
        </ul>
    </div>

    @include('admin.layout.menu')
    <!-- /.navbar-static-side -->
</nav>