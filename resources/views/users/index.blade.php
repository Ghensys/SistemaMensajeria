@extends('layouts.app')

@section('content')

<div class="panel panel-primary table-responsive">
    <div class="panel-heading">Gestión de Usuarios</div>

    <div class="panel-body container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>

    &nbsp;&nbsp;&nbsp;<a href="{{ route('register') }}"><button class="btn btn-primary">Registrar</button></a>

    <div style="padding: 2em;">
        <table id="users-table" class="table table-striped table-sm">
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
                    Acción
                </th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
</div>

<!-- DataTables -->
    <!script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"><!/script>
        <!-- Bootstrap JavaScript -->
    <!script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"><!/script>

    


@endsection
