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
                    <li @if($comm->status_communication['id'] == 2) class="active" @endif >
                        <a href="/mi_mensaje/{{ $comm->id }}">
                            
                            Para: {{ $comm->user['name'] }} /
                            Asunto: {{ $comm->communication_type['description_communication_type'] }} /
                            Enviado: {{ $comm->created_at }} /
                            Leido: @if($comm->read)
                                        {{ $comm->read }}
                                    @endif
                                    @if(!$comm->read)
                                        Sin leer
                                    @endif
                        </a>
                    </li>
                </ul>
                
                
            @endforeach

    </div>
</div>

@endsection
