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
           


            {{ Form::select('management', $managements, null, ['id'=>'managements']) }}

            {{ Form::select('department', $departments, null, ['id'=>'departments']) }}
                








            <input type="text" name="communication_id" value="{{ $communication->id }}">
            
            

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</div>


<!script src="js/jquery.min.js'"><!/script>
<!script src="js/dropdown.js"><!/script>

<!--script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script-->

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script-->


@endsection
