<div class="panel panel-primary">
	<div class="panel-heading">
		Menú		
	</div>
	<div class="panel-body">

		@if(auth()->check())

			<ul class="nav nav-pills nav-stacked">
				<li><a href="#">Nueva Comunicación</a></li>
			  	<li><a href="#">Bandeja de Entrada</a></li>
			  	<li><a href="#">Administrar</a></li>
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




