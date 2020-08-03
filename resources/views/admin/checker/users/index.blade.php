@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.checker.users.title')</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{route('admin.checker.users.create')}}" class="btn btn-sm btn-outline-secondary">@lang('admin.checker.users.add')</a>
            </div>
        </div>
    </div>
    @include('notices.notice')
    <table class="table table-bordered" id="users-table" style="width:100%">
        <thead>
        <tr>
            <th>@lang('admin.checker.users.table.name')</th>
            <th>@lang('admin.checker.users.table.display_name')</th>
            <th>@lang('admin.checker.users.table.description')</th>
            <th>@lang('admin.checker.users.table.description')</th>
            <th>@lang('admin.checker.users.table.edit')</th>
        </tr>
        </thead>
    </table>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable( {
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
    </script>
@endpush
