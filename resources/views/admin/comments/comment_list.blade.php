@extends('admin/layout/index')
@section('title')
    Comment List
@endsection
@section('content')
    <div class="content-wrapper">
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách bình luận</h4>

                        <p>Have total: <b><?php $count = DB::table('comments')->count(); echo $count?></b> bình luận</p><br>

                        <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 30px;">
                                            #
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 120px;">
                                            Tên khách hàng
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 150px;">
                                            Tên sản phẩm
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Nội dung bình luận
                                        </th>
{{--                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 100px;"><a href="admin/products/add_product"><input class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Add product"></a></th>--}}
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="jsgrid-grid-body" style="height: 307.625px;">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <?php
                                    $stt = 0
                                    ?>
                                    @foreach($comments as $comment)
                                        <?php
                                        $stt+=1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 30px;">{{$stt}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 120px;">{{$comment->products->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 150px;">{{$comment->customers->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$comment->content}}</td>

                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 100px;">
                                                <a href="admin/comments/delete_comment/{{$comment->id}}" onclick="return confirm('Are you sure to delete this comment')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Xóa"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container" >
                                <ul class="pagination" style="margin-top: 50px;">
                                    {!! $comments->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
