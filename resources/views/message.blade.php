@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading"> Asunto: {{ $comm[0]->title }} </div>

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
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="td">
                        {{ $comm[0]->content }}
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>

@endsection