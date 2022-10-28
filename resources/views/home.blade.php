@extends('layouts.app')

@section('tittle', 'Inicio')
    
@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Bienvenida</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <h3 class="text-center">
                            Bienvenido {{ Auth::user()->Rol_id == 1 ? "Administrador" : "Operario"}} {{ Auth::user()->name }} tu cuentas con {{$total > 1 ? $total." Conteos" : $total." conteo"}} por realizar.
                        </h3>
                        <div class="col-12 text-center">
                            <div class="row justify-content-center">
                                <div class="tile_count d-flex justify-content-center">
                                    <a class="tile_stats_count" href="{{route('conteos.index')}}">
                                        <div class="col-md-2 col-sm-4">
                                            <span class="count_top"><i class="fa fa-user"></i> Conteo N°1</span>
                                            <div class="count">{{$WMS1}}</div>
                                        </div>
                                    </a>
                                    <a class="tile_stats_count" href="{{route('conteos.index')}}">
                                        <div class="col-md-2 col-sm-4">
                                            <span class="count_top"><i class="fa fa-clock-o"></i> Conteo N°2</span>
                                            <div class="count">{{$WMS2}}</div>
                                        </div>
                                    </a>
                                    <a class="tile_stats_count" href="{{route('conteos.index')}}">
                                        <div class="col-md-2 col-sm-4">
                                            <span class="count_top"><i class="fa fa-user"></i> Conteo N°3</span>
                                            <div class="count green">{{$WMS3}}</div>
                                        </div>
                                    </a>
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

@section('js')

    <script>
        
        const con1 = <?php echo json_encode($WMS1)?>;
        const con2 = <?php echo json_encode($WMS2)?>;
        const con3 = <?php echo json_encode($WMS3)?>;

        
        function conteo1() {

            if (con1 == '') {
                alert('No Tienes asignados para primer conteo');
            }else{
                $('#titulo').html(`Asignados<small>Conteo 1</small>`);
                $('#tabla').html('');
                for (let cont1 of con1) {
                    $('#tabla').append(`
                        <tr>
                            <td>${cont1['id']}</td>
                            <td>${cont1['Model_id']}</td>
                            <td>${cont1['State']}</td>
                        </tr>
                    `);
                }
            }

        }

        function conteo2() {
            
            if (con2 == '') {
                alert('No Tienes asignados para segundo conteo');
            }else{
                $('#titulo').html(`Asignados<small>Conteo 2</small>`);
                $('#tabla').html('');
                for (let cont2 of con2) {
                    $('#tabla').append(`
                        <tr>
                            <td>${cont2['id']}</td>
                            <td>${cont2['Model_id']}</td>
                            <td>${cont2['State']}</td>
                        </tr>
                    `);
                }
            }
        }

        function conteo3() {
            if (con3 == '') {
                alert('No Tienes asignados para tercer conteo');
            }else{
                $('#titulo').html(`Asignados<small>Conteo 3</small>`);
                $('#tabla').html('');
                for (let cont3 of con3) {
                    $('#tabla').append(`
                        <tr>
                            <td>${cont3['id']}</td>
                            <td>${cont3['Model_id']}</td>
                            <td>${cont3['State']}</td>
                        </tr>
                    `);
                }
            }

        }

        
      
    </script>

@endsection
