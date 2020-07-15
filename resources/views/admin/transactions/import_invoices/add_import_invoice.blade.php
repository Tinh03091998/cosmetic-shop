@extends('admin/layout/index')
@section('title')
    Add Import Invoice
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
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Thêm hóa đơn nhập</h4>
                        <form class="forms-sample" method="post"
{{--                              action="">--}}
                              action="admin/import_invoices/add_import_invoice">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Chọn sản phẩm <span
                                        style="color: red">*</span></label>
                                <select name="pro_id" aria-controls="order-listing" class="form-control">
                                        <option value="">--</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Nhân viên <span
                                        style="color: red">*</span></label>
                                <input type="text" readonly value="{{auth('web')->user()->name}}"  name="user_id" class="form-control" id="exampleInputName1"/>
{{--                                <select name="user_id" aria-controls="order-listing" class="form-control">--}}
{{--                                    @if(isset($product))--}}
{{--                                        <option value="{{$product->id}}">{{$product->name}}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="">--</option>--}}
{{--                                        @foreach($products as $product)--}}
{{--                                            <option value="{{$product->id}}">{{$product->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </select>--}}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Giá nhập <span style="color: red">*</span></label>
                                <input type="number" value=""
                                       name="import_price" class="form-control" id="exampleInputName1"
                                       placeholder="Giá nhập của sản phẩm"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Giá bán <span style="color: red">*</span></label>
                                <input type="number" value=""
                                       name="selling_price" class="form-control" id="exampleInputName1"
                                       placeholder="Giá bán của sản phẩm"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Giá khuyến mại <span style="color: red">*</span></label>
                                <input type="number" value=""
                                       name="promoted_price" class="form-control" id="exampleInputName1"
                                       placeholder="Giá khuyến mại của sản phẩm"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Số lượng nhập <span style="color: red">*</span></label>
                                <input type="number" value=""
                                       name="quantity" class="form-control" id="exampleInputName1"
                                       placeholder="Nhập số lượng nhập"/>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm hóa đơn nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
