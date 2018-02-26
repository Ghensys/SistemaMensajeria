@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="" accept-charset="utf-8">
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <select name="departamento" class="form-control">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_mensaje">Tipo de Mensaje</label>
                <select name="tipo_mensaje" class="form-control">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="prioridad">Prioridad</label>
                <select name="prioridad" class="form-control">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto</label>
                <input type="text" name="asunto" class="form-control">
            </div>
            <div class="form-group">
                <label for="cuerpo">Descripción</label>
                <input type="text" name="descripcion" class="form-control">
            </div>

        </form>
    </div>
</div>

@endsection
