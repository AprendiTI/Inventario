<?php

namespace App\Http\Controllers;

use App\Models\Conteos;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ValidarRol']);
    }

    public function index()
    {
        $informe = Conteos::select(
            'Conteos.id'
            ,'Conteos.Model_id'
            ,'DetalleConteos1.Amount as cantidad_1'
            ,'DetalleConteos1.Amount as Vencimiento_1'
            ,'DetalleConteos1.Amount as Lote_1'
            ,'DetalleConteos2.Amount as cantidad_2'
            ,'DetalleConteos2.Amount as Vencimiento_2'
            ,'DetalleConteos2.Amount as Lote_2'
            ,'DetalleConteos3.Amount as cantidad_3'
            ,'DetalleConteos3.Amount as Vencimiento_3'
            ,'DetalleConteos3.Amount as Lote_3'
            ,'CopiaWMS.*'
        )
        ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
        ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
        ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
        ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
        ->where('Conteos.State1', 1)
        ->where('Conteos.State2', 1)
        ->where('Conteos.State3', 1)
        ->get();
        
        $informe = json_decode( json_encode($informe),true);


        return view('pages.administrador.stractWMS.informes', compact('informe'));
    }
}
