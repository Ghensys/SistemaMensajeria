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
                    <li @if($comm->status_communication['id'] == 3) class="active" @endif >
                        <a href="/mi_mensaje/{{ $comm->id }}">
                            
                            <b>Para: </b>{{ $comm->user['name'] }}
                            <b>/ Asunto: </b>{{ $comm->communication_type['description_communication_type'] }}
                            <b>/ Enviado: </b>{{ $comm->created_at }}
                            <b>/ Leido: </b>@if($comm->read)
                                        {{ $comm->read }}
                                    @endif
                                    @if(!$comm->read)
                                        Sin leer
                                    @endif
                            <b>/ Estado: </b>{{ $comm->status_communication['description_status_communication'] }}
                        </a>
                    </li>
                </ul>
                
                
            @endforeach

    </div>
</div>

@endsection
