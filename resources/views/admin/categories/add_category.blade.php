@extends('admin/layout/index')

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

        @if(session('Notify'))
            <div class='card card-inverse-success' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('Notify')}}
                    </p>
                </div>
            </div>
        @endif

        <div class="row grid-margin">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Add category</h4>
                        <form class="forms-sample" method="post" action="admin/categories/add_category">
{{--                            add token line to fix error form process--}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Menu <span style="color: red">*</span></label>
{{--                                <select name="menu_id" aria-controls="order-listing" class="form-control">--}}
{{--                                    <option value="">--</option>--}}
{{--                                    @foreach($categories as $cat)--}}
{{--                                        <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                                <input type="number" value="2" name="menu_id" class="form-control" readonly="true" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Category name <span style="color: red">*</span></label>
                                <input type="text" value="" name="name" class="form-control" id="exampleInputName1" placeholder="Category name" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Add category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
