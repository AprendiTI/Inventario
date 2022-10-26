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
        $conteo1 = Conteos::all()->where('User1',  Auth::user()->id)->where('DateAsign', $fecha_hora->format('Y-m-d'));
        
        $WMS1 = json_decode( json_encode($conteo1),true);

        // dd ($WMS1);

        
        // $conteo2 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User2', Auth::user()->id)
        // ->get();

        $conteo2 = Conteos::all()->where('User2',  Auth::user()->id)->where('DateAsign', $fecha_hora->format('Y-m-d'));

        $WMS2 = json_decode( json_encode($conteo2),true);

        // dd ($WMS2);
        
        
        // $conteo3 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User3', Auth::user()->id)
        // ->get();

        $conteo3 = Conteos::all()->where('User3',  Auth::user()->id)->where('DateAsign', $fecha_hora->format('Y-m-d'));
        
        $WMS3 = json_decode( json_encode($conteo3),true);

        // dd ($WMS3);

        return view('home', compact('TipoConteo','WMS1', 'WMS2', 'WMS3',));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $conteo2 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User2', Auth::user()->id)
        // ->get();
        $response = Conteos::select('Conteos.*', 'CopiaWMS.*')->join('DetalleConteos', 'Conteos.id',"=", "DetalleConteos.Conteo_id")
        ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos.Copia_id')
        ->where('Conteos.id', $id)
        ->get();
        $response = json_decode( json_encode($response),true);
        dd($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
