@extends('admin/layout/index')
@section('title')
    Add Role
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
        @endif

        <form class="forms-sample" method="post" action="admin/roles/add_role">
            <div class="row grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-align: center;font-size: 27px">Thêm vai trò</h4>
                        </div>
                    </div>
                </div>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên vai trò <span style="color: red">*</span></label>
                                <input type="text" value=""
                                       name="name" class="form-control" id="exampleInputName1" placeholder="Tên vai trò" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm vai trò</button>
                        </div>
                    </div>
                </div>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName1">Chọn quyền cho vai trò<span style="color: red">*</span></label><br>
{{--                                <select class="js-example-basic-multiple" name="manufacture_id" aria-controls="order-listing" class="form-control">--}}
{{--                                    <option value="">-- Select permissions --</option>--}}
{{--                                    @foreach($permissions as $permission)--}}
{{--                                        <option value="{{$permission->id}}">{{$permission->name}}</option>--}}
{{--                                    @endforeach--}}

{{--                                </select>--}}
{{--                                <select class="js-example-basic-multiple" aria-controls="order-listing" style="width: 100%;" name="states[]" multiple="multiple">--}}
{{--                                    @foreach($permissions as $permission)--}}
{{--                                        <option value="{{$permission->id}}">{{$permission->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                                <select class="js-example-basic-multiple" aria-controls="order-listing" class="form-control" style="width: 100%;" name="states[]" multiple="multiple">
                                    <option value="">-- Chọn vai trò --</option>
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
{{--                                    {{Permissions::permissions($permissions)}}--}}
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".js-example-basic-multiple").select2({
                placeholder: "--",
                allowClear: true,
            });
        });
    </script>
@endsection
