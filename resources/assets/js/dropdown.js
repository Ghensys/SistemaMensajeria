$("#managements").change(function(event)
{
	$("dropdown/"+event.target.value+"",function(response,managements);
	{
		$.get('#departments').removeAttr('disabled');

		$("#departments").empty();
		$("#departments").append("<option value='0' disabled selected>Seleccione</option>");
		console.log('hola');
		for(a=0; a<response.length; a++)
		{
			$("#departments").append("<option value='"+response[i].id+ "'> "+response[i].description_department+"</option>");
		}
	});
});