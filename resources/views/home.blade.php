@extends('layouts.app')

@section('tittle', 'Inicio')
    
@section('content')
<div class="container">
    <div class="row justify-content-around my-4">
        <div class="col-3">
            <div class="d-grid gap-2">
                <button class="btn btn-dark" type="button" onclick="conteo1()">Conteo 1</button>
            </div>
        </div>
        <div class="col-3">
            <div class="d-grid gap-2">
                <button class="btn btn-dark" type="button" onclick="conteo2()">Conteo 2</button>
              </div>
        </div>
        <div class="col-3">
            <div class="d-grid gap-2">
                <button class="btn btn-dark" type="button" onclick="conteo3()">Conteo 3</button>
              </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="titulo"></h2>
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
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla">

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

@section('js')

    <script>
        
        let con1 = <?php echo json_encode($WMS1)?>;
        let con2 = <?php echo json_encode($WMS2)?>;
        let con3 = <?php echo json_encode($WMS3)?>;

        

        function conteo1() {
            console.log(con1);
            
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
            console.log(con2);
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
            console.log(con3);
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

        
        if (con1 !== '') {
            conteo1();
        }else if (con2 == '') {
            conteo2();
        }else if (con3 !== '') {
            conteo3();
        }
    </script>

@endsection
