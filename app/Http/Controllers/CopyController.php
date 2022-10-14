<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class CopyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mytable = DB::table('CopiaWMS')->select('*')->get();
        $TableCopy = json_decode( json_encode($mytable),true);
        // dd($TableCopy);
        return view('pages.administrador.stractWMS.List', compact('TableCopy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewCons = DB::table('INVENTARIO')->select('*')->get();
        $tableView = json_decode( json_encode($viewCons),true);
        // dd($tableView);
        // $cop = DB::select('INSERT  INTO CopiaWMS (ItemCode) SELECT Articulo.*, Description.*, CODIGO_BARRAS.*, Cantidad.*, Lote.*, Fecha_Vencimiento.*, Almacen.*, Nombre_Pasillo.*, UDC.* FROM INVENTARIO');
        // dd($cop);
        
        $fecha_hora = new DateTime("now", new DateTimeZone('America/Bogota'));
        // dd($fecha_hora->format('Y-m-d H:i:s'));
        foreach($tableView as $tabla) {
            DB::table('CopiaWMS')->insert([
                'ItemCode' => $tabla['Articulo'],
                'Descirption'=> $tabla['Descripcion'],
                'BarCode'=> $tabla['CODIGO_BARRAS'],
                'Amount'=> $tabla['Cantidad'],
                'Lote'=> $tabla['Lote'],
                'DateExpiration'=> $tabla['Fecha_Vencimiento'],
                'Zone'=> $tabla['Almacen'],
                'Hallway'=> $tabla['Nombre_Pasillo'],
                'Compartment'=> $tabla['UDC'],
                'created_at' => $fecha_hora->format('Y-m-d H:i'),
            ]);
        }
        return redirect()->route('copia.index');        
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
        //
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
