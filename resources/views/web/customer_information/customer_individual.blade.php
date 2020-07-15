@extends('web.layout.master')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-body text-center">
                <h1 class="pageintro-title mt-5 mb-5" style="margin-top: 15px
">Thông tin cá nhân</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-70 py-tn-40">
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-form-body p-r-lg-15 p-r-xl-15">
                        <h2 class="au-form-title  form-title-border" style="margin-bottom: 15px">Thông tin của bạn</h2>
                        <fieldset class="m-t-40">
                            <form action="customer-information" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row">
                                    <div class="col-lg-6 form-group au-form require">
                                        <label>Họ & tên bạn</label>
                                        <input type="text" value="{{auth('customers')->user()->name}}" name="name">
                                    </div>
                                    <div class="col-lg-6 form-group au-form require">
                                        <label>Số điện thoại</label>
                                        <input type="text" value="{{auth('customers')->user()->phone}}" name="phone">
                                    </div>
                                    <div class="col-lg-6 form-group au-form require">
                                        <label>Địa chỉ</label>
                                        <input type="text" value="{{auth('customers')->user()->address}}"
                                               name="address">
                                    </div>
                                    <div class="col-lg-6 form-group au-form require">
                                        <label>Địa chỉ Email</label>
                                        <input type="email" value="{{auth('customers')->user()->email}}" name="email"
                                               readonly>
                                    </div>
                                    <div class="col-lg-12 form-group au-form">
                                        <button type="submit" class="btn btn-primary">Thay đổi thông tin</button>
                                        <a href="{{route('reset-password-link')}}" class="pass">Thay đổi mật khẩu</a>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

