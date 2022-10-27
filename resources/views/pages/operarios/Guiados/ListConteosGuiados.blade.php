@extends('layouts.app')

@section('tittle', 'Lista Guiados')
    
@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista Conteos <small>
                        <a class="btn btn-sm btn-outline-dark" href="{{route('conteos.index')}}">Volver</a>    
                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                        </li>
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li> --}}
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <table  class="table table-hover tbl">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Ubicacion</th>
                                <th>Cantidad</th>
                                <th>Estado Linea</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($response as $key => $prod)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td>{{$prod['ItemCode']}}</td>
                                        <td>{{$prod['Description']}}</td>
                                        <td>{{$prod['Location']}}</td>
                                        <td>{{round($prod['Amount'])}}</td>
                                        <td>{{$prod['State_line']}}</td>
                                        <td><a class="btn btn-info btn-sm" href="{{route('conteos.edit', $prod['d_id'])}}">Contar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($NR == 0)
                            <div class="ln_solid"></div>
                            <div class=" row">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('changestate', $prod['id'])}}" class="btn btn-success">Finalizar</a>
                                </div>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script>
        
      
    </script>

@endsection
