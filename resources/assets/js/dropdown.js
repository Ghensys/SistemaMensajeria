$("#managements").change(function(event)
{
	$.get("dropdown/"+event.target.value+"",function(response,managements)
	{
		$cod('#departments').removeAttr('disabled');

		$("#departments").empty();
		$("#departments").append("<option value='0' disabled selected>Seleccione</option>");
		for(i=0; i<response.length; i++)
		{
			$("#departments").append("<option value='"+response[i].id+ "'> "+response[i].departments+"</option>");
		}
	});
});