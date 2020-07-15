@extends('admin/layout/index')

@section('content')
    <div class="content-wrapper">
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách danh mục</h4>

                        <p>Có tất cả <b><?php $count = DB::table('categories')->count(); echo $count?></b> danh mục</p><br>

                        <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tbody><tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">
                                            STT
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Tên danh mục
                                        </th>
{{--                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 150px;">--}}
{{--                                            Mã menu--}}
{{--                                        </th>--}}
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><a href="admin/categories/add_category"><input class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Thêm danh mục"></a></th>
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="jsgrid-grid-body" style="height: 307.625px;">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <?php
                                    $serial = 0
                                    ?>
                                    @foreach($categories as $cat)
                                        <?php
                                        $serial+=1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><?php echo $serial;?></td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$cat->name}}</td>
{{--                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 150px;">--}}
{{--                                                {{$cat->menu_id}}--}}
{{--                                                @if(isset($cat->parent_id))--}}
{{--                                                    @foreach($categories as $category)--}}
{{--                                                        @if($category->parent_id == $category->id)--}}
{{--                                                            {{$category->name}}--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                @else--}}
{{--                                                    {{$category}}--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                                                <a href="admin/categories/edit/{{$cat->id}}"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Sửa"></a>
                                                <a href="admin/categories/delete/{{$cat->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Xóa"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container" >
                                <ul class="pagination" style="margin-top: 50px;">
                                    {!! $categories->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
