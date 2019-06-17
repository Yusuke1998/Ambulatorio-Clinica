@extends('templates/dashboard-template')
@section('content-dashboard')
<form action="{{route('citas.update',$cita->id)}}" method="POST">
  @csrf
  <div class="row">
  	<input type="hidden" name="_method" value="PUT">
  	<input type="hidden" name="user_id" value="{{ Auth::User()->id }}">

    <div class="col-md-12 form-group">
      <label for="title">Razon</label>
      <input id="title" class="form-control" value="{{ $cita->calendar->title }}" type="text" name="title">
    </div>

    <div class="col-md-4 form-group">
      <label for="start">Dia</label>
      <input id="start" class="form-control" value="{{ $cita->calendar->date }}" type="date" name="start">
    </div>

    <div class="col-md-4 form-group">
      <label for="start_time_on">Hora de Inicio</label>
      <input id="start_time_on" class="form-control" value="{{ $cita->calendar->start_time_on }}" type="time" name="start_time_on">
    </div>

    <div class="col-md-4 form-group">
      <label for="start_time_off">Hora de Finalizacion</label>
      <input id="start_time_off" class="form-control" value="{{ $cita->calendar->start_time_off }}" type="time" name="start_time_off">
    </div>
    
    <div class="col-md-6 form-group">
      <label for="doctor">Medico</label>
      <select id="doctor" class="form-control" name="doctor_id">
      	<option value="{{ $cita->doctor->id }}">{{ $cita->doctor->firstname }}&nbsp{{ $cita->doctor->lastname }}&nbsp{{ $cita->doctor->ci }}</option>
      @forelse($medicos as $medico)
      	@if($medico->id == $cita->doctor->id)
      	@else 
        <option value="{{ $medico->id }}">{{ $medico->firstname }}&nbsp{{ $medico->lastname }}&nbsp{{ $medico->ci }}</option>
      	@endif
      @empty
        <option>No hay medicos</option>
      @endforelse
      </select>
    </div>

    <div class="col-md-6 form-group">
      <label for="patient">Paciente</label>
      <select id="patient" class="form-control" name="patient_id">
      	<option slected value="{{ $cita->patient->id }}">{{ $cita->patient->firstname }}&nbsp{{ $cita->patient->lastname }}&nbsp{{ $cita->patient->ci }}</option>
      	option
      @forelse($pacientes as $paciente)
      	@if( $paciente->id ==  $cita->patient->id)
      	@else
        <option value="{{ $paciente->id }}">{{ $paciente->firstname }}&nbsp{{ $paciente->lastname }}&nbsp{{ $paciente->ci }}</option>
      	@endif
      @empty
        <option>No hay pacientes</option>
      @endforelse
      </select>
    </div>

    <div class="col-md-6 form-group">
      <label for="status">Estatus de cita</label>
      <select id="status" class="form-control" name="status">

        @if($cita->status == 'Pendiente')
            <option selected value="Pendiente">Pendiente</option>
            <option value="Completa">Completa</option>
            <option value="No asistio">No asistio</option>
            <option value="Cancelada">Cancelada</option>
        @endif
        @if($cita->status == 'Completa')
            <option value="Pendiente">Pendiente</option>
            <option selected value="Completa">Completa</option>
            <option value="No asistio">No asistio</option>
            <option value="Cancelada">Cancelada</option>
        @endif
        @if($cita->status == 'No asistio')
            <option value="Pendiente">Pendiente</option>
            <option value="Completa">Completa</option>
            <option selected value="No asistio">No asistio</option>
            <option value="Cancelada">Cancelada</option>
        @endif
        @if($cita->status == 'Cancelada')
            <option value="Pendiente">Pendiente</option>
            <option value="Completa">Completa</option>
            <option value="No asistio">No asistio</option>
            <option selected value="Cancelada">Cancelada</option>
        @endif
        @if(!$cita->status)
            <option value="Pendiente">Pendiente</option>
            <option value="Completa">Completa</option>
            <option value="No asistio">No asistio</option>
            <option value="Cancelada">Cancelada</option>
        @endif

      </select>
    </div>


  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>
@stop