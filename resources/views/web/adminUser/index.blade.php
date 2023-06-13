@extends('layouts.mainAdminSite')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
@include('web.adminUser.parts._widget')
@include('web.alerts.error')
@include('web.adminUser.parts._clientList')
@include('web.adminUser.parts._pendingOrders')
@include('web.adminUser.parts._chart')
@include('web.adminUser.parts._addClientDashboard')
@include('web.adminUser.parts._stock')
{{-- @include('admin.parts._adminSite')--}}
{{-- @include('admin.parts._listPendingServiceAdminSite')--}}
{{-- @include('admin.parts._listPendingServiceSponsorAdminSite')--}}
{{-- @include('admin.parts._listClientAdminSite') --}}
{{-- @include('admin.parts._listServiceAdminSite')  --}}
@endsection

@section('js')
<script src="{{ asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection