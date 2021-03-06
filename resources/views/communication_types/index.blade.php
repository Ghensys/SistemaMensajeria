@extends('layouts.app')

@section('content')

<div class="panel panel-primary table-responsive">
    <div class="panel-heading">Gestión de Tipos de Mensaje</div>

    <div class="panel-body container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>

    &nbsp;&nbsp;&nbsp;<a href="{{ route('tipo_mensaje.new') }}"><button class="btn btn-primary">Registrar</button></a>

    <div style="padding: 2em;">
        <table id="communication-type-table" class="table table-striped table-sm">
            <thead>
                <th>
                    id
                </th>
                <th>
                    Tipo de Mensaje
                </th>
                <th>
                    Acción
                </th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
</div>

@endsection
