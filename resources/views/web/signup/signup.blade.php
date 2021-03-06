@extends('web.layout.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đăng kí</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="{{route('page-index')}}">Trang chủ</a> / <span>Đăng kí</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <form action="{{route('signup')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('Success'))
                        <div class="alert alert-success">{{Session::get('Success')}}</div>
                    @endif

                        <div class="col-lg-6 form-block">
                            <label for="your_last_name">Họ tên*</label>
                            <input type="text" name="name" required>
                        </div>

                        <div class="col-lg-6 form-block">
                            <label for="email">Email*</label>
                            <input type="email" name="email" required>
                        </div>

                        <div class="col-lg-6 form-block">
                            <label for="address">Địa chỉ*</label>
                            <input type="text" name="address">
                        </div>


                        <div class="col-lg-6 form-block">
                            <label for="phone">Điện thoại*</label>
                            <input type="text" name="phone">
                        </div>
                        <div class="col-lg-6 form-block">
                            <label for="phone">Mật khẩu*</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="col-lg-6 form-block">
                            <label for="phone">Xác nhận mật khẩu*</label>
                            <input type="password" name="re-password" required>
                        </div>
                        <div class="col-lg-6 form-block">
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
