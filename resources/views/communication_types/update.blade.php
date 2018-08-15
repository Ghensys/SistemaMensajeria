@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Actualizar Tipo de Mensaje</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/tipo_mensaje/update">
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $communication_types->id }}">

            <div class="form-group{{ $errors->has('description_department') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Descripción</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="description_communication_type" value="{{ $communication_types->description_communication_type }}" required autofocus>

                    @if ($errors->has('description_communication_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description_communication_type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('reply_id') ? ' has-error' : '' }}">
                
                <label for="reply_id" class="col-md-4 control-label">Indique si este tipo de mensaje se responde</label>

                <div class="col-md-6">
                    
                    <select name="reply_id" class="form-control">
                        @foreach($replies as $reply)
                            @if($communication_types->reply_id == $reply->id)
                                <option value="{{ $reply->id }}" selected="selected">{{ $reply->description_reply }}</option>
                            @else
                                <option value="{{ $reply->id }}">{{ $reply->description_reply }}</option>
                            @endif
                        @endforeach
                    </select>

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
