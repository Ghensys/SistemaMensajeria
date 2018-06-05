$("#managements").change(function(event)
{
	$.get("dropdown/"+event.target.value+"",function(response,managements)
	{
		$('#departments').removeAttr('disabled');

		$("#departments").empty();
		$("#departments").append("<option value='0' disabled selected>Seleccionar</option>");
		for(i=0; i<response.length; i++)
		{
			$("#departments").append("<option value='"+response[i].id+ "'> "+response[i].description_department+"</option>");
		}

		//console.log(response);
	});
});

$("#departments").change(function(event)
{
	$.get("dropdown2/"+event.target.value+"",function(response,departments)
	{
		$('#users').removeAttr('disabled');

		$("#users").empty();
		$("#users").append("<option value='0' disabled selected>Seleccionar</option>");
		for(i=0; i<response.length; i++)
		{
			$("#users").append("<option value='"+response[i].id+ "'> "+response[i].name+"</option>");
		}

		//console.log(response);
	});
});

/*if(document.getElementById('managements').selected){
     $.get("dropdown/"+event.target.value+"",function(response,managements)
	{
		$('#departments').removeAttr('disabled');

		$("#departments").empty();
		$("#departments").append("<option value='0' disabled selected>Seleccionar</option>");
		for(i=0; i<response.length; i++)
		{
			$("#departments").append("<option value='"+response[i].id+ "'> "+response[i].description_department+"</option>");
		}
	});
}*/