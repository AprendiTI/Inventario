<?php

namespace App\Http\Controllers;

use App\Models\Conteos;
use App\Models\ModelosRecuento;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ValidarRol']);
    }

    public function index()
    {

        $fecha_hora = new DateTime("now", new DateTimeZone('America/Bogota'));

        
        // -------------------CONTEO N° 1-----------------------

            $informec1 = Conteos::select(
                'Conteos.id'
                ,'Conteos.Model_id'
                ,'Conteos.DateAsign'
                ,'Conteos.User1'
                ,'DetalleConteos1.Amount as cantidad_1'
                ,'DetalleConteos1.DateExpiration as Vencimiento_1'
                ,'DetalleConteos1.Lote as Lote_1'

                ,'CopiaWMS.*'
            )
            ->leftjoin('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
            ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
            ->where('Conteos.State1', 1)
            ->where('Conteos.State2', 1)
            ->get();
            
            $informec1 = json_decode( json_encode($informec1),true);

        // -------------------CONTEO N° 2-----------------------
        
            $informec2 = Conteos::select(
                'Conteos.id'
                ,'Conteos.Model_id'
                ,'Conteos.DateAsign'
                ,'Conteos.User2'
                ,'DetalleConteos2.Amount as cantidad_2'
                ,'DetalleConteos2.DateExpiration as Vencimiento_2'
                ,'DetalleConteos2.Lote as Lote_2'

                ,'CopiaWMS.*'
            )
            ->leftjoin('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
            ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
            ->where('Conteos.State1', 1)
            ->where('Conteos.State2', 1)
            ->get();
            
            $informec2 = json_decode( json_encode($informec2),true);
            
            
        
        // -------------------CONTEO N° 3-----------------------


            $informec3 = Conteos::select(
                'Conteos.id'
                ,'Conteos.Model_id'
                ,'Conteos.DateAsign'
                ,'Conteos.User3'
                ,'DetalleConteos3.Amount as cantidad_3'
                ,'DetalleConteos3.DateExpiration as Vencimiento_3'
                ,'DetalleConteos3.Lote as Lote_3'

                ,'CopiaWMS.*'
            )
            ->leftjoin('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
            ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
            ->where('Conteos.State1', 1)
            ->where('Conteos.State2', 1)
            ->where('DetalleConteos3.Amount', '<>', '')
            ->get();
            
            $informec3 = json_decode( json_encode($informec3),true);

            $usuarios = User::all();
            $usuarios = json_decode( json_encode( $usuarios),true);
            
            $TipoConteo = ModelosRecuento::all();
            $TipoConteo = json_decode( json_encode( $TipoConteo),true);

            // dd($informec1);
    
        // dd($informe);

        return view('pages.administrador.stractWMS.Informes', compact('TipoConteo', 'usuarios', 'informec1','informec2','informec3'));
    }
}
