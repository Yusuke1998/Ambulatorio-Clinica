<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\config;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrador');
    }
    
    public function index(){
    	$configuracion = config::all();
    	return view('sistema.configuracion.index')
    		->with('configuracion',$configuracion);
    }

    public function update(Request $request, $id){

    	if ($request->file('logo')) {
            $file = $request->file('logo');
            $nameImage = 'logo_clinica'.'.'.$file->getClientOriginalExtension();
            $path = public_path().'\img\logos';
            $file->move($path,$nameImage);
        }else{
        	$configuracion = config::find($id);
        	$nameImage = $configuracion->logo;
        }

        $configuracion = config::find($id);
        $configuracion->name = $request->name;
        $configuracion->telephone = $request->telephone;
        $configuracion->address = $request->address;
        $configuracion->rif = $request->rif;
        $configuracion->logo = $nameImage;
        $configuracion->user_id = $request->user_id;
        $configuracion->save();

    	return back()->with('info','Configuracion actualizada con exito!');
    }
}
