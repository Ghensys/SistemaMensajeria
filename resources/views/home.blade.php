@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <!--div class="panel-heading"></div-->

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        Mensaje Enviado!

        <!You are logged in!>
    </div>
</div>

@endsection
