@extends('admin/layout/index')
@section('title')
    Edit Role
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

        <form class="forms-sample" method="post" action="admin/roles/edit_role/{{$role->id}}">
            <div class="row grid-margin">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-align: center;font-size: 27px">Sửa vai trò : {{$role->name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên vai trò <span style="color: red">*</span></label>
                                <input type="text" value="{{$role->name}}"
                                       name="name" class="form-control" id="exampleInputName1"
                                       placeholder="Tên vai trò"/>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Sửa vai trò</button>
                        </div>
                    </div>
                </div>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName1">Chọn quyền cho vai trò<span
                                        style="color: red">*</span></label><br>
                                <select class="js-example-basic-multiple" style="width: 100%;" name="states[]"
                                        multiple="multiple">
                                    @foreach($permissions as $permission)
                                        <option
                                            @foreach($role->getPermissionNames() as $permissionRole)
                                            @if($permissionRole == $permission->name)
                                            {{'selected'}}
                                            @endif
                                            @endforeach
                                            value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
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
        $(document).ready(function () {
            $(".js-example-basic-multiple").select2({
                placeholder: "--",
                allowClear: true,
            });
        });
    </script>
@endsection
