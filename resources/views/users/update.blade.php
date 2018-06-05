@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Register</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nombre Completo</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Dirección de Correo</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <input type="hidden" name="institution_id" value="1">

            <div class="form-group">

                <label for="management" class="col-md-4 control-label">Gerencia</label>

                <div class="col-md-6">
                    <select name="management_id" class="form-control" id="managements">
                        <option value="">Seleccionar</option>
                        @foreach($managements as $management)
                            <option value="{{ $management->id }}">{{ $management->description_management }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
                @if($errors->has('management'))
                  <span style="color:red;">{{ $errors->first('managements') }}</span>
                @endif

            </div>

            <div class="form-group">

                <label for="department" class="col-md-4 control-label">Departamento</label>

                <div class="col-md-6">
                    <select name="department_id" class="form-control" id="departments">
                    </select>
                    
                </div>

            </div>

            <div class="form-group">

                <label for="role" class="col-md-4 control-label">Rol</label>

                <div class="col-md-6">
                    <select name="role_id" class="form-control" id="role">
                        <option value="">Seleccionar</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->description_role }}</option>
                        @endforeach
                    </select>
                    
                </div>

            </div>

            

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4"><br>
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
