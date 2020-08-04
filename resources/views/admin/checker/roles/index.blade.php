@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.checker.roles.title')</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addModal">@lang('admin.checker.roles.add')</button>
            </div>
        </div>
    </div>
    @include('notices.notice')
    <table class="table table-bordered" id="role-table" style="width:100%">
        <thead>
        <tr>
            <th>@lang('admin.checker.roles.table.name')</th>
            <th>@lang('admin.checker.roles.table.display_name')</th>
            <th>@lang('admin.checker.roles.table.description')</th>
            <th>@lang('admin.checker.roles.table.permissions')</th>
            <th>@lang('admin.checker.roles.table.edit')</th>
        </tr>
        </thead>
    </table>
    <div class="modal fade lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('admin.checker.roles.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModal">@lang('admin.checker.roles.create.add')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="text-center">
                                @csrf
                                <label for="name">@lang('admin.checker.roles.create.name')</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <label for="display_name">@lang('admin.checker.roles.create.display_name')</label>
                                <input type="text" name="display_name" id="display_name" class="form-control">
                                <label for="description">@lang('admin.checker.roles.create.description')</label>
                                <input type="text" name="description" id="description" class="form-control">
                                <label for="description">@lang('admin.checker.roles.create.permissions')</label>
                                <select class="form-control select2" name="permissions[]" id="permissions" style="width: 100%" multiple>
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-secondary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
           let table = $('#role-table').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "headers": {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": "{{route('admin.checker.roles.dt-data')}}",
                    "type": "POST"
                },
                "columns": [
                    { "data": "name" },
                    { "data": "display_name" },
                    { "data": "description" },
                    { "data": "permissions" },
                    { "data": "edit" },
                ]
            } );
        } );
        $('#role-table').on('click', '.remote', function() {
            records_id = $(this).attr('data-content');
            $.confirm({
                title: 'Внимание. Удаление.',
                content: 'Вы действительно хотите удалить запись?',
                buttons: {
                    'Удалить':{
                        btnClass: 'btn-red',
                        action: function () {
                            $.ajax({
                                url: '{{route('admin.checker.roles.delete')}}',
                                method: 'POST',
                                data: {id: records_id},
                                headers: {
                                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (res) {
                                    if (res.success) {
                                        $.alert({
                                            title: "Удаление",
                                            content: 'Запись успешно удалена!',
                                            type: 'dark'
                                        });
                                        table.ajax.reload();
                                    }
                                },
                                error: function () {
                                    $.alert({
                                        title: 'Ошибка!',
                                        content: 'Обратитесь к администратору',
                                        type: 'red'
                                    });
                                }
                            });
                        },
                    },
                    'Отменить': function () {
                    },
                }
            });
        });
    </script>
@endpush
