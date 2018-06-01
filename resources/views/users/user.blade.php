@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Gestión de Usuarios</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>

    &nbsp;&nbsp;&nbsp;<a href="{{ route('register') }}"><button class="btn btn-primary">Registrar</button></a>

    <table id="users-table" class="table table-striped">
        <thead>
            <th>
                id
            </th>
            <th>
                Nombre
            </th>
            <th>
                Email
            </th>
            <th>
                Institución
            </th>
            <th>
                Gerencia
            </th>
            <th>
                Departamento
            </th>
            <th>
                Rol
            </th>
            <th>
                Ultima Act.
            </th>
        </thead>
        <tbody></tbody>
    </table>
    
</div>

<!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


@endsection
