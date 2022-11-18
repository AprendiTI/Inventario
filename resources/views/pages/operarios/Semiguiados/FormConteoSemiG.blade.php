@extends('layouts.app')

@section('tittle', 'Formulario guiados')
    
@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulario de conteo semiguiados
                        <a href="{{url()->previous()}}" class="btn btn-outline-dark btn-sm" type="button">Volver</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up text-dark"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="CodeBar"> <i class="fa fa-barcode"></i> </span>
                                <input type="text" class="form-control" placeholder="Codigo de barras" aria-label="Codigo de barras" aria-describedby="CodeBar" id="code_bar" autofocus onchange="lector()">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-secondary" onclick="Mostrar()"> <i class="fa fa-eye"></i> </button>
                        </div>
                    </div>

                    @foreach($response as $key => $artc)
                        <br />
                        
                        <div class="contenedor d-none" id="{{$artc['BarCode']}}">
                            <form method="post" action="{{route('conteos.update', $artc['d_id'])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                <div id="metodo">
                                    @method('put')
                                </div>
                                <h5 class="text-center pb-4 text-danger">Producto N° {{$key+1}}</h5>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Zona <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" required="required" class="form-control " value="{{$artc['Zone']}}" name="Zone" readonly>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pasillo <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" required="required" class="form-control " value="{{$artc['Hallway']}}" name="Hallway" readonly>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ubicación <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" required="required" class="form-control " value="{{$artc['Location']}}" name="Location" readonly>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">cogido del artículo <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" required="required" class="form-control " value="{{$artc['ItemCode']}}" name="ItemCode" readonly>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del artículo <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" required="required" class="form-control " value="{{$artc['Description']}}" name="Description" readonly>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Lote <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" required="required" class="form-control " value="{{$artc['Lote']}}" name="Lote" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Fecha de vencimiento <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="birthday" class="date-picker form-control" name="fecha" value="{{$artc['DateExpiration']}}"  placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="numeric" id="first-name" required="required" class="form-control " value="" name="Amount">
                                        </div>
                                    </div>
                                    <div class="item form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Comentarios
                                        </label>
                                        <div class="col-md-6 col-sm-6  ">
                                            <textarea class="form-control" rows="3" name="Coments" placeholder=""></textarea>
                                        </div>
                                    </div>

                                <div class=" row">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Finalizar</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="button" id="agre" onclick="saveAgre()" class="btn btn-success">finalizar y agregar nuevo</button>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>

                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script>
        var codigos = <?php echo json_encode($BarCodes)?>;

        $("#code_bar").focus();


        function lector() {

            let barcode = $("#code_bar").val();

            let incluye = codigos.includes(barcode);

            if (incluye) {
                $("#"+barcode).removeClass('d-none');
                $("#code_bar").val('');
                $("#code_bar").focus();
            }else {
                codigos.forEach(element => {
                    $("#"+element).addClass('d-none');
                });

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Producto',
                text: "¡Este producto no es el que corresponde a esta ubicación!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Reintentar',
                cancelButtonText: 'Agregar',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#code_bar").val('');
                    $("#code_bar").focus();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    let id = <?php echo $id ?>;
                    console.log(id);
                    let url = "{{route('newprod', "${id}")}}"
                    $(location).attr('href', url)
                }
                })

                $("#code_bar").val('');
                $("#code_bar").focus();
            }
        }
      
        function saveAgre() {
            $("#metodo").html(``);
            let id = <?php echo $id?>;
            let url = "{{route('countAgre', "${id}")}}";
            $("#demo-form2").attr('action', url)
            $("#demo-form2").submit();

        }
        function Mostrar() {
            $(".contenedor").removeClass('d-none');
        }
    </script>
@endsection
