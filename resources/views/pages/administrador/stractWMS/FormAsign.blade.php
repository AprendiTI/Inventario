@extends('layouts.app')

@section('tittle', 'Inicio')
    
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{route('asignar.store')}}" method="post">
                @csrf
                <div class=" col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            {{-- <a href="{{route('copia.create')}}" class="btn btn-outline-dark">Consultar inventario</a> --}}
                            <h2>Cabecera<small>Asignación</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="width: 100%;">
                            <div class="row" style="width: 100%">
                                <div class="col-sm-12">
                                    <div class="card-box" style="width:100%">
                                        <div class="row">
                                            <div class="col-12 py-4 pl-3">
                                                <label for="modeloConteo">Tipo de conteo <b style="color: red;"> *</b></label>
                                                <select id="modeloConteo" class="form-control selectnormal" name="modelo_conteo" required>
                                                    <option value=""> </option>
                                                    @foreach($TipoConteo as $tipo)
                                                        <option value="{{$tipo['Id']}}">{{$tipo['Model']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class=" col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            {{-- <a href="{{route('copia.create')}}" class="btn btn-outline-dark">Consultar inventario</a> --}}
                            <h2>Detalle <small>Asignación</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="width: 100%;">
                            <div class="row">
                                <div class="col-12 col-md-4 py-4 pl-3">
                                    <label for="user1">Usuario conteo 1 <b style="color: red;"> *</b></label>
                                    <select id="user1" class="form-control selectnormal" name="user1" required>
                                        <option value=""> </option>
                                        @foreach($usuarios as $user1)
                                            <option value="{{$user1['id']}}">{{$user1['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 py-4 pl-3">
                                    <label for="user2">Usuario conteo 2 <b style="color: red;"> *</b></label>
                                    <select id="user2" class="form-control selectnormal" name="user2" required>
                                        <option value=""> </option>
                                        @foreach($usuarios as $user2)
                                            <option value="{{$user2['id']}}">{{$user2['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 py-4 pl-3">
                                    <label for="user3">Usuario conteo 3 <b style="color: red;"> *</b></label>
                                    <select id="user3" class="form-control selectnormal" name="user3" required>
                                        <option value=""> </option>
                                        @foreach($usuarios as $user3)
                                            <option value="{{$user3['id']}}">{{$user3['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="width: 100%">
                                <div class="col-sm-12 scroll">
                                    <ul class="nav nav-pills nav-fill flex-column float-md-left pr-3" id="myTab" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active py-2" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">Zona</a>
                                        </li>
                                        <li class="nav-item py-2">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">Zona y pasillo</a>
                                        </li>
                                        <li class="nav-item py-2">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">Producto</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row justify-content-center">
                                                <div class="col-10 py-3">
                                                    <label for="por_zona" class="form-label">Zonas.</label>
                                                    <select class="form-select multiple-select-field" id="por_zona" name="Zona[]" data-placeholder="Seleccionar Zona" style="width: 100%" multiple>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row justify-content-center">
                                                <div class="col-10 py-3">
                                                    <label for="zona_pasillo" class="form-label">Zonas.</label>
                                                    <select class="form-select multiple-select-field" id="zona_pasillo" name="zona_pasillo[]" data-placeholder="Seleccionar Zona-Pasillo" style="width: 100%" multiple>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row justify-content-center">
                                                <div class="col-10 py-3">
                                                    <label for="productos" class="form-label">Productos.</label>
                                                    <select class="form-select multiple-select-field" id="productos" name="productos[]" data-placeholder="Seleccionar Producto" style="width: 100%" multiple>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
  
                                    {{-- <ul class="nav nav-tabs bar_tabs d-flex justify-content-around" id="myTab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                      </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                                            synth. Cosby sweater eu banh mi, qui irure terr.
                                      </div>
                                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                            booth letterpress, commodo enim craft beer mlkshk aliquip
                                      </div>
                                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                            booth letterpress, commodo enim craft beer mlkshk 
                                      </div>
                                    </div> --}}
                                    {{-- <div class="card-box" style="width:100%">
                                        <div class="row">
                                            <div class="col-12 col-md-4 py-4 pl-3">
                                                <label for="heard">Usuario conteo 1 <b style="color: red;"> *</b></label>
                                                <select id="heard" class="form-control" name="user1" required>
                                                    <option value=""> </option>
                                                    @foreach($usuarios as $user1)
                                                        <option value="{{$user1['id']}}">{{$user1['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4 py-4 pl-3">
                                                <label for="heard">Usuario conteo 2 <b style="color: red;"> *</b></label>
                                                <select id="heard" class="form-control" name="user2" required>
                                                    <option value=""> </option>
                                                    @foreach($usuarios as $user2)
                                                        <option value="{{$user2['id']}}">{{$user2['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4 py-4 pl-3">
                                                <label for="heard">Usuario conteo 3 <b style="color: red;"> *</b></label>
                                                <select id="heard" class="form-control" name="user3" required>
                                                    <option value=""> </option>
                                                    @foreach($usuarios as $user3)
                                                        <option value="{{$user3['id']}}">{{$user3['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <table id="tbl" class="table table-striped table-bordered bulk_action" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                            <th><input type="checkbox" id="check-all" onclick="check_all()" ></th>
                                                            </th>
                                                            <th>Ubicación</th>
                                                            <th>Codigo</th>
                                                            <th>Descripción</th>
                                                            <th>Lote</th>
                                                            <th>Fecha de vencimiento</th>
                                                        </tr>
                                                    </thead>
                            
                            
                                                    <tbody id="tabla">
                                                        @foreach($data as $datos)
                                                            <tr id="{{$datos['id']}}">
                                                                <td>
                                                                <th><input type="checkbox" id="check-{{$datos['id']}}" value="{{$datos['id']}}" name="lista[]" ></th>
                                                                </td>
                                                                <td>{{$datos['Location']}}</td>
                                                                <td>{{$datos['ItemCode']}}</td>
                                                                <td>{{$datos['Description']}}</td>
                                                                <td>{{$datos['Lote']}}</td>
                                                                <td>{{$datos['DateExpiration']}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit">Finalizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />


@endsection

@section('js')
    <!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.selectnormal' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
        $( '.multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
        $(document).ready(function() {
            let datos = <?php echo json_encode($data)?>;
            function zone() {
                let arregloZone = [];
                let cont = 0;
                for(let dat of datos) {
                    let id = dat['id']
                    let zona = dat['Zone'];
                    let incluye = arregloZone.includes(zona);
                        if (!incluye) {
                            arregloZone[cont] = zona, id;
                            cont+=1;
                        }
                }
                    // console.log(arregloZone);
                for(let zonas of arregloZone) {
                    $("#por_zona").append(`
                        <option value="${zonas}">${zonas}</option>
                            
                    
                    `);
                }
            }
            zone();

            function zonas_pasillos() {
                let arregloZP = [];
                let arregloenv = [];
                let cont2 = 0;
                for(let pas of datos) {
                    let pasillo = pas['Hallway']
                    let zonaP = pas['Zone'];
                    let incluye = arregloZP.includes(zonaP+"-"+pasillo);
                        if (!incluye) {
                            arregloZP[cont2] = zonaP+"-"+pasillo;
                            cont2+=1;
                        }
                }

                for(let zonasPasillos of arregloZP) {
                    $("#zona_pasillo").append(`
                        <option value="${zonasPasillos}">${zonasPasillos}</option>
                            
                    `);
                }
            }
            zonas_pasillos();

            function productos() {
                let arregloProd = [];
                let cont3 = 0;
                for(let pas of datos) {
                    let nombre = pas['Description']
                    // let zonaP = pas['Zone'];
                    let incluye = arregloProd.includes(nombre);
                        if (!incluye) {
                            arregloProd[cont3] = nombre;
                            cont3+=1;
                        }
                }

                for(let ProductosL of arregloProd) {
                    $("#productos").append(`
                        <option value="${ProductosL}">${ProductosL}</option>
                            
                    `);
                }
            }
            productos();

            
        });

        // function check_all() {
        //     let check = $('#check-all').prop('checked');
        //     console.log(check);
        //     if (check) {
                
        //         $("#tabla").find("tr").each(function (idx, row) {
        //             id = $(this).attr('id');
        //             if (idx >= 0) {
        //                 let ubi = $("#check-"+id).prop('checked', true);
        //             }
        //         });
        //     }else{
        //         $('#check-all').prop('checked', false)
        //         $("#tabla").find("tr").each(function (idx, row) {
        //             id = $(this).attr('id');
        //             if (idx >= 0) {
        //                 let ubi = $("#check-"+id).prop('checked', false);
        //             }
        //         });
        //     }
        // }
    </script>
@endsection