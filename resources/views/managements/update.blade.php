@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Actualizar Gerencia</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/gerencia/update">
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $managements->id }}">

            <div class="form-group{{ $errors->has('description_management') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Descripción</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="description_management" value="{{ $managements->description_management }}" required autofocus>

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
                        Actualizar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
