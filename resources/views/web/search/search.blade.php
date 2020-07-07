@extends('web.layout.master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Tìm kiếm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($product->pro_price!=0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Giảm giá</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('product-detail', $product->id)}}"><img src="web/images/product/{{$product->image}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$product->name}}</p>
                                                <p class="single-item-price">
                                                    @if($product->pro_price==0)
                                                        <span class="flash-sale">{{number_format($product->selling_price)}} VND</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($product->selling_price)}} VND</span>
                                                        <span class="flash-sale">{{number_format($product->pro_price)}} VND</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{route('add-to-cart', $product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="product.html">{{$product->introduction}} <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
{{--                            <div class="row">{{ $product->links() }}</div>--}}
                        </div> <!-- .beta-products-list -->
                        <div class="space50">&nbsp;</div>
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
@endsection
