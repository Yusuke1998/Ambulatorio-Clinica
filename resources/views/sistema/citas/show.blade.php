@extends('templates/dashboard-template')
@section('content-dashboard')
<form action="{{route('citas.update',$cita->id)}}" method="POST">
  @csrf
  <div class="row">
  	<input type="hidden" name="_method" value="PUT">
  	<input type="hidden" name="user_id" value="{{ Auth::User()->id }}">

    <div class="col-md-12 form-group">
      <label class="form-control text-center" for="title">Razon</label>
      <input id="title" class="form-control" value="{{ $cita->calendar->title }}" type="text" disabled>
    </div>

    <div class="col-md-4 form-group">
      <label class="form-control text-center" for="start">Dia</label>
      <input id="start" class="form-control" value="{{ $cita->calendar->date }}" type="date" disabled>
    </div>

    <div class="col-md-4 form-group">
      <label class="form-control text-center" for="start_time_on">Hora de Inicio</label>
      <input id="start_time_on" class="form-control" value="{{ $cita->calendar->start_time_on }}" type="time" disabled>
    </div>

    <div class="col-md-4 form-group">
      <label class="form-control text-center" for="start_time_off">Hora de Finalizacion</label>
      <input id="start_time_off" class="form-control" value="{{ $cita->calendar->start_time_off }}" type="time" disabled>
    </div>
    
    <div class="col-md-6 form-group">
      <label class="form-control text-center" for="doctor">Medico</label>
      <input type="text" class="form-control" value="{{ $cita->doctor->firstname }} {{ $cita->doctor->lastname }}" disabled>
    </div>

    <div class="col-md-6 form-group">
      <label class="form-control text-center" for="patient">Paciente</label>
      <input type="text" class="form-control" value="{{ $cita->patient->firstname }} {{ $cita->patient->lastname }}" disabled>
    </div>

    <div class="col-md-6 form-group">
      <label class="form-control text-center" for="consultingroom">Consultorio</label>
      <input type="text" class="form-control" id="consultingroom" value="{{ ($cita->doctor->consultingroom)?$cita->doctor->consultingroom->number:'No especificado!' }}" disabled>
    </div>
    <div class="col-md-6 form-group">
      <label class="form-control text-center" for="status">Estatus de cita</label>
      <input type="text" class="form-control" id="status" value="{{ ($cita->status)?$cita->status:'No especificado!' }}" disabled>
    </div>

  </div>
</form>
@stop