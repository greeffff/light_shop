@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.products.title')</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{route('admin.checker.users.create')}}" class="btn btn-sm btn-outline-secondary">@lang('admin.products.add')</a>
            </div>
        </div>
    </div>
    @include('notices.notice')
    <table class="table table-bordered" id="products-table" style="width:100%">
        <thead>
        <tr>
            <th>@lang('admin.products.table')</th>
            <th>@lang('admin.products.table')</th>
            <th>@lang('admin.products.table.table')</th>
            <th>@lang('admin.products.table.table')</th>
            <th>@lang('admin.products.table.table')</th>
        </tr>
        </thead>
    </table>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
           let table =  $('#users-table').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "headers": {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": "{{route('admin.checker.users.dt-data')}}",
                    "type": "POST"
                },
                "columns": [
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "roles" },
                    { "data": "created_at" },
                    { "data": "edit" },
                ]
            } );
        } );
        $('#users-table').on('click', '.remote', function() {
            records_id = $(this).attr('data-content');
            $.confirm({
                title: 'Внимание. Удаление.',
                content: 'Вы действительно хотите удалить запись?',
                buttons: {
                    'Удалить':{
                        btnClass: 'btn-red',
                        action: function () {
                            $.ajax({
                                url: '{{route('admin.checker.users.delete')}}',
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
