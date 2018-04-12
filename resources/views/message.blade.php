@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading"> Mensaje - {{ $comm[0]->title }} </div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-hover">
            <tbody>
                <tr>
                    <td>
                        Tipo de Mensaje: {{ $comm[0]->communication_type['description_communication_type'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        De: {{ $comm[0]->user['name'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Asunto: {{ $comm[0]->title }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha de Recepcion: {{ $comm[0]->created_at }}
                    </td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td colspan="2" rowspan="3">
                        Mensaje: {{ $comm[0]->content }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="3">
                        <a href="../messageFiles/{{ $comm[0]->doc_file }}" target="_blank">{{ $comm[0]->doc_file }}</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <button class="btn btn-primary">Seleccionar Prioridad</button>
                    </td>
                    <td>
                        <button class="btn btn-primary">Asignar Tarea</button>
                    </td>
                    <td>
                        <button class="btn btn-primary">Responder Mensaje</button>
                    </td>
                    <td>
                        <button class="btn btn-primary">Responder Mensaje</button>
                    </td>
                </tr>
            </tbody>
            
        </table>

        <div>
            
        </div>
        
    </div>
</div>

@endsection