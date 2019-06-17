@extends('templates/dashboard-template')
@section('content-dashboard')
<form enctype="multipart/form-data" action="{{ Route('configuraciones.update','1') }}" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="user_id" value="{{ \Auth::User()->id }}">
	<div class="row">
		<p class="h3 text-center col-md-12">Datos de la clinica</p>



		<div class="form-group col-md-6">
			<label>Nombre</label>
			<input type="text" name="name" placeholder="Nombre" class="form-control" value="{{ ($configuracion[0]->name)?$configuracion[0]->name:'' }}">
		</div>

		<div class="form-group col-md-3">
			<label>Rif</label>
			<input type="text" name="rif" placeholder="Rif" class="form-control" value="{{ ($configuracion[0]->rif)?$configuracion[0]->rif:'' }}">
		</div>

		<div class="form-group col-md-3">
			<label>Telefono</label>
			<input type="text" name="telephone" value="{{ ($configuracion[0]->telephone)?$configuracion[0]->telephone:'' }}" class="form-control" placeholder="Telefono">
		</div>

		<div class="form-group col-md-12">
			<label>Direccion</label>
			<textarea type="text" name="address" class="form-control" placeholder="Direccion">{{ ($configuracion[0]->address)?$configuracion[0]->address:'' }}</textarea>
		</div>

		
		<div class="form-group col-md-6">
			<input type="file" id="logo" style="padding-bottom: 40px; padding-top: 15px; margin-top: 40px;" name="logo" placeholder="Logo del sistema" class="form-control">
		</div>

		<div class="form-group col-md-6">
			<p class="text-center h4">Logo actual</p>
			<center>
				<img src="{{ ($configuracion[0]->logo)?asset('img/logos').'/'.$configuracion[0]->logo:asset('img/logos').'/logo.png' }}" width="100" alt="Logo actual">
				
			</center>
		</div>

		<div class="form-group col-md-12">
			<input type="submit" class="btn btn-primary btn-block" name="btn" value="Guardar">
		</div>
	</div>
</form>
@stop