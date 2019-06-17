@extends('templates/dashboard-template')
@section('content-dashboard')
<div class="col-md-12">
	<table id="example" class="display" style="width:100%">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Desde</th>
				<th>Hasta</th>
				<th>Paciente</th>
				<th>Doctor</th>
				<th>Estatus</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($citas as $cita)
				<tr>
					<td>
						{{ date("d-m-Y", strtotime($cita->calendar->date)) }}
					</td>
					<td>
						{{ date("g:i a", strtotime($cita->calendar->start_time_on)) }}
					</td>	
					<td>
						{{ date("g:i a", strtotime($cita->calendar->start_time_off)) }}
					</td>					
					<td>
						{{$cita->patient->firstname}}&nbsp{{$cita->patient->lastname}}
					</td>
					<td>
						{{$cita->doctor->firstname}}&nbsp{{$cita->doctor->lastname}}
					</td>
					<td>
						{{$cita->status}}
					</td>
					<td>
						<a title="Ver" href="{{route('citas.show',$cita->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>

						<a title="Editar" href="{{route('citas.edit',$cita->id)}}"><span class="glyphicon glyphicon-edit"></span></a>

						<a title="Eliminar" href="{{route('citas.delete',$cita->id)}}" title=""><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop