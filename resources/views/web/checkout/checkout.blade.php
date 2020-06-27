@extends('web.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
{{--            <h6 class="inner-title">Order</h6>--}}
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('page-index')}}">Home page</a> / <span>Order</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('order')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Order</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Full name*</label>
                        <input type="text" name="name" placeholder="Họ tên" readonly="true" value="{{auth('customers')->user()->name}}" required>
                    </div>
{{--                    <div class="form-block">--}}
{{--                        <label>Gender </label>--}}
{{--                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Male</span>--}}
{{--                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Female</span>--}}

{{--                    </div>--}}

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" required placeholder="expample@gmail.com" readonly="true" value="{{auth('customers')->user()->email}}">
                    </div>

                    <div class="form-block">
                        <label for="address">Address*</label>
                        <input type="text" name="address" placeholder="Street Address" value="{{auth('customers')->user()->address}}" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" name="phone" value="{{auth('customers')->user()->phone}}" required>
                    </div>

                    <div class="form-block">
                        <label for="notes">Notes</label>
                        <textarea name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Your order</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    @if(Session::has('cart'))
                                        <?php $cart=Session::get('cart') ?>
                                            @foreach($cart->items as $product_cart)
                                                <!--  one item	 -->
{{--                                                {{dd($product_cart)}}--}}
                                                <div  . class="media">
                                                    <img width="25%" src="web/images/product/{{$product_cart['item']->image}}" alt="" class="pull-left">
                                                    <div class="media-body">
                                                        <p class="font-large">{{$product_cart['item']->name}}</p>
                                                        <span class="color-gray your-order-info">{{$product_cart['quantity']}}</span>
                                                        <span class="color-gray your-order-info">{{$product_cart['price']}}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                    <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Total products:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$cart->totalQuatity}}</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Total cost:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$cart->totalPrice}}</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                        </div>
                        <div class="your-order-head"><h5>Payment method</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text=""
                                    name="payment_method">
                                    <label for="payment_method_bacs">Payment when I receive products </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        When shop sends products to you, you check your order and pay for shipper.
                                    </div>
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Transfer </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Transfer into account:
                                        <br>- Account number: 123 456 789
                                        <br>- Account owner: Nguyen Thi Tinh
                                        <br>- Vietcombank, Chuong Duong branch
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary" href="{{route('page-index')}}" href="{{route('send-email')}}">Order <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection
