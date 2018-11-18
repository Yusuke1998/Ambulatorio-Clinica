<?php

Route::get('/',function(){
    return view('auth/login2');
})->name('acceder');

Route::get('/registrar',function(){
    return view('auth/register2');
})->name('registrar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware' => ['auth'], 'prefix' => 'sistema'],function(){

	// Route::resource('/direccions','addresses');
	// Route::resource('/citas','quotes');
	// Route::resource('/facturas','invoices');
	// Route::resource('/expedientes','records');
	// Route::resource('/consultorios','doctorsoffices');
	// Route::resource('/medicos','doctors');
	// Route::resource('/correos','emails');
	// Route::resource('/evoluciones','evolutions');
	// Route::resource('/pacientes','patients');
	// Route::resource('/consultas','queries');
	Route::resource('/recepcionistas','receptionists');
	// Route::resource('/especialidades','specialties');
	// Route::resource('/telefonos','phones');
	Route::resource('/usuarios','users');
});