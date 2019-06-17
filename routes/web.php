<?php

Route::get('/graficas',function(){
	return view('sistema.reportes.citas'); 
});

Auth::routes();

// Usuarios sin autenticacion

Route::get('/', 'Auth\LoginController@showLoginForm')->name('acceder');

Route::get('sistema',function(){
	return redirect('/');
});

// Usuarios autenticados

Route::get('/registrar',function(){
    return view('auth/register2');
})->name('registrar')->middleware('auth');

Route::get('/clinica', 'HomeController@index')->name('clinica');

Route::group([ 'middleware' => ['auth'], 'prefix' => 'sistema'],function(){

	// Configuraciones
	Route::resource('/configuraciones','ConfigController');

	// Pacintes
	Route::resource('/pacientes','patients');
	Route::get('/pacientes/{paciente}/delete','patients@delete')->name('pacientes.delete');

	// Expedientes
	Route::resource('/expedientes','records');
	Route::get('/expedientes/{expediente}/delete','records@delete')->name('expedientes.delete');
	Route::get('/expedientes/nueva/{id_paciente}','records@nuevo')->name('expedientes.nuevo');
	Route::get('/expedientes/ver/{id}','records@ver')->name('expedientes.ver');

	// Evoluciones
	Route::resource('/evoluciones','evolutions');
	Route::get('/evoluciones/{evolucion}/delete','evolutions@delete')->name('evoluciones.delete');
	Route::get('/evoluciones/nueva/{id}','evolutions@nueva')->name('evoluciones.nueva');
	Route::get('/evoluciones/ver/{id}','evolutions@show')->name('evoluciones.ver');

	// Citas
	Route::resource('/citas','quotes');
	Route::get('/citas/{cita}/delete','quotes@delete')->name('citas.delete');

	// recepcionistas
	Route::resource('/recepcionistas','receptionists');
	Route::get('/recepcionistas/{recepcionista}/delete','receptionists@delete')->name('recepcionistas.delete');

	// Calendario
	Route::resource('/calendario','calendaries');

	// Medicos
	Route::resource('/medicos','doctors');
	Route::get('/medicos/{medico}/delete','doctors@delete')->name('medicos.delete');
	Route::resource('/especialidades','specialties');
	Route::resource('/consultorios','doctorsoffices');

	// Usuarios
	Route::resource('/usuarios','users');
	Route::get('/usuarios/{usuario}/delete','users@delete')->name('usuarios.delete');

	// reportes PDF
	Route::group(['prefix' => 'reportes'],function(){
		
		// Dia, Semana, Mes, Año
		Route::get('usuarios/{tipo}','reports@usuarios')->name('usuarios.pdf');
		Route::get('pacientes/{tipo}','reports@pacientes')->name('pacientes.pdf');
		Route::get('medicos/{tipo}','reports@medicos')->name('medicos.pdf');
		Route::get('recepcionistas/{tipo}','reports@recepcionistas')->name('recepcionistas.pdf');
		Route::get('citas/{tipo}','reports@citas')->name('citas.pdf');
		Route::get('ingresos/{tipo}','reports@ingresos')->name('ingresos.pdf');

		// Individuales
		Route::get('medico/{id}/pacientes','reports@medico_pacientes')->name('medico_pacientes.pdf');
		Route::get('expediente/{id}','reports@expediente')->name('expediente.pdf');
		Route::get('expediente/evolucion/{id_evolucion}','reports@evolucion')->name('expediente_evolucion.pdf');
		Route::get('expediente/evoluciones/{id_expediente}','reports@evoluciones')->name('expediente_evoluciones.pdf');
	});

});