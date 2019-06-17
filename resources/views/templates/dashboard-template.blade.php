@extends('templates/dashboard-layout')
@section('title') {{ (App\config::find(1)->name)?App\config::find(1)->name:'Clinica' }} @endsection
@section('content')
<!-- Main -->
    <div class="col-md-2">
      <!-- Left column -->
      <ul class="list-unstyled">
        @if(Auth::user()->rol=="admin")
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu1">
          <h5>Usuarios</h5>
          </a>       
            <ul class="list-unstyled collapse" id="menu1">
                <li>
                  <a href="{{ Route('usuarios.create') }}" title="Crear nuevo Usuario"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
                </li>
                <li>
                  <a href="{{ Route('usuarios.index') }}" title="Todos los Usuarios">Lista de Usuarios</a>
                </li>
            </ul>
            <hr>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu3">
          <h5>Medicos</h5>
          </a>       
          <ul class="list-unstyled collapse" id="menu3">
              <li>
                <a href="{{ Route('medicos.create') }}" title="Crear nuevo"><span class="glyphicon glyphicon-plus"></span>
                Nuevo</a>
              </li>
              <li>
                <a href="{{ Route('medicos.index') }}" title="Lista de medicos">Lista</a>
              </li>
              <li>
                <a href="{{ Route('consultorios.index') }}" title="Consultorios">Consultorios</a>
              </li>
              <li>
                <a href="{{ Route('especialidades.index') }}" title="Especialidades">Especialidades</a>
              </li>
          </ul>
          <hr>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu4">
          <h5>Recepcionistas</h5>
          </a>       
          <ul class="list-unstyled collapse" id="menu4">
              <li>
                <a href="{{ Route('recepcionistas.create') }}" title="Crear nueva recepcionista"><span class="glyphicon glyphicon-plus"></span> Nueva</a>
              </li>
              <li>
                <a href="{{ Route('recepcionistas.index') }}" title="Todos los Recepcionistas">Lista</a>
              </li>
          </ul>
          <hr>
        </li>
        @endif
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Pacientes</h5>
          </a>       
          <ul class="list-unstyled collapse" id="menu2">
              <li><a href="{{ Route('pacientes.create') }}" title="Nuevo Paciente"><span class="glyphicon glyphicon-plus"></span> Nuevo</a></li>
              <li><a href="{{ Route('pacientes.index') }}" title="Todos los Pacientes">Lista</a></li>
              <li><a href="{{ Route('expedientes.index') }}" title="Lista de expedientes">Expedientes</a></li>
              <li><a href="{{ Route('expedientes.create') }}" title="Crear expediente">Nuevo Expediente</a></li>
              <li><a href="{{ Route('evoluciones.index') }}" title="Lista de evoluciones">Evoluciones</a></li>
              <li><a href="{{ Route('evoluciones.create') }}" title="Crear evolucion">Nueva Evolucion</a></li>
          </ul>
          <hr>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu5">
          <h5>Citas</h5>
          </a>       
          <ul class="list-unstyled collapse" id="menu5">
              <li>
                <a href="{{ Route('citas.create') }}" title="Nueva cita"><span class="glyphicon glyphicon-plus"></span> Nueva</a>
              </li>
              <li>
                <a href="{{ Route('citas.index') }}" title="Todas las citas">Lista de Citas</a>
              </li>
          </ul>
          <hr>
        </li>
        
        @if(Auth::user()->rol=="admin" || Auth::user()->rol=="receptionist")

        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu6">
          <h5>Reportes</h5>
          </a>  
          <ul class="list-unstyled collapse" id="menu6">
              <li>
                <a href="{{ route('citas.pdf','todo') }}" title="PDF de citas">Citas</a>
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="{{ route('citas.pdf','dia') }}" title="">DIA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('citas.pdf','semana') }}" title="">SEMANA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('citas.pdf','mes') }}" title="">MES</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('citas.pdf','año') }}" title="">AÑO</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="{{ route('medicos.pdf','todo') }}" title="PDF de medicos">Medicos</a>
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="{{ route('medicos.pdf','dia') }}" title="">DIA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('medicos.pdf','semana') }}" title="">SEMANA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('medicos.pdf','mes') }}" title="">MES</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('medicos.pdf','año') }}" title="">AÑO</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="{{ route('recepcionistas.pdf','todo') }}" title="PDF de recepcionistas">Recepcionistas</a>
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="{{ route('recepcionistas.pdf','dia') }}" title="">DIA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('recepcionistas.pdf','semana') }}" title="">SEMANA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('recepcionistas.pdf','mes') }}" title="">MES</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('recepcionistas.pdf','año') }}" title="">AÑO</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="{{ route('pacientes.pdf','todo') }}" title="PDF de pacientes">Pacientes</a>
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="{{ route('pacientes.pdf','dia') }}" title="">DIA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('pacientes.pdf','semana') }}" title="">SEMANA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('pacientes.pdf','mes') }}" title="">MES</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('pacientes.pdf','año') }}" title="">AÑO</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="{{ route('usuarios.pdf','todo') }}" title="PDF de usuarios">Usuarios</a>
                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="{{ route('usuarios.pdf','dia') }}" title="">DIA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('usuarios.pdf','semana') }}" title="">SEMANA</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('usuarios.pdf','mes') }}" title="">MES</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('usuarios.pdf','año') }}" title="">AÑO</a>
                  </li>
                </ul>
              </li>
          </ul>
          <hr>
        </li>
        @endif

        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu7">
          <h5>Sistema</h5>
          </a>       
          <ul class="list-unstyled collapse" id="menu7">
              @if(Auth::user()->rol=="admin")
              <li>
                <a href="{{ Route('configuraciones.index') }}" title="Caracteristicas del sistema">Configuración</a>
              </li>
              @endif
              <li>
                <a style="width: 100px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="glyphicon glyphicon-off"></span> Cerrar sesion
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
              </li>
          </ul>
          <hr>
        </li>
      </ul> 
    </div>
    <!-- /col-3 -->
    <div class="col-md-10">
      @include('layouts.status')
      @yield('content-dashboard')
    </div>
    <div class="modal" id="UsuariosModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Opciones para usuarios</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
          </div>
          <div class="modal-body row">
            <div class="col-md-6">
              <ul>
                
              </ul>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <center><img src="{{ asset('img/usuarios.png') }}" width="100px"></center>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

<!-- /Main -->
@endsection