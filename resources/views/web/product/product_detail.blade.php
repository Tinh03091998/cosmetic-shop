@extends('web.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{$products->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page-index')}}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
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
                                @if($products->promoted_price==0)
                                    <span class="flash-sale">{{number_format($products->selling_price)}} VND</span>
                                @else
                                    <span class="flash-del">{{number_format($products->selling_price)}} VND</span>
                                    <span class="flash-sale">{{number_format($products->promoted_price)}} VND</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$products->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Số lượng:</p>
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
                        <li style="margin-left: 0px"><label><a href="#tab-description">Bình luận</a></label></li>
{{--                        <li><a href="#tab-reviews">Reviews (0)</a></li>--}}
{{--                        comment form--}}
                        @if(auth('customers')->check())
                        <div class="well">
{{--                            @if(session('message'))--}}
{{--                                {{session('message')}}--}}
{{--                            @endif--}}
                            <label>Viết bình luận của bạn... <span class="glyphicon glyphicon-pencil"></span></label>
                            <form action="comment/{{$products->id}}" role="form" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <textarea class="form-control" name="content" cols="30" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng</button>
                            </form>
                        </div>
                        @endif
                    </ul>
                    <div class="row list-product">
                        <div class="col-md-12 comment-list">
                            <div class="col-md-9 comment">
                            @foreach($comments as $comment)
                                <ul>
{{--                                    <li class="comment-title">{{auth('customers')->user()->name}}--}}
                                    <label><b>{{$comment->customers->name}}</b></label>
                                    <span style="padding-left: 10px">{{date('d/m/Y H:i', strtotime($comment->created_at))}}</span>

                                    <div class="form-block" style="padding-top: 5px">
                                        <p style="border-style: ridge; border-width: 1px; width: 693px; height: auto;
                                            padding-top: 5px">{{$comment->content}}</p></textarea>
                                    </div>
{{--                                    <li class="comment-title">{{$comment->customers->name}}--}}
{{--                                        <br>--}}
{{--                                        <span>{{date('d/m/Y H:i', strtotime($comment->created_at))}}</span>--}}
{{--                                    </li>--}}
{{--                                    <li class="comment-details">--}}
{{--                                        {{$comment->content}}--}}
{{--                                    </li>--}}
                                </ul>
                            @endforeach
                            </div>
                        </div>
                    </div>
{{--                    <div class="panel" id="tab-description">--}}
{{--                        <p>{{$products->introduction}}</p>--}}
{{--                    </div>--}}
{{--                    <div class="panel" id="tab-reviews">--}}
{{--                        <p>No Reviews</p>--}}
{{--                    </div>--}}
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>

                    <div class="row">
                    @foreach($same_products as $same_product)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($same_product->pro_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Giảm giá</div></div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{route('product-detail', $same_product->id)}}"><img src="web/images/product/{{$same_product->image}}" alt=""></a>
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
                                    <a class="beta-btn primary" href="{{route('product-detail', $same_product->id)}}">{{$same_product->description}} <i class="fa fa-chevron-right"></i></a>
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
                    <h3 class="widget-title">Sản phẩm bán chạy</h3>
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
