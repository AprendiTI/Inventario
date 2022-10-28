<?php

namespace App\Http\Controllers;

use App\Models\Conteos;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function Lista($id)
    {
        session_start();
        
        $ncount = $_SESSION['NCONTEO'];
        $tipoc = Conteos::select('Model_id')->where('id', $id)->get();
        $tipoc = json_decode( json_encode($tipoc),true);
        $tipoc = $tipoc[0]['Model_id'];
        // dd($tipoc);
        if($ncount == 'c1') {
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
                
                return view('pages.operarios.Ciegos.ListConteosCiegos', compact('NR','response'));

            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->get();
                
                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);

                return view('pages.operarios.Guiados.ListConteosGuiados', compact('NR','response'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
    
                return view('pages.operarios.Semiguiados.ListConteosSemiG', compact('NR','response'));
            }
        }elseif ($ncount == 'c2'){
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
                
                return view('pages.operarios.Ciegos.ListConteosCiegos', compact('NR','response'));

            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->get();
                
                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);

                return view('pages.operarios.Guiados.ListConteosGuiados', compact('NR','response'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
    
                return view('pages.operarios.Semiguiados.ListConteosSemiG', compact('NR','response'));
            }
        }elseif ($ncount == 'c3') {
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
                
                return view('pages.operarios.Ciegos.ListConteosCiegos', compact('NR','response'));

            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->get();
                
                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);

                return view('pages.operarios.Guiados.ListConteosGuiados', compact('NR','response'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
    
                return view('pages.operarios.Semiguiados.ListConteosSemiG', compact('NR','response'));
            }
        }

    }
    
    public function FormUbi($id, $ncount)
    {
        session_start();
        
        $_SESSION['NCONTEO'] = $ncount;
        $tipoc = Conteos::select('Model_id')->where('id', $id)->get();
        $tipoc = json_decode( json_encode($tipoc),true);
        $tipoc = $tipoc[0]['Model_id'];
        // dd($tipoc);
        if($ncount == 'c1') {
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
                
                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Ciegos.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));

            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->get();
                
                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);

                // dd($response);

                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Guiados.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
    
                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Semiguiados.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));
            }
        }elseif ($ncount == 'c2'){
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
                
                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Ciegos.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));

            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->get();
                
                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);

                // dd($response);

                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Guiados.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
    
                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Semiguiados.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));
            }
        }elseif ($ncount == 'c3') {
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
                
                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Ciegos.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));

            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->get();
                
                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);

                // dd($response);

                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Guiados.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->get();

                $NR = $response->where('State_line', 0)->count();
                
                $response = json_decode( json_encode($response),true);
    
                $zonas = [];
                foreach ($response as $key => $value) {
                    $zona = $value['Zone'];
                    if (!in_array($zona, $zonas)) {
                        $zonas[] = $zona;
                    }
                }
                
                $pasillos = [];
                foreach ($response as $key => $value) {
                    $pasillo = $value['Hallway'];
                    if (!in_array($pasillo, $pasillos)) {
                        $pasillos[] = $pasillo;
                    }
                }

                return view('pages.operarios.Semiguiados.FormUbicacion', compact('id','NR','response', 'zonas', 'pasillos'));
            }
        }

    }

    public function ubiSearch(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        
        session_start();        
        if($_SESSION['NCONTEO'] == 'c1') {
            $tipoc = Conteos::select('Model_id')->where('id', $id)->get();
            $tipoc = json_decode( json_encode($tipoc),true);
            $tipoc = $tipoc[0]['Model_id'];
            // dd($detalleRes);
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);
                
                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }
                
                return view('pages.operarios.Ciegos.FormConteoCiegos', compact('id','response'));
            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);

                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }
    
                return view('pages.operarios.Guiados.FormConteoGuiados', compact('id','response'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User1 as u1',
                    'Conteos.Model_id',
                    'Conteos.State1 as State_cont',
                    'DetalleConteos1.id as d_id',
                    'DetalleConteos1.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos1', 'Conteos.id',"=", "DetalleConteos1.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos1.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos1.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);
                
                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }

                return view('pages.operarios.Semiguiados.FormConteoSemiG', compact('id','response'));
            }
        }elseif ($_SESSION['NCONTEO'] == 'c2'){
            $tipoc = Conteos::select('Model_id')->where('id', $id)->get();
            $tipoc = json_decode( json_encode($tipoc),true);
            $tipoc = $tipoc[0]['Model_id'];
            // dd($detalleRes);
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);
                
                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }
                
                return view('pages.operarios.Ciegos.FormConteoCiegos', compact('id','response'));
            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);

                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }
    
                return view('pages.operarios.Guiados.FormConteoGuiados', compact('id','response'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User2 as u2',
                    'Conteos.Model_id',
                    'Conteos.State2 as State_cont',
                    'DetalleConteos2.id as d_id',
                    'DetalleConteos2.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos2', 'Conteos.id',"=", "DetalleConteos2.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos2.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos2.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);
                
                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }

                return view('pages.operarios.Semiguiados.FormConteoSemiG', compact('id','response'));
            }
        }elseif ($_SESSION['NCONTEO'] == 'c3') {
            $tipoc = Conteos::select('Model_id')->where('id', $id)->get();
            $tipoc = json_decode( json_encode($tipoc),true);
            $tipoc = $tipoc[0]['Model_id'];
            // dd($detalleRes);
            if($tipoc == 1){
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);
                
                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }
                
                return view('pages.operarios.Ciegos.FormConteoCiegos', compact('id','response'));
            }elseif ($tipoc == 2) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);

                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }
    
                return view('pages.operarios.Guiados.FormConteoGuiados', compact('id','response'));
            }elseif ($tipoc == 3) {
                $response = Conteos::select(
                    'Conteos.id',
                    'Conteos.User3 as u3',
                    'Conteos.Model_id',
                    'Conteos.State3 as State_cont',
                    'DetalleConteos3.id as d_id',
                    'DetalleConteos3.State as State_line',
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
                    'CopiaWMS.State as State_Copy',
                )
                ->join('DetalleConteos3', 'Conteos.id',"=", "DetalleConteos3.Conteo_id")
                ->join('CopiaWMS', 'CopiaWMS.id', '=', 'DetalleConteos3.Copia_id')
                ->where('Conteos.id', $id)
                ->where('DetalleConteos3.State', 0)
                ->where('CopiaWMS.Zone', $inputs['Zone'])
                ->where('CopiaWMS.Hallway', $inputs['Hallway'])
                ->where('CopiaWMS.Location', $inputs['Location'])
                ->get();
                
                $response = json_decode( json_encode($response),true);
                
                if ($response == []) {
                    Alert::warning('Ubicacion', 'Ubicacion no existente o no se te fue asignada.');
                    return redirect()->back();
                }

                return view('pages.operarios.Semiguiados.FormConteoSemiG', compact('id','response'));
            }
        }
    }
}
