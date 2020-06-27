@extends('web/layout/master')
@section('content')
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                    @foreach($slides as $slide)
                        <!-- THE FIRST SLIDE -->
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                     data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                     data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                     data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                     data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                     data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                         data-bgposition="center center" data-bgrepeat="no-repeat"
                                         data-lazydone="undefined" src="web/images/slide/{{$slide->image}}"
                                         data-src="web/images/slide/{{$slide->image}}"
                                         style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('web/images/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Found {{count($new_products)}} products</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($new_products as $new_product)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($new_product->promoted_price!=0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('product-detail', $new_product->id)}}"><img
                                                        src="web/images/product/{{$new_product->image}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$new_product->name}}</p>
                                                <p class="single-item-price">
                                                    @if($new_product->promoted_price==0)
                                                        <span class="flash-sale">{{number_format($new_product->selling_price)}} VND</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($new_product->selling_price)}} VND</span>
                                                        <span class="flash-sale">{{number_format($new_product->promoted_price)}} VND</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('add-to-cart', $new_product->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{route('product-detail', $new_product->id)}}">{{$new_product->description}} <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{ $new_products->links() }}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Promoted Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Found {{count($promoted_products)}} products</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($promoted_products as $promoted_product)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{route('product-detail', $promoted_product->id)}}"><img
                                                        src="web/images/product/{{$promoted_product->image}}"
                                                        alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$promoted_product->name}}</p>
                                                <p class="single-item-price">
                                                    <span class="flash-del">{{number_format($promoted_product->selling_price)}} VND</span>
                                                    <span class="flash-sale">{{number_format($promoted_product->promoted_price)}} VND</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('add-to-cart', $promoted_product->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{route('product-detail', $promoted_product->id)}}">{{$promoted_product->description}} <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div>
@endsection
{{--Test upload github--}}
