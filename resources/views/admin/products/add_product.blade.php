@extends('admin/layout/index')
@section('title')
    Add Products
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
        @elseif(session('Message'))
            <div class='card card-inverse-warning' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('Message')}}
                    </p>
                </div>
            </div>
        @endif

        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Thêm sản phẩm</h4>
                        <form class="forms-sample" method="post" action="admin/products/add_product" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Sản phẩm thuộc danh mục<span style="color: red">*</span></label>
                                <select  name="cat_id" aria-controls="order-listing" class="form-control">
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tên sản phẩm<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="" name="name" placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="form-group">
                                <label>Chọn ảnh cho sản phẩm<span style="color: red">*</span></label>
                                <input type="file" name="image" class="form-control">
                                <div class="input-group col-xs-12">
{{--                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Select product image">--}}
{{--                                    <span class="input-group-append">--}}
{{--                                        <button class="file-upload-browse btn btn-primary" type="button">Chọn ảnh</button>--}}
{{--                                    </span>--}}
                                </div>
                            </div>
                            {{--                                //Multiple Image--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Select image for product<span style="color: red">*</span></label>--}}
{{--                                <input type="file" multiple="" name="images"  class="form-control">--}}
{{--                            </div>--}}
                            {{--                                End multiple Image--}}
                            <div class="form-group">
                                <label for="exampleInputPassword4">Nhà sản xuất<span style="color: red">*</span></label>
                                <select  name="manufacture_id" aria-controls="order-listing" class="form-control">
                                    <option value="">-- Chọn nhà sản xuất --</option>
                                    @foreach($manufactures as $manufacture)
                                        <option value="{{$manufacture->id}}">{{$manufacture->name}}</option>
                                    @endforeach

                                </select>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputName1">Giá bán (Đơn vị: VND)<span style="color: red">*</span></label>--}}
{{--                                <input type="number" class="form-control" min="1" max="1000000000" value="" name="selling_price" id="exampleInputName1" placeholder="Nhập giá bán">--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="exampleInputName1">Ngày sản xuất<span style="color: red">*</span></label>
                                <input type="date" class="form-control" value="" name="manufacture_date" id="exampleInputName1" placeholder="Nhập ngày sản xuất">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Hạn sử dụng<span style="color: red">*</span></label>
                                <input type="date" class="form-control" value="" name="expiration" id="exampleInputName1" placeholder="Nhập ngày hết hạn">
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputName1">Giá khuyến mãi (Đơn vị: VND) <span style="color: red">*</span></label>--}}
{{--                                <div style="display: flex;justify-content: center">--}}
{{--                                    <input type="number" min="0" class="form-control" value="" name="promoted_price" id="exampleInputName1" placeholder="Nhập giá khuyến mãi">--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="form-group">
                                <label for="exampleTextarea1">Mô tả<span style="color: red">*</span></label>

                                <textarea class="form-control" name="description" id="editor1" rows="" placeholder="">

                                    </textarea>
                                <script>

                                    CKEDITOR.replace( 'editor1' );

                                </script>
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" name="submit" value="Thêm sản phẩm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Custom js for this page-->
    <script src="admin_asset/js/file-upload.js"></script>
    <script src="admin_asset/js/iCheck.js"></script>
    <script src="admin_asset/js/typeahead.js"></script>
    <script src="admin_asset/js/select2.js"></script>
    <script src="admin_asset/js/jquery-file-upload.js"></script>
    <!-- End custom js for this page-->
@endsection
