<?php

namespace App\Http\Controllers;

use App\Models\Conteos;
use App\Models\CopiaWMS;
use App\Models\DetalleConteos;
use App\Models\ModelosRecuento;
use App\Models\Roles;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = DB::select('select * from CopiaWMS');
        $data = CopiaWMS::all();
        $data = json_decode( json_encode($data),true);
        
        // $usuarios = DB::select('select * from Users');
        $usuarios = User::all();
        $usuarios = json_decode( json_encode( $usuarios),true);

        // $TipoConteo = DB::select('select * from Modelos_recuento');
        $TipoConteo = ModelosRecuento::all();
        $TipoConteo = json_decode( json_encode( $TipoConteo),true);

        // dd($TipoConteo);
        return view('pages.administrador.stractWMS.FormAsign', compact('data', 'usuarios', 'TipoConteo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        
        $fecha_hora = new DateTime("now", new DateTimeZone('America/Bogota'));
        
        // $copi = CopiaWMS::all();
        // $copi = json_decode( json_encode($copi),true);
        // dd($copi);
        DB::beginTransaction();
        $conteo = Conteos::create([
            'Model_id' => $input["modelo_conteo"],
            "User1" => $input['user1'],
            "User2" => $input['user2'],
            "User3" => $input['user3'],
            'State'=>  0,
        ]);
        $conteo = json_decode( json_encode($conteo),true);

        if (!isset($input["productos"]) && !isset($input["zona_pasillo"])) {
            foreach($input["Zona"] as $key => $value){
                $copi = CopiaWMS::all()->where('Zone', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"));
                $copi = json_decode( json_encode($copi),true);
                foreach ($copi as $key => $val) {
                    DetalleConteos::create([
                        "Conteo_id" => $conteo['id'],
                        "Copia_id" => $val['id'],
                    ]);
                }
            }
        // }
        }elseif (!isset($input["Zona"]) && !isset($input["productos"])) {
            
            foreach($input['zona_pasillo'] as $key => $value){
                
                $param = explode("-", $value);

                $result = CopiaWMS::all()->where('Zone', $param[0])->where('Hallway', $param[1])->where('DateCopy', $fecha_hora->format("Y-m-d"));
                $result = json_decode( json_encode($result),true);
              
                foreach ($result as $key => $values) {
                    DetalleConteos::create([
                        "Conteo_id" => $conteo['id'],
                        "Copia_id" => $values['id'],
                    ]);
                }
            }
        }
        elseif (!isset($input["Zona"]) && !isset($input["zona_pasillo"])) {
            
            foreach($input['productos'] as $key => $value){
                
                // $param = explode("-", $value);

                $result = CopiaWMS::all()->where('Description', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"));
                $result = json_decode( json_encode($result),true);
              
                foreach ($result as $key => $values) {
                    DetalleConteos::create([
                        "Conteo_id" => $conteo['id'],
                        "Copia_id" => $values['id'],
                    ]);
                }
            }
        }
        // else{

        // }
        
        DB::commit();
        return redirect()->route('copia.index');
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
