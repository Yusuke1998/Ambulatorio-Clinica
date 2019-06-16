<?php
// FACTURAS
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use App\bill;
use App\config;
use Illuminate\Http\Request;

class invoices extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $facturas = bill::all();
        return view('sistema.factura.index')->with(compact('facturas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $factura = bill::find($id);
        $configuracion = config::find(1);
        return view('sistema.factura.show')->with(compact('factura','configuracion'));
    }

    public function pdf($id)
    {
        $factura = bill::find($id);
        $configuracion = config::find(1);
        $pdf = PDF::loadView('sistema.pdf.factura', compact('factura','configuracion'))->setPaper('a6');
        return $pdf->stream('factura.pdf');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
