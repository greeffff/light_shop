@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.checker.users.create.title')</h1>
    </div>
    <form action="{{route('admin.checker.users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">@lang('admin.checker.users.create.name')</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="email">@lang('admin.checker.users.create.email')</label>
                <input type="text" class="form-control" id="email" name="email" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="description">@lang('admin.checker.users.create.password')</label>
            <input type="text" class="form-control" id="password" name="password" value="">
        </div>
        <div class="form-group">
            <label for="inputAddress2">@lang('admin.checker.users.create.roles')</label>
            <select class="form-control select2" id="roles" name="roles[]" multiple>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-secondary">@lang('admin.checker.users.create.add')</button>
    </form>
@endsection
@push('scripts')
    <script>
        $('#roles').select2({
            placeholder: 'Выберете значение',
            ajax: {
                dataType: 'json',
                method: 'POST',
                url: '{{ route('admin.select.roles') }}',
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
