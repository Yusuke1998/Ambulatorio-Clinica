<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="JhonnyPrz">
    <link rel="icon" href="">
    <title> @yield('title','CLINICA JJPM') </title>
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
            <a href="{{ URL('/') }}" style="background-color: #fff; padding: 0px 10px; border-radius: 5%;" title="">
              @if(App\config::first()->logo)
              <img src="{{ asset('img/logos').'/'.App\config::find(1)->logo }}" height="50" alt="{{ (App\config::find(1)->name)?App\config::find(1)->name:'Clinica' }}">
              @else
              <p class="h3">{{ App\config::find(1)->name }}</p>
              @endif
            </a>
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
