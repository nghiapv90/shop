
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
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
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="source/source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (
                            @if(Session::has('cart'))
                                {{Session('cart')->totalQty}}
                            @else Trong
                            @endif ) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">

                                @foreach($product_cart as $product)
                            <div class="cart-item">
                                <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fafa-times" >X</i></a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="source/source/image/product/{{$product['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        {{--<span class="cart-item-options">Size: XS; Colar: Navy</span>--}}
                                        <span class="cart-item-amount">{{$product['qty']}}*<span>
                                            @if($product['item']['promotion_price']==0)
                                                    {{number_format($product['item']['unit_price'])}}
                                            @else {{$product['item']['promotion_price']}} @endif
                                        </span></span>
                                    </div>
                                </div>
                            </div>
                                @endforeach


                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" style="font-size: large">{{number_format(Session('cart')->totalPrice)}} dong</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('viewdathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                    <li><a href="{{route('trang-chu')}}">Loai Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $loai)
                            <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="gioithieu">Giới thiệu</a></li>
                    <li><a href="lienhe">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->