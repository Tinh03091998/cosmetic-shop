{{--Header section--}}
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 154 Dinh Thon Street, Nam Tu Liem distrist, Ha Noi</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                @if(Auth::check())
                    <li><a href="#">Welcome {{Auth::users()->name}}</a></li>
                    <li><a href="{{route('logout')}}">Log out</a></li>
                @else
                    <li><a href="{{route('signup')}}">Sign up</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
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
                        <input type="text" value="" name="search" id="s" placeholder="Enter keyword..." />
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
                                        <span class="cart-item-amount">{{$product_cart['quantity']}}*<span>@if($product_cart['item']['pro_price']==0){{number_format($product_cart['item']['selling_price'])}}
                                                @else {{number_format($product_cart['item']['pro_price'])}} @endif VND</span></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Total Price: <span class="cart-total-value">{{Session('cart')->totalPrice}} VND</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="checkout.html" class="beta-btn primary text-center">Order <i class="fa fa-chevron-right"></i></a>
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
                    <li><a href="{{route('page-index')}}">Home</a></li>
                    <li><a href="{{route('product-type', 1)}}">Categories</a>
                        <ul class="sub-menu">
                        @foreach($category as $category)
                            <li><a href="{{route('product-type', $category->id)}}">{{$category->name}}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div>
{{--End Header section--}}
