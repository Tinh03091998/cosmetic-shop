@extends('admin/layout/index')
@section('title')
    Edit Product
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

        @if(session('message'))
            <div class='card card-inverse-success' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('message')}}
                    </p>
                </div>
            </div>
        @elseif(session('error'))
            <div class='card card-inverse-warning' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('error')}}
                    </p>
                </div>
            </div>
        @endif

        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Sửa sản phẩm : {{$product->name}}</h4>
                        <form class="forms-sample" method="post" action="admin/products/edit_product/{{$product->id}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Danh mục <span style="color: red">*</span></label>
                                <select  name="cat_id" aria-controls="order-listing" class="form-control">
                                    <option value="">Danh mục</option>
                                    @foreach($categories as $category)
                                        <option
                                            @if($product->cat_id == $category->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tên sản phẩm<span style="color: red">*</span></label>
                                <input type="text" class="form-control"
                                       value="{{$product->name}}"
                                       name="name" id="exampleInputName1" placeholder="...">
                            </div>

                            <div class="form-group">
                                <label>Chọn ảnh cho sản phẩm<span style="color: red">*</span></label><br>
                                <img src="web/images/product/{{$product->image}}" width="400px" alt=""><br><br>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="{{$product->image}}">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Chọn sản phẩm</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword4">Nhà sản xuất<span style="color: red">*</span></label>
                                <select  name="manu_id" aria-controls="order-listing" class="form-control">
                                    <option value="">-- Chọn nhà sản xuất --</option>
                                    @foreach($manufactures as $manufacturer)
                                        <option
                                            @if($product->manufacture_id == $manufacturer->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Giá bán (Đơn vị: VND)<span style="color: red">*</span></label>
                                <input type="number" class="form-control" min="1" max="1000000000"
                                       value="{{$product->selling_price}}"
                                       name="selling_price" id="exampleInputName1" placeholder="...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Giá khuyến mãi (Đơn vị: VND)<span style="color: red">*</span></label>
                                <input type="number" class="form-control" min="1" max="selling_price"
                                       value="{{$product->promoted_price}}"
                                       name="promoted_price" id="exampleInputName1" placeholder="...">
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">Mô tả<span style="color: red">*</span></label>

                                <textarea class="form-control" name="description" id="editor1" rows="">
                                    {{$product->description}}
                                    </textarea>
                                <script>

                                    CKEDITOR.replace( 'editor1' );

                                </script>
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" name="submit" value="Sửa sản phẩm">
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
    <script src="admin_asset/js/owl-carousel.js"></script>
    <!-- End custom js for this page-->
@endsection
