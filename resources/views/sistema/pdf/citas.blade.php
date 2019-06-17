@extends('sistema.pdf.template')
@section('content')
<div class="container">
	<div class="center ancho">
		<h3>{{ $title[0] }}</h3>
	</div>
	<table id="tabla">
		<thead>
			<tr>
				<th>Paciente</th>
				<th>Medico</th>
				<th>Fecha</th>
				<th>Desde</th>
				<th>Hasta</th>
				<th>Estatus</th>
			</tr>
		</thead>
		<tbody>
			@foreach($citas as $cita)
			<tr>
				<td>{{ $cita->patient->firstname }} {{ $cita->patient->lastname }}</td>
				<td>{{ $cita->doctor->firstname }} {{ $cita->doctor->lastname }}</td>
				<td>{{ date("d-m-Y", strtotime($cita->calendar->date)) }}</td>
				<td>{{ date("g:i a", strtotime($cita->calendar->start_time_on)) }}</td>
				<td>{{ date("g:i a", strtotime($cita->calendar->start_time_off)) }}</td>
				<td>{{ $cita->status }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection