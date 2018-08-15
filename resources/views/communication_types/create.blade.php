@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Crear Tipo de Mensaje</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/tipo_mensaje/new">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nombre</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="description_communication_type" required autofocus>

                    @if ($errors->has('description_communication_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description_communication_type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                
                <label for="reply_id" class="col-md-4 control-label">Indique si este tipo de mensaje se responde</label>

                <div class="col-md-6">
                    
                    <select name="reply_id" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>

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
