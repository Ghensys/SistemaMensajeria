@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading"> Responder Mensaje - {{ $comm[0]->title }} </div>

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
                    <td colspan="3">
                        Mensaje: {{ $comm[0]->content }}
                    </td>
                </tr>                
            </tbody>
        </table>
        <form action="{{ url('reply_message') }}" method="post" accept-charset="utf-8">

            {{ csrf_field() }}

            <input type="hidden" name="communication_receiver_id" value="{{ $comm[0]->id }}">
            
            <div class="form-group">

                <label for="title">Respuesta</label>
                <textarea name="reply_message" rows="5" class="form-control"></textarea>
            
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