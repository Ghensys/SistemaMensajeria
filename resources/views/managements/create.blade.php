@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Crear Gerencia</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/gerencia/new">
            {{ csrf_field() }}

            <div class="form-group">
                
                <label for="institution" class="col-md-4 control-label">Institución</label>

                <div class="col-md-6">
                    
                    <select name="institution_id" class="form-control">
                        <option value="">Seleccionar</option>
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}">{{ $institution->description_institution }}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Descripción</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="description_management" required autofocus>

                    @if ($errors->has('description_management'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description_management') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4"><br>
                    <button type="submit" class="btn btn-primary">
                        Registrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
