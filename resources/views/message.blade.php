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
            </tbody>
        </table>
        <hr>
        <table style="border: 1px;">
            <tbody>
                @foreach($comm as $cm)
                    <tr>
                        <td>
                            De: {{ $cm->user['name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Mensaje: {{ $cm->content }}
                        </td>
                    </tr>
                    @if($cm->doc_file)
                    <tr>
                        <td>
                            Archivo Adjunto: <a href="../messageFiles/{{ $cm->doc_file }}" target="_blank">{{ $cm->doc_file }}</a>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($comm[0]->user['id'] != auth()->user()->id)

            <table class="table">
                    
                <tbody>
                    <tr>

                        @if($i != 1)

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