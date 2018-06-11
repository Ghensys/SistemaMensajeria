@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Actualizar Departamento</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/departamento/update">
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $departments->id }}">

            <div class="form-group">

                <label for="management" class="col-md-4 control-label">Gerencia</label>

                <div class="col-md-6">
                    <select name="management_id" class="form-control" id="managements">
                        <option value="">Seleccionar</option>
                        @foreach($managements as $management)
                            @if($departments->management_id == $management->id)
                                <option value="{{ $management->id }}" selected="selected">{{ $management->description_management }}</option>
                            @else
                                <option value="{{ $management->id }}">{{ $management->description_management }}</option>
                            @endif
                        @endforeach
                    </select>
                    
                </div>
                
                @if($errors->has('management'))
                  <span style="color:red;">{{ $errors->first('managements') }}</span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('description_department') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Descripción</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="description_department" value="{{ $departments->description_department }}" required autofocus>

                    @if ($errors->has('description_department'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description_department') }}</strong>
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
