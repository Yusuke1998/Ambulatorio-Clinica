<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Factura</title>
</head>
<style>
	.left{
		text-align: left;
	}
	.right{
		text-align: right;
	}
	.ancho{
		width: 100%;
	}
	.center{
		text-align: center;
	}
</style>
<body>
	<div class="container">
		<div class="center ancho">
			<p>SENIAT</p>
		</div>
		<center>
			<img border="false" src="img/logos/{{ $configuracion->logo }}" width="300px" height="50px">
		</center>
		<br>
		<div class="left ancho">
			<label>Rif: {{ $configuracion->rif }}</label>
		</div>
		<div class="left ancho">
			<label>Telefono: {{ $configuracion->telephone }}</label>
		</div>
		<div class="left ancho">
			<label>Nombre: {{ $configuracion->name }}</label>
		</div>
		<div class="left ancho">
			<label>Dirección: {{ $configuracion->address }}</label>
		</div>
		<hr>
		<div class="left ancho">
			<label>Razon: {{ $factura->appointment->calendar->title }}</label>
		</div>
		<div class="left ancho">
			<label>Consultorio: {{ $factura->appointment->doctor->consultingroom->number }}</label>
		</div>
		<div class="left ancho">
			<label>Dia: {{ $factura->appointment->calendar->date }}</label>
		</div>
		<div class="left ancho">
			<label>Hora: {{ $factura->appointment->calendar->start_time_on }} {{ ($factura->appointment->calendar->start_time_on <='12')?'am':'pm' }}</label>
		</div>
		<div class="left ancho">
			<label>Paciente: {{ $factura->appointment->patient->firstname }} {{ $factura->appointment->patient->lastname }}</label>
		</div>
		<div class="left ancho">
			<label>Medico: {{ $factura->appointment->doctor->firstname }} {{ $factura->appointment->doctor->lastname }}</label>
		</div>
		<hr>
		<div class="left ancho">
			<label>Codigo: {{ $factura->code }}</label>
		</div>
		<div class="left ancho">
			<label>IVA: {{ $configuracion->iva }}%</label>
		</div>
		<div class="left ancho">
			<label>Sub Total: {{ $factura->amountPaylable }} Bs.S</label>
		</div>
		<div class="left ancho">
			<label>Total: {{ $factura->total }} Bs.S</label>
		</div>
		<hr>
	</div>
</body>
</html>