@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Mensajes Enviados</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            @foreach($communications as $comm)
                <ul class="nav nav-pills nav-stacked">
                    <li @if($comm->status_communication['id'] == 1) class="active" @endif >
                        <a href="/mensaje/{{ $comm->id }}">
                            Para: {{ $comm }}
                        </a>
                    </li>
                </ul>
                
                
            @endforeach

    </div>
</div>

@endsection
