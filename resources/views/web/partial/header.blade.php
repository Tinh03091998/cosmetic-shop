{{--Header section--}}
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> Ngõ 154, đường Đình Thôn, quận Nam Từ Liêm, Hà Nội</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0395 737 272</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                @if(auth('customers')->check())
                    <li><a href="#">Chào mừng {{auth('customers')->user()->name}}</a></li>
                    <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                @else
                    <li><a href="{{route('signup')}}">Đăng kí</a></li>
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('page-index')}}" id="logo"><img src="web/images/logo.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Cart (
                            @if(Session::has('cart'))
                                {{Session('cart')->totalQuatity}}
                            @else Empty @endif
                            <?php echo ")";?>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <div class="beta-dropdown cart-body">
                        @foreach($product_cart as $product_cart)
                            <div class="cart-item">
                                <a href="{{route('delete-cart', $product_cart['item']['id'])}}" class="cart-item-delete"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="web/images/product/{{$product_cart['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product_cart['item']['name']}}</span>
                                        <span class="cart-item-amount">{{$product_cart['quantity']}}*<span>@if($product_cart['item']['promoted_price']==0){{number_format($product_cart['item']['selling_price'])}}
                                                @else {{number_format($product_cart['item']['promoted_price'])}} @endif VND</span></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}} VND</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    @if(auth('customers')->check())
                                        <a href="{{route('order')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    @else
                                        <a href="{{route('login')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    @endif
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
                    <li><a href="{{route('page-index')}}">Trang chủ</a></li>
                    <li><a href="{{route('product-type', 1)}}">Loại sản phẩm</a>
                        <ul class="sub-menu">
                        @foreach($category as $category)
                            <li><a href="{{route('product-type', $category->id)}}">{{$category->name}}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('about')}}">Giới thiệu</a></li>
                    <li><a href="{{route('contact')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div>
{{--End Header section--}}
