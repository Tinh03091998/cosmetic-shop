@extends('web.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Product {{$products->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page-index')}}">Home</a> / <span>Product Detail</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="web/images/product/{{$products->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h2>{{$products->name}}</h2></p>
                            <p class="single-item-price">
                                @if($products->pro_price==0)
                                    <span class="flash-sale">{{number_format($products->selling_price)}} VND</span>
                                @else
                                    <span class="flash-del">{{number_format($products->selling_price)}} VND</span>
                                    <span class="flash-sale">{{number_format($products->pro_price)}} VND</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$products->introduction}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Quantity:</p>
                        <div class="single-item-options">
                            <input type="number" value="1" min="1" max="1000">
                            <a class="add-to-cart" href="{{route('add-to-cart', $products->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$products->introduction}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Same Products</h4>

                    <div class="row">
                    @foreach($same_products as $same_product)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($same_product->pro_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                <div class="single-item-header">
                                    <a href="product.html"><img src="web/images/product/{{$same_product->image}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$same_product->name}}</p>
                                    <p class="single-item-price">
                                        @if($same_product->pro_price==0)
                                            <span class="flash-sale">{{number_format($same_product->selling_price)}} VND</span>
                                        @else
                                            <span class="flash-del">{{number_format($same_product->selling_price)}} VND</span>
                                            <span class="flash-sale">{{number_format($same_product->pro_price)}} VND</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('add-to-cart', $same_product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="product.html">{{$same_product->introduction}} <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
