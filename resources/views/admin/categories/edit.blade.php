@extends('admin.layouts.admin')
@section('content_admin')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('admin.categories.edit.title')</h1>
    </div>
    <form action="{{route('admin.categories.update',['category'=>$category->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">@lang('admin.categories.edit.name')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="display_name">@lang('admin.categories.edit.parent_name')</label>
                <select class="form-control select2" id="parent_id" name="parent_id">
                    <option value="{{$category->parent_id}}" selected>{{$category->parent->name}}</option>
                </select>
            </div>
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="description">@lang('admin.categories.edit.edit.icon')</label>--}}
{{--            <input type="text" class="form-control" id="description" name="description" value="{{$role->description}}">--}}
{{--        </div>--}}
        <button type="submit" class="btn btn-outline-secondary">@lang('admin.categories.edit.update')</button>
    </form>
@endsection
@push('scripts')
    <script>
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
