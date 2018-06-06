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


                    @if($comm->status_communication['id'] != 4)

                        @php
                            $prueba = date_create(substr($comm->created_at, 0, 10));
                            $prueba2 = date_create(date('Y-m-d'));
                            $dias = date_diff($prueba, $prueba2)->format('%R%a');
                        @endphp

                        @switch($dias)
                            @case($dias < $settimes[0]->day)
                                @php($alert = "green")
                                @break

                            @case($dias < $settimes[1]->day)
                                @php($alert = "yellow")
                                @break

                            @default
                                @php($alert = "red")

                        @endswitch

                    @endif
                    

                    <li>
                        <a href="/mensaje/{{ $comm->communication['id'] }}" @if($comm->status_communication['id'] != 4) style="color:{{ $alert }}" @endif>
                             De: {{ $comm->user['name'] }} /
                            Asunto: {{ $comm->communication['title'] }} /
                            Fecha: {{ $comm->created_at }} /
                            Estado: {{ $comm->status_communication['description_status_communication'] }} 
                        </a>
                    </li>
                </ul>
                
                
            @endforeach

    </div>
</div>

@endsection
