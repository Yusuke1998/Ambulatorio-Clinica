<?php
// CITAS
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appointment;
use App\calendar;
use App\doctor;
use App\patient;
use App\config;

class quotes extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $citas = appointment::all();
        return view('sistema.citas.index')->with('citas',$citas);
    }

    public function create()
    {
        $pacientes = patient::all();
        $medicos = doctor::all();
        return view('sistema.citas.create')
            ->with('pacientes',$pacientes)
            ->with('medicos',$medicos);
    }

    public function store(Request $request)
    {
        $cita = new appointment();
        $calendario = new calendar();
        $configuracion = config::find(1);

        $cita->user_id = $request->user_id;
        $cita->patient_id = $request->patient_id;
        $cita->doctor_id = $request->doctor_id;
        $cita->status = 'Pendiente';
        $cita->date = $request->start;
        $cita->save();

        $medico = doctor::find($request->doctor_id);
        $medico->patients()->attach($request->patient_id);

        $calendario->title = $request->title;
        $calendario->start = $request->start.'T'.$request->start_time_on;
        $calendario->end = $request->start.'T'.$request->start_time_off;
        $calendario->color = '#6cb2eb';
        $calendario->url = URL('/sistema/citas/').'/'.$cita->id;
        $calendario->start_time_on = $request->start_time_on;
        $calendario->start_time_off = $request->start_time_off;
        $calendario->date = $request->start;
        $calendario->appointment_id = $cita->id;
        $calendario->save();

        return redirect(route('citas.show',$cita->id))->with('info','Cita creada con exito!');
    }

    public function show($id)
    {
        $cita = appointment::find($id);
        return view('sistema.citas.show')->with('cita',$cita);
    }

    public function edit($id)
    {   
        $pacientes = patient::all();
        $medicos = doctor::all();
        $cita = appointment::find($id);

        return view('sistema.citas.edit')
            ->with('pacientes',$pacientes)
            ->with('medicos',$medicos)
            ->with('cita',$cita);
    }

    public function update(Request $request, $id)
    {
        $calendario  = calendar::where('appointment_id',$id);
        $configuracion = config::find(1);

        $start = $request->start.'T'.$request->start_time_on;
        $end = $request->start.'T'.$request->start_time_off;
        
        // Se asigna el color dependiendo del estatus de la cita
        switch ($request->status) {
            case 'Pendiente':
                // bg-info
                $color = '#6cb2eb';
                break;
            case 'Completa':
                $color = '#38c172';
                // bg-scuccess
                break;
            case 'Cancelada':
                $color = '#e3342f';
                // bg-danger
                break;
            case 'No asistio':
                $color = '#ffed4a';
                // bg-warning
                break;
            default:
                $color = 'darkblue';
                break;
        }

        $calendario->update([
            'title'             =>  $request->title,
            'start'             =>  $start,
            'end'               =>  $end,
            'start_time_on'     =>  $request->start_time_on,
            'start_time_off'    =>  $request->start_time_off,
            'date'              =>  $request->start,
            'color'             =>  $color,
        ]);

        $cita = appointment::find($id)->update([
            'user_id'       =>  $request->user_id,
            'patient_id'    =>  $request->patient_id,
            'doctor_id'     =>  $request->doctor_id,
            'status'        =>  $request->status, 
        ]);

        return back()->with('info','Cita actualizada con exito!');
    }

    public function destroy($id)
    {
        $cita = appointment::find($id)->delete();
        return back()->with('info','Cita eliminada con exito!');
    }

    public function delete($id)
    {
        $cita = appointment::find($id)->delete();
        return back()->with('info','Cita eliminada con exito!');
    }
}
