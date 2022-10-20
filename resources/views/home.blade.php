@extends('layouts.app')

@section('tittle', 'Inicio')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos WMS<small>General</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li> --}}
                        {{-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li> --}}
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="tbl" class="table table-striped table-hover table-bordered nowrap" cellspacing="0" width="100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>UDC</th>
                                            <th>Codigo</th>
                                            <th>Vencimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($WMS as $key => $val)
                                            <tr>
                                                <td>{{$key}}</td>
                                                <td>{{$val['SCO_UDC']}}</td>
                                                <td>{{$val['SCO_ARTICOLO']}}</td>
                                                <td>{{$val['SCO_DVER']}}</td>
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
        {{-- <div class="col-md-10">
            <div class="card">
                <table class="table table-hover table-striped table-light">
                    <thead class="table-dark">
                        <tr>
                            <td>UDC</td>
                            <td>Codigo</td>
                            <td>Vencimiento</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div> --}}
    </div>
</div>
@endsection
