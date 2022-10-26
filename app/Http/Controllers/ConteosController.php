<?php

namespace App\Http\Controllers;

use App\Models\Conteos;
use App\Models\DetalleConteos;
use App\Models\ModelosRecuento;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConteosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        $conteo1 = Conteos::all()->where('User1',  Auth::user()->id)->where('DateAsign', $fecha_hora->format('Y-m-d'))->where("State", 0);
        
        $WMS1 = json_decode( json_encode($conteo1),true);

        // dd ($WMS1);

        
        // $conteo2 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User2', Auth::user()->id)
        // ->get();

        $conteo2 = Conteos::all()->where('User2',  Auth::user()->id)->where('DateAsign', $fecha_hora->format('Y-m-d'))->where("State", 0);

        $WMS2 = json_decode( json_encode($conteo2),true);

        // dd ($WMS2);
        
        
        // $conteo3 = CopiaWMS::select("CopiaWMS.*","DetalleConteos.*","Conteos.*")->join("DetalleConteos", "CopiaWMS.id", "=", "DetalleConteos.Copia_id")
        // ->join("Conteos","Conteos.id", "=", "DetalleConteos.Conteo_id" )
        // ->where('CopiaWMS.DateCopy', $fecha_hora->format('Y-m-d'))
        // ->where('Conteos.User3', Auth::user()->id)
        // ->get();

        $conteo3 = Conteos::all()->where('User3',  Auth::user()->id)->where('DateAsign', $fecha_hora->format('Y-m-d'))->where("State", 0);
        
        $WMS3 = json_decode( json_encode($conteo3),true);

        // dd ($WMS3);

        return view('pages.operarios.Conteos.ListConteos', compact('TipoConteo','WMS1', 'WMS2', 'WMS3',));
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
        
        $tipoc = Conteos::select('Model_id')->where('id', $id)->get();
        $tipoc = json_decode( json_encode($tipoc),true);
        $tipoc = $tipoc[0]['Model_id'];

        $response = Conteos::select(
            'Conteos.id',
            'Conteos.State as State_cont',
            'Conteos.User1 as u1',
            'Conteos.User2 as u2',
            'Conteos.User3 as u3',
            'DetalleConteos.id as d_id',
            'Conteos.Model_id',
            'Conteos.State',
            'CopiaWMS.ItemCode',
            'CopiaWMS.Description',
            'CopiaWMS.BarCode',
            'CopiaWMS.Amount',
            'CopiaWMS.Lote',
            'CopiaWMS.DateExpiration',
            'CopiaWMS.Zone',
            'CopiaWMS.Hallway',
            'CopiaWMS.Location',
            'CopiaWMS.Compartment',
            'CopiaWMS.DateCopy',
        )
        ->join('DetalleConteos', 'Conteos.id',"=", "DetalleConteos.Conteo_id")
        ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos.Copia_id')
        ->where('detalleConteos.id', $id)
        ->get();

        $response = json_decode( json_encode($response),true);
        $artc = $response[0];
        // dd($artc);
        // dd($id);
        if($tipoc == 1){
            return view('pages.operarios.Ciegos.FormConteoCiegos', compact('id','artc'));
        }elseif ($tipoc == 2) {
            return view('pages.operarios.Guiados.FormConteoGuiados', compact('id','artc'));
        }elseif ($tipoc == 3) {
            return view('pages.operarios.Semiguiados.FormConteoSemiG', compact('id','artc'));
        }
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
        session_start();
        
        $input = $request->all();

        // dd($input);
        

            if ($_SESSION['NCONTEO'] == "c1") {
                DetalleConteos::where('id', $id)->update([
                    'Amount1' => $input['Amount'],
                    'Lote1' => $input['Lote'],
                    'DateExpiration1' => $input['fecha'],
                ]);
            }elseif ($_SESSION['NCONTEO'] == "c2") {
                DetalleConteos::where('id', $id)->update([
                    'Amount2' => $input['Amount'],
                    'Lote2' => $input['Lote'],
                    'DateExpiration2' => $input['fecha'],
                ]);
            }else if ($_SESSION['NCONTEO'] == "c3") {
                DetalleConteos::where('id', $id)->update([
                    'Amount3' => $input['Amount'],
                    'Lote3' => $input['Lote'],
                    'DateExpiration3' => $input['fecha'],
                ]);
            }
        
            $detalle = DetalleConteos::find($id);

        return redirect()->route('lista', ['id'=>$detalle['id'],'ncount'=>$_SESSION['NCONTEO']]);

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

    public function Lista($id, $ncount)
    {
        // dd($ncount);
        
        session_start();
        
        $_SESSION['NCONTEO'] = $ncount;
        $tipoc = Conteos::select('Model_id')->where('id', $id)->get();
        $tipoc = json_decode( json_encode($tipoc),true);
        $tipoc = $tipoc[0]['Model_id'];
        $response = Conteos::select(
            'Conteos.id',
            'DetalleConteos.id as d_id',
            'Conteos.Model_id',
            'Conteos.State',
            'CopiaWMS.ItemCode',
            'CopiaWMS.Description',
            'CopiaWMS.BarCode',
            'CopiaWMS.Amount',
            'CopiaWMS.Lote',
            'CopiaWMS.DateExpiration',
            'CopiaWMS.Zone',
            'CopiaWMS.Hallway',
            'CopiaWMS.Location',
            'CopiaWMS.Compartment',
            'CopiaWMS.DateCopy',
        )
        ->join('DetalleConteos', 'Conteos.id',"=", "DetalleConteos.Conteo_id")
        ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos.Copia_id')
        ->where('Conteos.id', $id)
        ->get();
        $response = json_decode( json_encode($response),true);
        // dd($response);
        if($tipoc == 1){
            return view('pages.operarios.Ciegos.ListConteosCiegos', compact('response'));
        }elseif ($tipoc == 2) {
            return view('pages.operarios.Guiados.ListConteosGuiados', compact('response'));
        }elseif ($tipoc == 3) {
            return view('pages.operarios.Semiguiados.ListConteosSemiG', compact('response'));
        }

    }
}
