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
                    <li>
                        <a href="/mensaje/{{ $comm->id }}">
                            From: {{ $comm->user['name'] }} /
                            Title: {{ $comm->title }} /
                            Status: {{ $comm->status_communication['description_status_communication'] }} /
                            Priority: {{ $comm->priority['description_priority'] }}
                        </a>
                    </li>
                </ul>
                
                
            @endforeach

    </div>
</div>

@endsection
