<?php

namespace App\Http\Controllers;

use App\Models\Conteos;
use App\Models\CopiaWMS;
use App\Models\DetalleConteos1;
use App\Models\DetalleConteos2;
use App\Models\DetalleConteos3;
use App\Models\ModelosRecuento;
use App\Models\Roles;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class AsignController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ValidarRol']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha_hora = new DateTime("now", new DateTimeZone('America/Bogota'));
        
        $mytable = Conteos::all()->where('DateAsign', $fecha_hora->format('Y-m-d'));
        $mytable = json_decode( json_encode($mytable),true);
        
        $usuarios = User::all();
        $usuarios = json_decode( json_encode( $usuarios),true);

        $TipoConteo = ModelosRecuento::all();
        $TipoConteo = json_decode( json_encode( $TipoConteo),true);

        // dd($mytable);
        
        return view('pages.administrador.stractWMS.List', compact('mytable', 'usuarios', 'TipoConteo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fecha_hora = new DateTime("now", new DateTimeZone('America/Bogota'));

        $data = CopiaWMS::all();
        $data = json_decode( json_encode($data),true);
        
        $usuarios = User::all();
        $usuarios = json_decode( json_encode( $usuarios),true);

        $TipoConteo = ModelosRecuento::all();
        $TipoConteo = json_decode( json_encode( $TipoConteo),true);

        
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
        
        DB::beginTransaction();
            $conteo = Conteos::create([
                'Model_id' => $input["modelo_conteo"],
                "DateAsign" => $fecha_hora->format('Y-m-d'),
                "User1" => $input['user1'],
                "User2" => $input['user2'],
                "User3" => $input['user3'],
                'State1'=>  0,
                'State2'=>  0,
                'State3'=>  0,
            ]);
            $conteo = json_decode(json_encode($conteo),true);

            if ((!isset($input["productos"]) && !isset($input["zona_pasillo"])) && !isset($input["ubicacion"])) {
                foreach($input["Zona"] as $key => $value){
                    $copi = CopiaWMS::all()->where('Zone', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $copi = json_decode( json_encode($copi),true);
                    foreach ($copi as $key => $val) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $val['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $val['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $val['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $val['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }
            }elseif ((!isset($input["Zona"]) && !isset($input["productos"])) && !isset($input["ubicacion"])) {
                
                foreach($input['zona_pasillo'] as $key => $value){
                    
                    $param = explode("-", $value);

                    $result = CopiaWMS::all()->where('Zone', $param[0])->where('Hallway', $param[1])->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $result = json_decode( json_encode($result),true);
                
                    foreach ($result as $key => $values) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $values['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }
            }elseif ((!isset($input["Zona"]) && !isset($input["zona_pasillo"])) && !isset($input["ubicacion"])) {
                
                foreach($input['productos'] as $key => $value){
                    // dd($value);
                    $result = CopiaWMS::all()->where('ItemCode', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $result = json_decode( json_encode($result),true);
                
                    foreach ($result as $key => $values) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $values['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }
            }elseif ((!isset($input["Zona"]) && !isset($input["zona_pasillo"])) && !isset($input["productos"])) {
                
                foreach($input['ubicacion'] as $key => $value){

                    $result = CopiaWMS::all()->where('Location', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $result = json_decode( json_encode($result),true);
                
                    foreach ($result as $key => $values) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $values['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }
            }else{

                foreach($input["Zona"] as $key => $value){
                    $copi = CopiaWMS::all()->where('Zone', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $copi = json_decode( json_encode($copi),true);
                    foreach ($copi as $key => $val) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $val['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $val['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $val['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $val['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }
                
                foreach($input['zona_pasillo'] as $key => $value){
                    
                    $param = explode("-", $value);

                    $result = CopiaWMS::all()->where('Zone', $param[0])->where('Hallway', $param[1])->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $result = json_decode( json_encode($result),true);
                
                    foreach ($result as $key => $values) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $values['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }
                
                foreach($input['productos'] as $key => $value){

                    $result = CopiaWMS::all()->where('ItemCode', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $result = json_decode( json_encode($result),true);
                
                    foreach ($result as $key => $values) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $values['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }
                
                foreach($input['ubicacion'] as $key => $value){

                    $result = CopiaWMS::all()->where('Location', $value)->where('DateCopy', $fecha_hora->format("Y-m-d"))->where('State', 0);
                    $result = json_decode( json_encode($result),true);
                
                    foreach ($result as $key => $values) {
                        DetalleConteos1::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos2::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        DetalleConteos3::create([
                            "Conteo_id" => $conteo['id'],
                            "Copia_id" => $values['id'],
                            "State" => 0,
                        ]);
                        $cop = CopiaWMS::where('id', $values['id'])->update([
                            'State' => 1,
                        ]);
                    }
                }

            }
        DB::commit();
        Alert::success('Asignado', 'Conteo asignado exitosamente.');
        return redirect()->route('asignar.index');
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
