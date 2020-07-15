@extends('web.layout.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h1 class="inner-title">Liên hệ</h1>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html" class="text-primary">Trang chủ</a> / <span>Liên hệ</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
{{--    <div class="beta-map">--}}

{{--        <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" ></iframe></div>--}}
{{--    </div>--}}
    <div class="container">
        <div id="content" class="space-top-none">

            <div class="space50">&nbsp;</div>
            <div class="row">
                <div class="col-sm-7">
                    <h2 class="font-weight-bold">Phiếu tiếp nhận thông tin</h2>
                    <div class="space20">&nbsp;</div>
                    <p>Mọi ý kiến thắc mắc, đóng góp của khách hàng vui lòng điền vào phiếu dưới đây!</p>
                    <div class="space20">&nbsp;</div>
                    <form action="{{route('contact')}}" method="post" class="contact-form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-block">
                            <input name="name" style="width: 600px"  type="text" value="{{auth('customers')->user()->name}}" readonly>
                        </div>
                        <div class="form-block">
                            <input name="email" style="width: 600px" type="email" value="{{auth('customers')->user()->email}}" readonly>
                        </div>
{{--                        <div class="form-block">--}}
{{--                            <input name="your-subject" type="text" placeholder="Nhập tiêu đề của phiếu (bắt buộc)">--}}
{{--                        </div>--}}
                        <div class="form-block">
                            <textarea name="msg" style="width: 600px"  placeholder="Nội dung tin"></textarea>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="beta-btn primary">Gửi thông tin <i class="fa fa-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5">
                    <h2 class="font-weight-bold">Thông tin liên hệ</h2>
                    <div class="space20">&nbsp;</div>

                    <h6 class="contact-title">Địa chỉ</h6>
                    <p>
                        Ngách 26/154, ngõ 154 Đình Thôn, phường Mỹ Đình 1, quận Nam Từ Liêm, Hà Nội
                    </p>
                    <div class="space20">&nbsp;</div>
                    <h6 class="contact-title">Business Enquiries</h6>
                    <p>
                        Doloremque laudantium, totam rem aperiam, <br>
                        inventore veritatio beatae. <br>
                        <a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
                    </p>
                    <div class="space20">&nbsp;</div>
                    <h6 class="contact-title">Cửa hàng mỹ phẩm</h6>
                    <p>
                        Gửi mail trực tiếp tới email của cửa hàng<br>
                        <a href="#">tinhnt.gha@gmail.com</a>
                    </p>
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
