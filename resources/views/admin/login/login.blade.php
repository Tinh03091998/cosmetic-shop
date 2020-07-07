<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Original URL: http://www.urbanui.com/serein/template/demo/vertical-default-light/pages/samples/login-2.html
    Date Downloaded: 11/30/2018 1:56:42 PM !-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Serein Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('/admin_asset/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{url('/admin_asset/vendors/css/vendor.bundle.base.css')}}" />
    <link rel="stylesheet" href="{{url('/admin_asset/vendors/css/vendor.bundle.addons.css')}}" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('/admin_asset/css/vertical-layout-light/style.css')}}" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{url('/admin_asset/images/favicon.png')}}" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="{{url('/admin_asset/images/logo.svg')}}" alt="logo" />
                        </div>
                        <h4>Chào mừng trở lại!</h4>
                        <h6 class="font-weight-light">Rất vui khi gặp lại bạn!</h6>
                        <form method="post" action="{{route('login-admin')}}" class="pt-3">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <label for="exampleInputEmail">Tên người dùng</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Tên người dùng" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Mật khẩu</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Mật khẩu" />
                                </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" />
                                        Duy trì đăng nhập
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="{{route('homepage')}}">Đăng nhập</button>
                            </div>
{{--                            <div class="mb-2 d-flex">--}}
{{--                                <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">--}}
{{--                                    <i class="mdi mdi-facebook mr-2"></i>Facebook--}}
{{--                                </button>--}}
{{--                                <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">--}}
{{--                                    <i class="mdi mdi-google mr-2"></i>Google--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="text-center mt-4 font-weight-light">--}}
{{--                                Don't have an account? <a href="{{route('signup-admin')}}" class="text-primary">Create</a>--}}
{{--                            </div>--}}
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{url('/admin_asset/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{url('/admin_asset/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{url('/admin_asset/js/off-canvas.js')}}"></script>
<script src="{{url('/admin_asset/js/hoverable-collapse.js')}}"></script>
<script src="{{url('/admin_asset/js/template.js')}}"></script>
<script src="{{url('/admin_asset/js/settings.js')}}"></script>
<script src="{{url('/admin_asset/js/todolist.js')}}"></script>
<!-- endinject -->
</body>

</html>
