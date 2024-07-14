@extends('adminlte::page')

@section('title', 'Compra')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <h4><strong>{{ __('Compras') }}</strong></h4>
                        </span>
                        <br>
                    </div>
                </div>
            </div>
            
            <br>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <span>{{ $message }}</span>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <span>{{ $message }}</span>
                </div>
            @endif
            <br>

            <div class="card">
                <div class="card-header pb-2">
                    <button class="btn btn-primary float-end btn-sm" type="button" data-toggle="modal" data-target="#modal_generar_compras" style="font-family:arial; font-size: 13px;">Agregar compras</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="container">
                            <table id="tablaVenta" class="table table-striped table-hover">
                                <thead class="thead text-nowrap text-center">
                                    <tr>
                                        <th scope="col">Nro FC</th>
                                        <th scope="col">Fecha Emisión</th>
                                        <th scope="col">Fecha Vto</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Descuento</th>
                                        <th scope="col">Recargo</th>
                                        <th scope="col">IVA</th>
                                        <th scope="col">Otrs. imp</th>
                                        <th scope="col">Flete</th>
                                        <th scope="col">Retención</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-nowrap text-center">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('compras.partials._formGenerarCompra')
@stop

@section('css')
    <style>
        label {
            font-size: 14px
        }
    </style>

@stop

@section('js')
    <script>
        let tabla;
        $(document).ready(function() {
            tabla = $('#tablaVenta').DataTable({
                "processing" : true,
                "serverSide" : false,
                "ajax": {
                    "url": "{{ route('compras.listar')}}",
                    "type": "GET"
                },

                "columns": [
                    { "data": "nro_fc" },
                    { "data": "fecha_emision" },
                    { "data": "fecha_vto" },
                    { "data": "subtotal" },
                    { "data": "descuento" },
                    { "data": "recargo" },
                    { "data": "iva" },
                    { "data": "otros_impuestos" },
                    { "data": "flete" },
                    { "data": "retencion" },
                    { "data": "total" },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            let url = '{{ route("compras.detallespdf", ":id") }}';
                            url = url.replace(':id', row.id);
                            let baseUrl = "{{ URL::asset('img/3917112.png') }}";

                            let urlEditar = '#';
                            urlEditar = urlEditar.replace(':id', row.id);
                            let editarUrl = "{{ URL::asset('img/10742923.png') }}";

                            return '<a class="btn btn-sm btn-outline-primary" href="' + url + '" target="_blank">' +
                                '<img src="' + baseUrl + '" height="22px" width="22px" alt="Ver"></a>' + ' ' +
                                '<a class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal_generar_compras" href="' + urlEditar + '">' +
                                '<img src="' + editarUrl + '" height="22px" width="22px" alt="Ver"></a>';
                        }
                    },

                ],
                
                "dom": 'rtip',

                responsive: true,

                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "",
                        "last": "",
                        "next": "",
                        "previous": "",
                    }
                },
            });
        });

        let table;
        $(document).ready(function() {
            table = $('#lista_productos').DataTable({
                columns: [
                    {
                        data: 'id'
                    },
                    {
                        data: 'cod_int'
                    },
                    {
                        data: 'descrip'
                    },
                    {
                        data: 'cantidad'
                    },
                    {
                        data: 'precio_unit'
                    },
                    {
                        data: 'importe'
                    },
                    {
                        data: 'acciones'
                    },
                ],
                "dom": 'rtip',

                responsive: true,
                "paging": false,  // Deshabilita la paginación

                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "",
                        "last": "",
                        "next": "",
                        "previous": "",
                    }
                },
            });
        });

        $('#productoSel').select2({
            placeholder: 'Seleccione un producto',
            dropdownParent: $('#modal_generar_compras'),
            theme: "classic",
            minimumInputLength: 2, // Número mínimo de caracteres para empezar la búsqueda
            language: "es", // Configurar el idioma a español
            ajax: {
                url: '{{ route("compras.buscarProducto") }}',
                dataType: 'json',
                delay: 250, // Retraso en milisegundos antes de enviar la solicitud
                data: function(params) {
                    return {
                        data: params.term // El término de búsqueda
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.items
                    };
                },
                cache: true
            }
        });

        //Se registra el producto en DataTable
        $("#productoSel").change(function() {
            cargarProductos();
        });

        function agregar() {
            var datos = []; // Crea un array vacío para almacenar los datos de cada fila

            let fecha_emision   = $('#fecha_emision').val();
            let fecha_vto       = $('#fecha_vto').val();
            let nro_fc          = $('#nro_fc').val();
            let id_prov         = $('#id_prov').val();

            let subtotal        = $('#subtotal').text();
            let descuento       = $('#totalDescuento').text();
            let iva             = $('#totaliva').text();
            let otros_impuestos = $('#totalOtrosImp').text();
            let retencion       = $('#totalRetencion').text();
            let flete           = $('#totalFlete').text();
            let recargo         = $('#totalRecargo').text();
            let totalGeneral    = $('#totalGeneral').text();

            table.rows().every(function() {
                let data = this.data();
                let id   = data.id

                let cantidad    = $(this.node()).find('input[name=cantidad]').val();
                let precio_unit = $(this.node()).find('input[name=precio_unit]').val();
                let importe     = $(this.node()).find('input[name=importe]').val();

                // Crea un objeto con los datos de cada fila y agrégalo al array
                var fila = {
                    productoSel : id,
                    cantidad    : cantidad,
                    precio_unit : precio_unit,
                    importe     : importe
                };

                datos.push(fila);
            });

            $.ajax({
                url: '{{ route("compras.create") }}',
                method: 'GET', // Cambia de GET a POST
                data: {
                    fecha_emision   : fecha_emision,
                    fecha_vto       : fecha_vto,
                    nro_fc          : nro_fc,
                    id_prov         : id_prov,
                    
                    subtotal        : subtotal,
                    descuento       : descuento,
                    iva             : iva,
                    otros_impuestos : otros_impuestos,
                    retencion       : retencion,
                    flete           : flete,
                    recargo         : recargo,
                    total           : totalGeneral,
                    datos           : datos,
                    _token          : $('input[name=_token]').val(),
                },
                dataType: 'json',
                success: function(res) {
                    if(`${res.success}`!= 'undefined'){
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Se guardo correctamente",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        /* var table = $('#lista_productos').DataTable(); */
                        /* table.clear().draw(); */

                        window.location.reload();
                        
                    } else {
                        toastr.error(res.message);
                    }
                },
                error : function(err){
                    if(err.status == 422){
                        $.each(err.responseJSON.errors, function(i, error){
                            $('#alertModal').html(`<div id='alert-modal' class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="false">&times;</span></button><ul><li>${error}.</li></ul></div>`);
                        });
                    }
                },
            });
        }

        function cargarProductos() {
            var id = $('#productoSel').val();
            
            $.ajax({
                url: '{{route("compras.listarProductos")}}',
                method: 'GET',
                data: {
                    'id': id
                },
                dataType: 'json',

                success: function(res) {
                    if (res) {
                        let table = $('#lista_productos').DataTable();
                        let productoExiste = false;
                        
                        table.rows().every(function() {
                            let data = this.data();
                            if (data.cod_int === res.cod_int) {
                                productoExiste = true;
                                return false; // Detener la iteración
                            }
                        });

                        if (!productoExiste) {
                                table.row.add({
                                    'id'          : res['id'],
                                    'cod_int'     : res['cod_int'],
                                    'descrip'     : res['descrip'],
                                    'cantidad'    : '<input class="form-control form-control-sm cantidad" name="cantidad" type="number" required>',
                                    'precio_unit' : '<input class="form-control form-control-sm precio_unit" name="precio_unit" id="precio_unit" type="number" required>',
                                    'importe'     : '<input class="form-control form-control-sm importe" name="importe" id="importe" type="number" readonly>',
                                    'acciones'    : '<center>' +
                                        '<span class="btnEliminarProducto text-danger px-1" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Producto">' +
                                        '<i class="fas fa-trash fs-5"></i>' + '</span>'
                                }).draw();
                        } else {
                            alert('Ya existe');
                        }
                        /* $('#productoSel').val('Seleccionar'); //Para volver al valor inicial */
                    }

                }
            });
        }

        function totalPorProducto() {
        $('#lista_productos tbody tr').each(function() {
            let cantidad = parseFloat($(this).find('.cantidad').val()) || 0;
            let precio_unit = parseFloat($(this).find('.precio_unit').val()) || 0;
            let calculo = cantidad * precio_unit;

            $(this).find('.importe').val(calculo.toFixed(2));
        });
        calcularTotalBruto();
        }

        function calcularTotalBruto() {
            let importeBruto = 0;

            $('#lista_productos .importe').each(function() {
                let total = parseFloat($(this).val()) || 0;
                importeBruto += total;
            });

            $('#subtotal').text(importeBruto.toFixed(2));
            calcularTotalGeneral();
        }

        function calcularDescuento() {
            let totalGeneral  = parseFloat($('#subtotal').text()) || 0;
            let descuento     = parseFloat($('#descuento').val()) || 0;

            let calcularDescuento = totalGeneral * (descuento / 100);
            $('#totalDescuento').text(calcularDescuento.toFixed(2));
            calcularTotalGeneral();
        }

        function calcularIVA() {
            let subtotal = parseFloat($('#subtotal').text()) || 0;
            let descuento = parseFloat($('#totalDescuento').text()) || 0;
            let totalConDescuento = subtotal - descuento;
            let iva = parseFloat($('#iva').val()) || 0;
            
            let calcularIva = totalConDescuento * (iva / 100);
            
            $('#totaliva').text(calcularIva.toFixed(2));
            calcularTotalGeneral();
        }

        function calcularOtrosImp() {
            let subtotal = parseFloat($('#subtotal').text()) || 0;
            let descuento = parseFloat($('#totalDescuento').text()) || 0;
            let totalConDescuento = subtotal - descuento;
            let otrosImp = parseFloat($('#otros_impuestos').val()) || 0;
            
            let calcularOtrosImp = totalConDescuento * (otrosImp / 100);
            
            $('#totalOtrosImp').text(calcularOtrosImp.toFixed(2));
            calcularTotalGeneral();
        }

        function calcularRetencion() {
            let retencion    = parseFloat($('#retencion').val()) || 0; 
            let totalGeneral = parseFloat($('#subtotal').text()) || 0; 
            
            let calcularRetencion = totalGeneral * (retencion / 100);
            $('#totalRetencion').text(calcularRetencion.toFixed(2));
            calcularTotalGeneral();
        }

        function calcularFlete() {
            let subtotal = parseFloat($('#subtotal').text()) || 0;
            let flete    = parseFloat($('#flete').val()) || 0;
            
            let calcularFlete = subtotal * (flete / 100);
            $('#totalFlete').text(calcularFlete.toFixed(2));
            calcularTotalGeneral();
        }

        function calcularRecargo() {
            let subtotal = parseFloat($('#subtotal').text()) || 0;
            let recargo  = parseFloat($('#recargo').val()) || 0;
            
            let calcularRecargo = subtotal * (recargo / 100);
            $('#totalRecargo').text(calcularRecargo.toFixed(2));
            calcularTotalGeneral();
        }

        function calcularTotalGeneral() {
            let subtotal  = parseFloat($('#subtotal').text()) || 0;
            let descuento = parseFloat($('#totalDescuento').text()) || 0;
            let iva       = parseFloat($('#totaliva').text()) || 0;
            let retencion = parseFloat($('#totalRetencion').text()) || 0;
            let flete     = parseFloat($('#totalFlete').text()) || 0;
            let recargo   = parseFloat($('#totalRecargo').text()) || 0;

            let total     = subtotal - descuento + iva - retencion + flete + recargo;
            $('#totalGeneral').text(total.toFixed(2));
        }

        // Eventos
        $('#lista_productos').on('input', 'input.cantidad, input.precio_unit', function() {
            totalPorProducto();
        });

        $("#lista_productos").on('change', function() {
            calcularTotalBruto();
        });

        $('#descuento').on('input', function() {
            calcularDescuento();
        });

        $('#iva').on('change', function() {
            calcularIVA();
        });

        $('#otros_impuestos').on('change', function() {
            calcularOtrosImp();
        });

        $('#retencion').on('input', function() {
            calcularRetencion();
        });

        $('#flete').on('input', function() {
            calcularFlete();
        });

        $('#recargo').on('input', function() {
            calcularRecargo();
        });

        $("#lista_productos tbody").on('click', '.btnEliminarProducto', function() {
            table.row($(this).parents('tr')).remove().draw();
            calcularTotalBruto();
        });
    </script>
@stop