@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-2">
                            <a href="{{ route('add.employee') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Agregar</a>
                        </div>
                        <div class="col-lg-9 col-xl-10">
                            <form class="float-lg-end">
                                <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                    <div class="col">
                                        <div class="btn-group" role="group">
                                            <h6>Listado de Usuarios</h6>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Teléfono</th>
                            <th>Usuario Actual</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }} </td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                @if($employee->address)
                                {{ Str::limit($employee->address, 35) }}
                                @else
                                <p class="text text-danger">Completar Datos</p>
                                @endif
                            </td>
                            <td>
                                @if($employee->phone)
                                {{ $employee->phone }}
                                @else
                                <p class="text text-danger">Completar Datos</p>
                                @endif
                            </td>
                            <td>
                                @if($employee->isOnline == '1')
                                <a href="{{ route('select.employee', $employee) }}" type="button" class="btn btn-outline-primary px-3">Deseleccionar</a>
                                @else
                                <a href="{{ route('select.employee', $employee) }}" type="button" class="btn btn-outline-primary px-3">Seleccionar</a>
                                @endif
                            </td>
                            <td>
                                <div class="col">
                                    <a href="" type="button" class="btn btn-outline-danger"><i class='lni lni-trash me-0'></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal-"><i class='lni lni-eye me-0'></i>
                                    </button>
                                    <a href="" type="button" class="btn btn-outline-primary"><i class='lni lni-pencil-alt me-0'></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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