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
                {{ $comm }} /
                
        	@endforeach

    </div>
</div>

@endsection
