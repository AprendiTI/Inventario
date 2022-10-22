<?php

namespace App\Http\Controllers;

use App\Models\Conteos;
use App\Models\CopiaWMS;
use App\Models\ModelosRecuento;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // select [CopiaWMS].*, [DetalleConteos].* from [CopiaWMS] inner join [DetalleConteos] on [CopiaWMS].[id=] = [DetalleConteos].[Copia_id]
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fecha_hora = new DateTime("now", new DateTimeZone('America/Bogota'));

        $TipoConteo = ModelosRecuento::all();
        $TipoConteo = json_decode( json_encode( $TipoConteo),true);
    
        
        // $conteo1 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User1', Auth::user()->id)
        // ->get();
        $conteo1 = Conteos::all()->where('User1',  Auth::user()->id);
        
        $WMS1 = json_decode( json_encode($conteo1),true);

        // dd ($WMS1);

        
        // $conteo2 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User2', Auth::user()->id)
        // ->get();

        $conteo2 = Conteos::all()->where('User2',  Auth::user()->id);

        $WMS2 = json_decode( json_encode($conteo2),true);

        // dd ($WMS2);
        
        
        // $conteo3 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User3', Auth::user()->id)
        // ->get();

        $conteo3 = Conteos::all()->where('User3',  Auth::user()->id);
        
        $WMS3 = json_decode( json_encode($conteo3),true);

        // dd ($WMS3);

        return view('home', compact('TipoConteo','WMS1', 'WMS2', 'WMS3',));
    }
}
