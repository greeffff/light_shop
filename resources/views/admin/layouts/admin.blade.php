@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
@endpush
@section('content')
    <div class="row">
    @include('admin.layouts.sidebar')
    <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
    @yield('content_admin')
    </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
@endpush
