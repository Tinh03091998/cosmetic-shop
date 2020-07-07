@extends('admin/layout/index')
@section('title')
    Role List
@endsection
@section('content')
    <div class="content-wrapper">
        @if(session('message'))
            <div class='card card-inverse-success' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('message')}}
                    </p>
                </div>
            </div>
        @endif
        <div class="row grid-margin">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách vai trò</h4>

                        <p>Có tất cả: <b><?php $count = DB::table('roles')->count(); echo $count?></b> vai trò</p><br>

                        <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 10px;">
                                            #
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 50px;">
                                            Tên vai trò
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 150px;">
                                            Quyền hạn
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center"
                                            style="width: 50px;"><a href="admin/roles/add_role"><input
                                                    class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button"
                                                    type="button" title="Add role"></a></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-grid-body" style="height: 307.625px;">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <?php
                                    $stt = 0
                                    ?>
                                    @foreach($roles as $role)
                                        <?php
                                        $stt += 1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 10px;"><?php echo $stt;?></td>
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 50px;"><span
                                                    class="btn btn-primary">{{$role->name}}</span></td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 150px;">
                                                @if($role->getPermissionNames()->isEmpty())
                                                    <span class="btn btn-danger">Chưa có quyền</span>
                                                @else
                                                    @if(count($role->getPermissionNames()) == DB::table('permissions')->count())
                                                        <span class="btn btn-success">Tất cả quyền</span>
                                                    @else
                                                        @foreach($role->getPermissionNames() as $permission)
                                                            <span
                                                                class="btn btn-outline-primary btn-fw">{{$permission}}</span>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                style="width: 50px;">
                                                <a href="admin/roles/edit_role/{{$role->id}}"><input
                                                        class="jsgrid-button jsgrid-edit-button" type="button"
                                                        title="Sửa vai trò"></a>
                                                <a href="admin/roles/delete_role/{{$role->id}}" onclick="return confirm('Are you sure to delete this role')"><input
                                                        class="jsgrid-button jsgrid-delete-button" type="button"
                                                        title="Xóa vai trò"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container">
                                <ul class="pagination" style="margin-top: 50px;">
                                    {!! $roles->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
