@extends('admin/layout/index')
@section('title')
    Product Detail
@endsection
@section('content')
    <div class="content-wrapper">
        @if(count($errors) > 0)
            <div class='card card-inverse-warning' id='context-menu-access'>
                <div class='card-body'>
                    @foreach($errors->all() as $err)
                        <p class='card-text' style='text-align: center;'>
                            {{$err}}
                        </p>
                    @endforeach
                </div>
            </div>
        @endif

        @if(session('ThongBao'))
            <div class='card card-inverse-success' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('ThongBao')}}
                    </p>
                </div>
            </div>
        @elseif(session('Loi'))
            <div class='card card-inverse-warning' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('Loi')}}
                    </p>
                </div>
            </div>
        @endif
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="width: 100%;height: 50px;">
                            <a href="admin/products/product_list">
                                <button type="button" style="float: left;" class="btn btn-google btn-icon-text">
                                    <i class="mdi mdi-file-document btn-icon-prepend"></i>
                                    Danh sách sản phẩm
                                </button>
                            </a>
{{--                            <a href="admin/sanpham/sua/{{$product->id}}">--}}
{{--                                <button type="button" style="float: right" class="btn btn-primary btn-icon-text">--}}
{{--                                    Sửa--}}
{{--                                    <i class="mdi mdi-file-check btn-icon-append"></i>--}}
{{--                                </button>--}}
{{--                            </a>--}}
                        </div>
                        <div>
                            <h1 style="
                                color: #737373;
                                margin-bottom: 1.5rem;
                                text-transform: capitalize;
                                display: flex;
                                justify-content: center;
                                ">Chi tiết sản phẩm</h1>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-1" role="tab"
                                   aria-controls="home-1" aria-selected="false">Ảnh</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile-1"
                                   role="tab" aria-controls="profile-1" aria-selected="true">Chi tiết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab"
                                   aria-controls="contact-1" aria-selected="false">Mô tả</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile-1" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="media">
                                    <img class="mr-3 w-25 rounded" src="web/images/product/{{$products->image}}"
                                         alt="sample image">
                                    <div class="media-body" style="margin-left: 30px">
                                        <p class="card-description">
                                            Tên sản phẩm : <b>{{$products->name}}</b>
                                        </p>
                                        <p class="card-description">
                                            Sản phẩm thuộc danh mục : <b>{{$products->categories->name}}</b>
                                        </p>
{{--                                        <p class="card-description">--}}
{{--                                            Import price of product :--}}
{{--                                            @if($product->import_price == null)--}}
{{--                                                <b style="color: red">Vui lòng nhập hoá đơn nhập cho sản phẩm này!</b>--}}
{{--                                                click <a href=""></a>--}}
{{--                                            @else--}}
{{--                                                <b>{{number_format($product->import_price, 0, ',', '.')}} VNĐ</b>--}}
{{--                                            @endif--}}
{{--                                        </p>--}}
                                        <p class="card-description">
                                            Giá bán :
                                            @if($products->selling_price == null)
                                                <b style="color: red">Nhập hóa đơn nhập cho sản phẩm này!</b>
                                            @else
                                                <b>{{number_format($products->selling_price, 0, ',', '.')}} VNĐ</b>
                                            @endif
                                        </p>
                                        <p class="card-description">
                                            Giá khuyến mãi :
                                            @if($products->promoted_price == null)
                                                <b style="color: red">Vui lòng nhập hóa đơn nhập cho sản phẩm này!</b>
                                            @else
                                                <b>{{number_format($products->promoted_price, 0, ',', '.')}} VNĐ</b>
                                            @endif
                                        </p>
                                        <p class="card-description">
                                            Nơi sản xuất :<b>{{$products->manufactures->name}}</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                                {!! $products->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="admin_asset/js/owl-carousel.js"></script>
@endsection
