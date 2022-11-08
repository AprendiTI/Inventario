@extends('layouts.app')

@section('tittle', 'Lista Conteos')
    
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            <div class=" col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                       <h2>Informe Conteos</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row" style="width: 100%">
                            <div class="col-sm-12">
                                
                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#c1" role="tab" aria-controls="c1" aria-selected="true">Conteo N° 1</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#c2" role="tab" aria-controls="c2" aria-selected="false">Conteo N° 2</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#c3" role="tab" aria-controls="c3" aria-selected="false">Conteo N° 3</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="c1" role="tabpanel" aria-labelledby="c1-tab">
                                        <h4 class="text-center text-danger py-3">Conteo N°1 </h4>
                                        <div class="card-box table-responsive" style="width:100%">  
                                            <table class="table table-striped table-hover table-bordered nowrap tbl" cellspacing="0" width="100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Tipo Conteo</th>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>Lote</th>
                                                        <th>Fecha vencimiento</th>
                                                        <th>Cantidad actual</th>
        
                                                        <th>Usuario Ejecutor</th>
                                                        <th>Vencimiento 1</th>
                                                        <th>Lote 1</th>
                                                        <th>Cantidad 1</th>
                                                        <th>Fecha del Conteo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($informec1 as $key => $val)
                                                        <tr>
                                                            @foreach($TipoConteo as $TC)
                                                                @if($TC['Id'] == $val['Model_id'])
                                                                    <td>{{$TC['Model']}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td>{{$val['ItemCode']}}</td>
                                                            <td>{{$val['Description']}}</td>
                                                            <td>{{$val['Lote']}}</td>
                                                            <td>{{$val['DateExpiration']}}</td>
                                                            <td>{{round($val['Amount'])}}</td>
        
                                                            @foreach($usuarios as $us3)
                                                                @if($us3['id'] == $val['User1'])
                                                                    <td class="table-danger">{{$us3['name']}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td class="table-danger">{{$val['Vencimiento_1']}}</td>
                                                            <td class="table-danger">{{$val['Lote_1']}}</td>
                                                            <td class="table-danger">{{round($val['cantidad_1'])}}</td>
                                                            <td class="">{{$val['DateAsign']}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="c2" role="tabpanel" aria-labelledby="c2-tab">
                                        <h4 class="text-center text-danger py-3">Conteo N°2 </h4>
                                        <div class="card-box table-responsive" style="width:100%">  
                                            <table class="table table-striped table-hover table-bordered nowrap tbl" cellspacing="0" width="100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Tipo Conteo</th>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>Lote</th>
                                                        <th>Fecha vencimiento</th>
                                                        <th>Cantidad actual</th>
        
                                                        <th>Usuario Ejecutor</th>
                                                        <th>Vencimiento 2</th>
                                                        <th>Lote 2</th>
                                                        <th>Cantidad 2</th>
                                                        <th>Fecha del Conteo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($informec2 as $key => $val)
                                                        <tr>
                                                            @foreach($TipoConteo as $TC)
                                                                @if($TC['Id'] == $val['Model_id'])
                                                                    <td>{{$TC['Model']}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td>{{$val['ItemCode']}}</td>
                                                            <td>{{$val['Description']}}</td>
                                                            <td>{{$val['Lote']}}</td>
                                                            <td>{{$val['DateExpiration']}}</td>
                                                            <td>{{round($val['Amount'])}}</td>
        
                                                            @foreach($usuarios as $us3)
                                                                @if($us3['id'] == $val['User2'])
                                                                    <td class="table-danger">{{$us3['name']}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td class="table-danger">{{$val['Vencimiento_2']}}</td>
                                                            <td class="table-danger">{{$val['Lote_2']}}</td>
                                                            <td class="table-danger">{{round($val['cantidad_2'])}}</td>
                                                            <td class="">{{$val['DateAsign']}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="c3" role="tabpanel" aria-labelledby="c3-tab">
                                        <h4 class="text-center text-danger py-3"> Conteo N°3 </h4>
                                        <div class="card-box table-responsive" style="width:100%">  
                                            <table class="table table-striped table-hover table-bordered nowrap tbl" cellspacing="0" width="100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Tipo Conteo</th>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>Lote</th>
                                                        <th>Fecha vencimiento</th>
                                                        <th>Cantidad actual</th>
        
                                                        <th>Usuario Ejecutor</th>
                                                        <th>Vencimiento 3</th>
                                                        <th>Lote 3</th>
                                                        <th>Cantidad 3</th>
                                                        <th>Fecha del Conteo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($informec3 as $key => $val)
                                                        <tr>
                                                            @foreach($TipoConteo as $TC)
                                                                @if($TC['Id'] == $val['Model_id'])
                                                                    <td>{{$TC['Model']}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td>{{$val['ItemCode']}}</td>
                                                            <td>{{$val['Description']}}</td>
                                                            <td>{{$val['Lote']}}</td>
                                                            <td>{{$val['DateExpiration']}}</td>
                                                            <td>{{round($val['Amount'])}}</td>
        
                                                            @foreach($usuarios as $us3)
                                                                @if($us3['id'] == $val['User3'])
                                                                    <td class="table-danger">{{$us3['name']}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td class="table-danger">{{$val['Vencimiento_3']}}</td>
                                                            <td class="table-danger">{{$val['Lote_3']}}</td>
                                                            <td class="table-danger">{{round($val['cantidad_3'])}}</td>
                                                            <td class="">{{$val['DateAsign']}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
