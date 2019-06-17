@extends('templates/dashboard-template')
@section('content-dashboard')
<form action="{{route('citas.store')}}" method="POST">
  @csrf
  <div class="row">
  	<input type="hidden" name="user_id" value="{{ Auth::User()->id }}">

    <div class="col-md-12 form-group">
      <label for="title">Razon</label>
      <input id="title" class="form-control" type="text" name="title">
    </div>

    <div class="col-md-4 form-group">
      <label for="start">Dia</label>
      <input id="start" class="form-control" type="date" name="start">
    </div>
    <div class="col-md-4 form-group">
      <label for="start_time_on">Hora de Inicio</label>
      <input id="start_time_on" class="form-control" type="time" name="start_time_on">
    </div>
    <div class="col-md-4 form-group">
      <label for="start_time_off">Hora de Finalizacion</label>
      <input id="start_time_off" class="form-control" type="time" name="start_time_off">
    </div>
    
    <div class="col-md-6 form-group">
      <label for="doctor">Medico</label>
      <select id="doctor" class="form-control" name="doctor_id">
      @forelse($medicos as $medico)
        <option value="{{ $medico->id }}">{{ $medico->firstname }}&nbsp{{ $medico->lastname }}&nbsp{{ $medico->ci }}</option>
      @empty
        <option>No hay medicos</option>
      @endforelse
      </select>
    </div>

    <div class="col-md-6 form-group">
      <label for="patient">Paciente</label>
      <select id="patient" class="form-control" name="patient_id">
      @forelse($pacientes as $paciente)
        <option value="{{ $paciente->id }}">{{ $paciente->firstname }}&nbsp{{ $paciente->lastname }}&nbsp{{ $paciente->ci }}</option>
      @empty
        <option>No hay pacientes</option>
      @endforelse
      </select>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Registrar</button>
  </div>
</form>
@stop