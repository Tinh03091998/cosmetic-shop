@extends('admin/layout/index')
@section('title')
    Edit Manufacture
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

        @if(session('Message'))
            <div class='card card-inverse-success' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('Message')}}
                    </p>
                </div>
            </div>
        @endif

        <div class="row grid-margin">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Edit manufacture : {{$manufactures->name}}</h4>
                        <form class="forms-sample" method="post" action="admin/manufactures/edit_manufacture/{{$manufactures->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Manufacture name <span style="color: red">*</span></label>
                                <input type="text" value="{{$manufactures->name}}"
                                       name="name" class="form-control" id="exampleInputName1" placeholder="Manufacture name" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Add manufacture</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
