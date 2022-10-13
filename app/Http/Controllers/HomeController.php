<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $invoices = DB::connection('sqlsrv2')->table('DAT_SCOMPART')->where('SCO_ARTICOLO', '<>', '')
        ->select('SCO_UDC','SCO_ARTICOLO','SCO_DVER')->get();
        
        $WMS = json_decode( json_encode( $invoices),true);
        // dd($WMS);
        return view('home', compact('WMS'));
    }
}
