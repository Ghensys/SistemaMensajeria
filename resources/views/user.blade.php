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

    <table id="users-table" class="table">
        <thead>
            <th>
                id
            </th>
            <th>
                name
            </th>
            <th>
                email
            </th>
            <th>
                password
            </th>
            <th>
                institution_id
            </th>
            <th>
                management_id
            </th>
            <th>
                department_id
            </th>
            <th>
                role_id
            </th>
            <th>
                created_at
            </th>
            <th>
                updated_at
            </th>
        </thead>
        <tbody></tbody>
    </table>
</div>



@endsection
