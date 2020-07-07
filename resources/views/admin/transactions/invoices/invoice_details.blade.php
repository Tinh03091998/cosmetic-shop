@extends('admin/layout/index')
@section('title')
    Invoice Detail
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chi Tiết Đơn Hàng</h4>
                        <p class="card-description">
                            Họ & Tên khách hàng : <b>{{$invoices->customers->name}}</b>
                        </p>
                        <p class="card-description">
                            Số điện thoại : <b>{{$invoices->customers->phone}}</b>
                        </p>
                        <p class="card-description">
                            Địa chỉ Email : <b>{{$invoices->customers->email}}</b>
                        </p>
                        <p class="card-description">
                            Địa chỉ giao hàng : <b>{{$invoices->customers->address}}</b>
                        </p>
                        <p class="card-description">
                            Ghi chú : <b>{{$invoices->note}}</b>
                        </p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productOrders as $productOrder)
                                    <tr>
{{--                                        {{dd($productOrder)}}--}}
                                        <th>{{$productOrder->products->name}}</th>
                                        <th>{{$productOrder->quantity}}</th>
                                        <th>{{number_format($productOrder->products->selling_price,0,',','.')}} VNĐ</th>
                                        <th>{{number_format($productOrder->total,0,',','.')}} VNĐ</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-xl-6">
                                <table style="width: 100%;line-height: 40px;">
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <th style="font-size: 20px;color: red">{{number_format($invoices->total_cost,0,',','.')}}
                                            VNĐ
                                        </th>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-xl-6"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-icon-text">
                            <a href="admin/invoices/pdf/{{$invoices->id}}" style="color:white;">In Hóa Đơn</a>
                            <i class="mdi mdi-printer btn-icon-append"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
