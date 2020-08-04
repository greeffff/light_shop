@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.checker.permissions.title')</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addModal">@lang('admin.checker.permissions.add')</button>
            </div>
        </div>
    </div>
    @include('notices.notice')
    <table class="table table-bordered" id="permission-table" style="width:100%">
        <thead>
        <tr>
            <th>@lang('admin.checker.permissions.table.name')</th>
            <th>@lang('admin.checker.permissions.table.display_name')</th>
            <th>@lang('admin.checker.permissions.table.description')</th>
            <th>@lang('admin.checker.permissions.table.edit')</th>
        </tr>
        </thead>
    </table>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.checker.permissions.store')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModal">@lang('admin.checker.permissions.create.add')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <div class="text-center">
                                @csrf
                                <label for="name">@lang('admin.checker.permissions.create.name')</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <label for="display_name">@lang('admin.checker.permissions.create.display_name')</label>
                                <input type="text" name="display_name" id="display_name" class="form-control">
                                <label for="description">@lang('admin.checker.permissions.create.description')</label>
                                <input type="text" name="description" id="description" class="form-control">
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.checker.permissions.update')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal">@lang('admin.checker.permissions.create.add')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="text-center">
                                @csrf
                                <label for="name">@lang('admin.checker.permissions.create.name')</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <label for="display_name">@lang('admin.checker.permissions.create.display_name')</label>
                                <input type="text" name="display_name" id="display_name" class="form-control">
                                <label for="description">@lang('admin.checker.permissions.create.description')</label>
                                <input type="text" name="description" id="description" class="form-control">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-secondary">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
 <script>
     $(document).ready(function() {
        let table =  $('#permission-table').DataTable( {
             "processing": true,
             "serverSide": true,
             "ajax": {
                 "headers": {
                     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                 },
                 "url": "{{route('admin.checker.permissions.dt-data')}}",
                 "type": "POST"
             },
             "columns": [
                 { "data": "name" },
                 { "data": "display_name" },
                 { "data": "description" },
                 { "data": "edit" },
             ]
         } );
     } );
     $('#editModal').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)
         var name = button.data('name')
         var display = button.data('display')
         var description = button.data('description')
         var id = button.data('id');
         var modal = $(this)
         modal.find('.modal-title').text('Редактирование ' + name)
         modal.find('#name').val(name)
         modal.find('#display_name').val(display)
         modal.find('#description').val(description)
         modal.find('#id').val(id)
     })
     $('#permission-table').on('click', '.remote', function() {
         records_id = $(this).attr('data-content');
         $.confirm({
             title: 'Внимание. Удаление.',
             content: 'Вы действительно хотите удалить запись?',
             buttons: {
                 'Удалить':{
                     btnClass: 'btn-red',
                     action: function () {
                         $.ajax({
                             url: '{{route('admin.checker.permissions.delete')}}',
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
