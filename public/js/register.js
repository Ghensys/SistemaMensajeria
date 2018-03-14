//function Select()
//{
	$('#select-gerencia').on('change', onSelectGerenciaChange);

	function onSelectGerenciaChange()
	{
		var gerencia_id = $(this).val();
		alert(gerencia_id);
	}
//}