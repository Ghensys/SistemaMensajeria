@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Nuevo Mensaje</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <form action="" method="post" accept-charset="utf-8">

            {{ csrf_field() }}
                        
            <div class="form-group">
                <label for="communication_type">Tipo de Mensaje</label>
                <select name="communication_type" class="form-control">
                    <option value="">Seleccionar</option>
                    @foreach($communication_types as $communication_type)
                        <option value="{{ $communication_type->id }}">{{ $communication_type->description_communication_type }}</option>
                    @endforeach
                </select>
                
                @if($errors->has('communication_type'))
                  <span style="color:red;">{{ $errors->first('communication_type') }}</span>
                @endif

            </div>

          
            
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                
                @if($errors->has('title'))
                  <span style="color:red;">{{ $errors->first('title') }}</span>
                @endif
            
            </div>

            
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                   
                @if($errors->has('content'))
                  <span style="color:red;">{{ $errors->first('content') }}</span>
                @endif

            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</div>

<!script src="js/jquery.min.js'"><!/script>
<!script src="js/dropdown.js"><!/script>

@endsection
