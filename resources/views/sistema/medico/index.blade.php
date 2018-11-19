@extends('templates.dashboard-layout')
@section('title') medico @endsection
@section('content')
<div class="col-md-12">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"> @yield('btn-modal','Nuevo')
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"> @yield('btn-modal','Nuevo') </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
            <form action="{{route('medicos.store')}}" method="POST">
            @csrf
		      <div class="modal-body row">
		      	<div class="form-group col-md-4">
		      		<label for="firstname">Nombres</label>
		      		<input required id="firstname" class="form-control" type="text" name="firstname">
		      	</div>
		      	<div class="form-group col-md-4">
		      		<label for="lastname">Apellidos</label>
		      		<input required id="lastname" class="form-control" type="text" name="lastname">
		      	</div>
		      	<div class="form-group col-md-4">
		      		<label for="ci">Cedula</label>
		      		<input required name="ci" id="ci" class="form-control" type="number">
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="telephone1">Telefono</label>
		      		<input name="telephone1" id="telephone1" class="form-control" type="tel" required>
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="telephone2">Telefono(2)</label>
		      		<input placeholder="(Opcional)" name="telephone2" id="telephone2" class="form-control" type="tel">
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="address1">Direccion</label>
		      		<input required id="address1" class="form-control" type="text" name="address1">
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="address2">Direccion(2)</label>
		      		<input placeholder="(Opcional)" id="address2" class="form-control" type="text" name="address2">
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="email1">Correo Electronico</label>
		      		<input required name="email1" id="email1" class="form-control" type="email">
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="email2">Correo Electronico 2</label>
		      		<input required name="email2" id="email2" class="form-control" type="email">
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="username">Nombre de Usuario</label>
		      		<input id="username" class="form-control" type="text" name="username">
		      	</div>
		      	<div class="form-group col-md-6">
		      		<label for="password">Contraseña de Usuario</label>
		      		<input id="password" class="form-control" type="password" name="password">
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary">Registrar</button>
		      </div>
            </form>
	    </div>
	  </div>
	</div>
</div>

<div class="col-md-12">
	<table id="example" class="display" style="width:100%">
		<thead>
			<tr>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Cedula</th>
				<th>Creado</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($medicos as $medico)
				<tr>
					<td>{{$medico->firstname}}</td>
					<td>{{$medico->lastname}}</td>
					<td>{{$medico->ci}}</td>
					<td>{{($medico->created_at)?$medico->created_at->diffForHumans():'No hay registro...'}}</td>
					<td>
					<div class="btn-group">
						<a class="btn btn-warning btn-sm" href="{{route('medicos.show',$medico->id)}}">Ver</a>
						<a class="btn btn-success btn-sm" href="{{route('medicos.edit',$medico->id)}}">Editar</a>
						
						<form action="{{route('medicos.destroy',$medico->id)}}" method="post">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
							<button onclick="return confirm('Seguro de eliminar?')" class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form>
					</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection