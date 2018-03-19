@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Destinatarios - {{ $communication->title }}</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <form action="{{ url('communication_receiver') }}" method="post" accept-charset="utf-8">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="management">Gerencia</label>
                <select name="management" class="form-control" id="select-gerencia">
                    <option value="0">Seleccionar</option>
                    @foreach($managements as $management)
                        <option value="{{ $management->id }}">{{ $management->description_management }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="department">Departamento</label>
                <select name="department" class="form-control" id="select-departamento">
                    <option value="0">Seleccionar</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->description_department }}</option>
                    @endforeach
                </select>
            </div>

            <input type="text" name="communication_id" value="{{ $communication->id }}">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


@endsection
