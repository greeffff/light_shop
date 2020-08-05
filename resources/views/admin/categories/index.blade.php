@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.categories.title')</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addModal">@lang('admin.categories.add')</button>
            </div>
        </div>
    </div>
    @include('notices.notice')
    <table class="table table-bordered" id="permission-table" style="width:100%">
        <thead>
        <tr>
            <th>@lang('admin.categories.table.name')</th>
            <th>@lang('admin.categories.table.parent_name')</th>
{{--            <th>@lang('admin.categories.table.description')</th>--}}
            <th>@lang('admin.categories.table.edit')</th>
        </tr>
        </thead>
    </table>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">                  <div class="modal-header">
                        <h5 class="modal-title" id="addModal">@lang('admin.checker.permissions.create.add')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="text-center">
                                @csrf
                                <label for="name">@lang('admin.categories.create.name')</label>
                                <input type="text" class="form-control" id="name" name="name" value="">
                                <label for="email">@lang('admin.categories.create.parent_name')</label>
                                <select class="form-control select2" id="parent_id" name="parent_id">
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
            let table =  $('#permission-table').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "headers": {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    "url": "{{route('admin.categories.dt-data')}}",
                    "type": "POST"
                },
                "columns": [
                    { "data": "name" },
                    { "data": "parent_id" },
                    // { "data": "description" },
                    { "data": "edit" },
                ]
            } );
        } );
        $('#parent_id').select2({
            placeholder: 'Выберете значение',
            ajax: {
                dataType: 'json',
                method: 'POST',
                url: '{{ route('admin.select.categories') }}',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                delay: 400,
                processResults: function (results) {
                    return {
                        results: results
                    };
                },
            }
        });
    </script>
@endpush
