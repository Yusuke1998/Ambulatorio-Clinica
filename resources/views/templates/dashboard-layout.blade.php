<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="JhonnyPrz">
    <link rel="icon" href="">
    <title> @yield('title','Nombre') </title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('fullcalendar/fullcalendar.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('chosen/chosen.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/my.css')}}"/>
  </head>

  <body>
    <header>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{ URL('/') }}" title="Inicio">
              <p class="h5">{{ App\config::find(1)->name }}</p>
            </a>
            <p class="text-white">{{ Auth::user()->username }}</p>
        </div>
      </div>
    </header>
    <main role="main">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
             @yield('content')
          </div>
        </div>
      </div>
    </main>
    <footer class="text-muted">
      <div class="container">
        <p class="text-left">Aquiles Rojas.</p>
      </div>
    </footer>
    @extends('layouts.script')
  </body>
</html>
