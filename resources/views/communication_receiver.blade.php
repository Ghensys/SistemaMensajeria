@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Destinatarios - {{ $communication->title }}</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <form action="{{ url('communication_receiver') }}" method="post" accept-charset="utf-8">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="management">Gerencia</label>
                <select name="management" class="form-control" id="select-gerencia">
                    <option value="0">Seleccionar</option>
                    @foreach($managements as $management)
                        <option value="{{ $management->id }}">{{ $management->description_management }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="department">Departamento</label>
                <select name="department" class="form-control" id="select-departamento">
                    <option value="0">Seleccionar</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->description_department }}</option>
                    @endforeach
                </select>
            </div>

            <input type="text" name="communication_id" value="{{ $communication->id }}">
            
            {{ Form::open() }}
                <select name="management" class="form-control" id="management_id">
                    <option value="0">Seleccionar</option>
                    @foreach($managements as $management)
                        <option value="{{ $management->id }}">{{ $management->description_management }}</option>
                    @endforeach
                </select>
                <br>
                <select id="department_id" name="department_id">
                    <option>Debe escoger una empresa primero</option>
                </select>
            {{ Form::close()}}

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</div>

<!--script type="text/javascript">

    alert('hola');
    jQuery.noConflict();

    //1
    (
        //2
        function($)
        {
            //3
            $('#select-gerencia').on('change', function(e)
            {
                console.log(e);
                var gerencia = e.target.value;
                $.get('/ajax-departamento?gerencia=' + gerencia, function(data)
                {
                    console.log(data);
                }
                );
            });
        });
</script>
<script src="{{ asset('js/register.js') }}"></script-->

<script>
    $(document).ready(function(){
        $('#management_id').change(function(){
            $.get("{{ url('dropdown')}}",
            { option: $(this).val() },
            function(data) {
                $('#department_id').empty();
                $.each(data, function(key, element) {
                    $('#department_id').append("<option value='" + key + "'>" + element + "</option>");
                });
            });
        });
    });     
</script>

<!link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection
