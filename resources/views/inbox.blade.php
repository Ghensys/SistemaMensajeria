@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Bandeja de Entrada</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            @foreach($communications as $comm)
                <ul class="nav nav-pills nav-stacked">
                    <li @if($comm->status_communication['id'] == 1) class="active" @endif @if($comm->status_communication['id'] != 1) class="disabled" @endif >
                        <a href="/mensaje/{{ $comm->id }}">
                            De: {{ $comm->user['name'] }} /
                            Asunto: {{ $comm->title }} /
                            Fecha: {{ $comm->created_at }} /
                            Estado: {{ $comm->status_communication['description_status_communication'] }} /
                            Prioridad: {{ $comm->priority['description_priority'] }}
                        </a>
                    </li>
                </ul>
                
                
            @endforeach

    </div>
</div>

@endsection
