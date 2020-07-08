@extends('web.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
{{--            <h6 class="inner-title">{{$categories->name}}</h6>--}}
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page-index')}}">Trang chủ</a> / <span>Sản phẩm</span>
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
                        <h4>Sản phẩm hàng đầu</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product_cat)}} sản phẩm</p>
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
                                            <a href="{{route('product-detail', $pro_cat->id)}}"><img class="img-product" src="web/images/product/{{$pro_cat->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title" style="width: 212px; height: 45px; overflow: hidden; text-overflow:ellipsis">{{$pro_cat->name}}</p>
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
                                            <a class="add-to-cart pull-left" href="{{route('add-to-cart', $pro_cat->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" style="height: 156px; width: 212px; overflow: hidden; text-overflow:ellipsis"
                                               href="{{route('product-detail', $pro_cat->id)}}">{{$pro_cat->description}} <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($other_products)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($other_products as $other_product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($other_product->pro_price!=0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Giảm giá</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('product-detail', $other_product->id)}}"><img class="img-product" src="web/images/product/{{$other_product->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title" style="width: 212px; height: 45px; overflow: hidden; text-overflow:ellipsis">{{$other_product->name}}</p>
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
                                        <a class="add-to-cart pull-left" href="{{route('add-to-cart', $other_product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="{{route('product-detail', $other_product->id)}}">
                                            <div style="height: 156px;
    width: 212px;
    overflow: hidden;
    text-overflow: ellipsis;">{{$other_product->description}}</div>
                                             <i class="fa fa-chevron-right"></i></a>
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
