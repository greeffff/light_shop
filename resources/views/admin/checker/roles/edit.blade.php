@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.checker.roles.edit.title')</h1>
    </div>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">@lang('admin.checker.roles.edit.name')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="display_name">@lang('admin.checker.roles.edit.display_name')</label>
                <input type="text" class="form-control" id="display_name" name="display_name" value="{{$role->display_name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="description">@lang('admin.checker.roles.edit.description')</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$role->description}}">
        </div>
        <div class="form-group">
            <label for="inputAddress2">@lang('admin.checker.roles.edit.permissions')</label>
            <select class="form-control select2" id="permissions" name="permissions[]" multiple>
                @foreach($role->perm_roles as $perm)
                    <option value="{{$perm->permission_id}}" selected>{{$perm->permission->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-outline-secondary">@lang('admin.checker.roles.edit.update')</button>
    </form>
@endsection
@push('scripts')
    <script>
        $('#permissions').select2({
            placeholder: 'Выберете значение',
            ajax: {
                dataType: 'json',
                method: 'POST',
                url: '{{ route('admin.select.permissions') }}',
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
