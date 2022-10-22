@extends('layouts.app')

@section('tittle', 'Inicio')
    
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            
            <div class=" col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{route('copia.create')}}" class="btn btn-outline-dark">Consultar inventario</a>
                        <a href="{{route('asignar.create')}}" class="btn btn-outline-dark">Asignar</a>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content2">
                        <div class="row" style="width: 100%">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive" style="width:100%">
                                    <table id="tbl" class="table table-striped table-hover table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo conteo</th>
                                                <th>Usuario Conteo N°1</th>
                                                <th>Usuario Conteo N°2</th>
                                                <th>Usuario Conteo N°3</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($TableCopy as $key => $val)
                                                <tr>
                                                    <td>{{$val['id']}}</td>
                                                    @foreach($TipoConteo as $TC)
                                                        @if($TC['Id'] == $val['Model_id'])
                                                            <td>{{$TC['Model']}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($usuarios as $us1)
                                                        @if($us1['id'] == $val['User1'])
                                                            <td>{{$us1['name']}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($usuarios as $us2)
                                                        @if($us2['id'] == $val['User2'])
                                                            <td>{{$us2['name']}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($usuarios as $us3)
                                                        @if($us3['id'] == $val['User3'])
                                                            <td>{{$us3['name']}}</td>
                                                        @endif
                                                    @endforeach
                                                    @if($val['State']== 0)
                                                        <td>Asignado</td>
                                                    @endif
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
@endsection
