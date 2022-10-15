@extends('layouts.app')

@section('tittle', 'Inicio')
    
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            
            <div class=" col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{route('copia.create')}}" class="btn btn-outline-dark">Consultar inventario</a>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row" style="width: 100%">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive" style="width:100%">
                                    <table id="tbl" class="table table-striped table-hover table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Cod Articulo</th>
                                                <th>Nombre articulo</th>
                                                <th>Cantidad</th>
                                                <th>fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($TableCopy as $key => $val)
                                                <tr>
                                                    <td>{{$val['id']}}</td>
                                                    <td>{{$val['ItemCode']}}</td>
                                                    <td>{{$val['Descirption']}}</td>
                                                    <td>{{round($val['Amount'])}}</td>
                                                    <td>{{$val['created_at']}}</td>
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
