@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Nuevo Mensaje</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group row">
                
                <div>
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirigido a:</label>
                </div>

                <div class="col-xs-4">
                    <label for="management">Gerencia</label>
                    <select name="management" class="form-control" id="managements">
                        <option value="">Seleccionar</option>
                        @foreach($managements as $management)
                            <option value="{{ $management->id }}">{{ $management->description_management }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
                @if($errors->has('management'))
                  <span style="color:red;">{{ $errors->first('managements') }}</span>
                @endif
                
                <div class="col-xs-4">
                    <label for="department">Departamento</label>
                    <select name="department" class="form-control" id="departments">
                    </select>
                </div>

                <div class="col-xs-4">
                    <label for="user">Usuario</label>
                    <select name="user" class="form-control" id="users">
                    </select>
                </div>
            </div>

            <hr>
                        
            <div class="form-group">
                <label for="communication_type">Tipo de Mensaje</label>
                <select name="communication_type" class="form-control">
                    <option value="">Seleccionar</option>
                    @foreach($communication_types as $communication_type)
                        @if(Form::old('communication_type') == $communication_type->id)
                            <option value="{{ $communication_type->id }}" selected>{{ $communication_type->description_communication_type }}</option>
                        @else
                            <option value="{{ $communication_type->id }}">{{ $communication_type->description_communication_type }}</option>
                        @endif
                        
                    @endforeach
                </select>
                
                @if($errors->has('communication_type'))
                  <span style="color:red;">{{ $errors->first('communication_type') }}</span>
                @endif

            </div>

          
            
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                
                @if($errors->has('title'))
                  <span style="color:red;">{{ $errors->first('title') }}</span>
                @endif
            
            </div>

            
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                   
                @if($errors->has('content'))
                  <span style="color:red;">{{ $errors->first('content') }}</span>
                @endif

            </div>

            <div class="form-group">
                <label for="file">Adjuntar Archivo</label>
                <input type="file" name="file">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</div>

@endsection
