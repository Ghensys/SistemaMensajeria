<div class="panel panel-primary">
	<div class="panel-heading">
		Menú		
	</div>
	<div class="panel-body">

		@if(auth()->check())

			<ul class="nav nav-pills nav-stacked">
				<li><a href="/generar">Nueva Comunicación</a></li>
			  	<li><a href="#">Comunicación en Ejecución</a></li>
			  	<li><a href="#">Comunicación Finalizada</a></li>
			  	<li>
			  		<a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" role="button">Administración</a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					    <li><a href="#">Usuarios</a></li>
					    <li><a href="#">Gerencias</a></li>
					    <li><a href="#">Departamentos</a></li>
					</ul>
				</li>
			</ul>

		@else
			<ul class="nav nav-pills nav-stacked">
					<li><a href="#">Inicio</a></li>
				  	<li><a href="#">Opcion 1</a></li>
				  	<li><a href="#">Opcion 2</a></li>
				</ul>
		@endif
	</div>
</div>




