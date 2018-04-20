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
                        Fecha de Recepcion: {{ $comm[0]->created_at }} &nbsp;&nbsp;&nbsp; Estado: {{ $comm[0]->status_communication['description_status_communication'] }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Mensaje: {{ $comm[0]->content }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="../messageFiles/{{ $comm[0]->doc_file }}" target="_blank">{{ $comm[0]->doc_file }}</a>
                    </td>
                </tr>
                
            </tbody>
        </table>

        @if($comm[0]->status_communication_id >= 3)

            <table class="table-hover">
                <tbody>
                    <tr>
                        <td colspan="3">
                            Respuesta:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            {{ $comm[0]->answer }}
                        </td>
                    </tr>
                </tbody>
            </table>
                    
        @endif           

        @if($comm[0]->user['id'] != auth()->user()->id)

            <table class="table">
                    
                <tbody>
                    <tr>
                        <td>
                            <button class="btn btn-primary disabled">Seleccionar Prioridad</button>
                        </td>
                        <td>
                            <button class="btn btn-primary disabled">Asignar Tarea</button>
                        </td>

                        @if($comm[0]->status_communication_id < 3)

                            <td>
                                <a href="/responder_mensaje/{{ $comm[0]->id }}" class="btn btn-primary">Responder Mensaje</a>
                            </td>
                            
                        @endif

                    </tr>
                </tbody>
                    
            </table>

        @endif
        
    </div>
</div>

@endsection