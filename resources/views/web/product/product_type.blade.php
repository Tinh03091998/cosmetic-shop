@extends('web.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Products {{$category_name->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page-index')}}">Home</a> / <span>Products</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                    @foreach($categories as $category)
                        <li><a href="{{route('product-type', $category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Found {{count($product_cat)}} products</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_cat as $pro_cat)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($pro_cat->pro_price!=0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('product-detail', $pro_cat->id)}}"><img src="web/images/product/{{$pro_cat->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$pro_cat->name}}</p>
                                            <p class="single-item-price">
                                                @if($pro_cat->pro_price==0)
                                                    <span class="flash-sale">{{number_format($pro_cat->selling_price)}} VND</span>
                                                @else
                                                    <span class="flash-del">{{number_format($pro_cat->selling_price)}} VND</span>
                                                    <span class="flash-sale">{{number_format($pro_cat->pro_price)}} VND</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('product-detail', $pro_cat->id)}}">{{$pro_cat->introduction}} <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Other Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Found {{count($other_products)}} products</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($other_products as $other_product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($other_product->pro_price!=0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('product-detail', $other_product->id)}}"><img src="web/images/product/{{$other_product->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$other_product->name}}</p>
                                        <p class="single-item-price">
                                            @if($other_product->pro_price==0)
                                                <span class="flash-sale">{{number_format($other_product->selling_price)}} VND</span>
                                            @else
                                                <span class="flash-del">{{number_format($other_product->selling_price)}} VND</span>
                                                <span class="flash-sale">{{number_format($other_product->pro_price)}} VND</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product-detail', $other_product->id)}}">{{$other_product->introduction}} <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="row">{{$other_products->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
