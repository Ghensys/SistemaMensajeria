<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Menú</b>		
	</div>
	<div class="panel-body">

		@if(auth()->check())

			<ul class="nav nav-pills nav-stacked">
				<li @if(request()->is('home')) class="active" @endif ><a href="/home">Dashboard</a></li>

				<li @if(request()->is('nuevo_mensaje')) class="active" @endif ><a href="/nuevo_mensaje">Nuevo Mensaje</a></li>

				<li @if(request()->is('bandeja_entrada')) class="active" @endif ><a href="/bandeja_entrada">Bandeja de Entrada @if($count_receiver != 0)<b>({{ $count_receiver }})</b> @endif</a></li>

			  	<li @if(request()->is('enviado')) class="active" @endif ><a href="/enviado">Enviados @if($count_send != 0) <b>({{ $count_send }} Respondidos)</b> @endif </a></li>

			  	<li @if(request()->is('tarea')) class="active" @endif ><a href="#">Tareas</a></li>

			  	<li><a href="#">Comunicación Finalizada</a></li>
			  	
			  	@if(auth()->user()->is_admin)
				  	<li>
				  		<a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" role="button">Administración</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <li><a href="#">Usuarios</a></li>
						    <li><a href="#">Gerencias</a></li>
						    <li><a href="#">Departamentos</a></li>
						</ul>
					</li>
			  	@endif

			</ul>

		@endif
		
	</div>
</div>




