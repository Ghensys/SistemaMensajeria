@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading"> Responder Mensaje - {{ $data[0]->title }} </div>

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
                        Tipo de Mensaje: {{ $data[0]->communication_type['description_communication_type'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        De: {{ $data[0]->user['name'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Asunto: {{ $data[0]->title }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha de Recepcion: {{ $data[0]->created_at }} &nbsp;&nbsp;&nbsp; Estado: {{ $data[0]->status_communication['description_status_communication'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        
        <form action="{{ url('reply_message') }}" method="post" accept-charset="utf-8">

            {{ csrf_field() }}
        
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
                    <tr>
                        <td>
                            <a href="../messageFiles/{{ $cm->doc_file }}" target="_blank">{{ $cm->doc_file }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>

                    <input type="hidden" name="last_message[]" value="{{ $cm->id }}">
                @endforeach
            </tbody>
        </table>


            <input type="hidden" name="communication_id" value="{{ $data[0]->id }}">

            <input type="hidden" name="user_receiver" value="{{ $comm[$i]->user_id }}">
            
            <div class="form-group">

                <label for="Reply">Respuesta</label>
                <textarea name="reply" rows="5" class="form-control"></textarea>
            
            </div>

            <div class="form-group">
                <label for="file">Adjuntar Archivo</label>
                <input type="file" name="file">
            </div>

            <div class="form-group">
                
                <button class="btn btn-primary" type="submit">Responder</button>

            </div>

        </form>

        <div>
            
        </div>
        
    </div>
</div>

@endsection