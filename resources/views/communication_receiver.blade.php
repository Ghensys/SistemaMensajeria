@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Destinatario - {{ $communication->title }}</div>

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
                <select name="management" class="form-control" id="managements">
                    <option value="">Seleccionar</option>
                    @foreach($managements as $management)
                        <option value="{{ $management->id }}">{{ $management->description_management }}</option>
                    @endforeach
                </select>
                
                @if($errors->has('management'))
                  <span style="color:red;">{{ $errors->first('managements') }}</span>
                @endif

            </div>

            <div class="form-group">

                <label for="department">Departamento</label>
                <select name="department" class="form-control" id="departments">
                </select>

            </div>

            <div class="form-group">

                <label for="user">Destinatario</label>
                <select name="user" class="form-control" id="users">
                </select>

            </div>


            <input type="hidden" name="communication_id" value="{{ $communication->id }}">
            
            

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</div>

@endsection
