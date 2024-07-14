<style>
    #detalles {
        width: 300px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        float: right;
    }
    .item {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
    }
    .label {
        font-weight: bold;
    }
    .value {
        text-align: right;
    }

    #inputPorcentaje {
        width: 100px;
        text-align: center;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="modal_generar_compras" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresa su compra</h5>
                <button class="btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            {{-- <form action="{{ route('compra.create')}}" method="GET"> --}}
                <div class="modal-body">
                    <div id="alertModal"></div>

                    <div class="row">
                        <div class="col-lg-2">
                            <label class="form-label" for="nro_fc">Número de factura</label>
                            <input class="form-control form-control-sm" type="text" name="nro_fc" id="nro_fc">
                        </div>

                        <div class="col-lg-2">
                            <label class="form-label" for="fecha_emision">Fecha de emisión</label>
                            <input class="form-control form-control-sm" type="date" name="fecha_emision" id="fecha_emision">
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" for="fecha_vto">Fecha de vencimiento</label>
                            <input class="form-control form-control-sm" type="date" name="fecha_vto" id="fecha_vto">
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group mb-2">
                                <label class="form-label" for="proveedor">Proveedor</label>
                                <select class="form-select form-select-sm" name="id_prov" id="id_prov">
                                    <option selected>Selecciones</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{$proveedor ->id}}">{{$proveedor ->nombre}} {{$proveedor ->apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label for="productoSel">Producto</label>
                                <select id="productoSel" class="form-select form-select-sm" name="productoSel" style="width:100%;">
                                    <option></option>
                                    @foreach($productos as $producto)
                                        <option value="{{$producto -> id}}">{{$producto->cod_int}} - {{$producto->descrip}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('productos')}}" class="btn btn-primary btn-sm">Agregar producto</a>
                                    <div class="table-responsive">
                                        <table id="lista_productos" class='table table-striped table-bordered shadow-sm mt-4'
                                            style='width:100%'>
                                            <thead>
                                                <tr class="text-nowrap text-center">
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ID</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Código</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Producto</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Cantidad</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Precio unitario</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Importe</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Opción</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody class="text-nowrap text-center" id="datos"></tbody>
                                        </table>
                                    </div>
                                    <div id="detalles" class="container">
                                        <div class="item">
                                            <div>Subtotal:</div>
                                            <div class="value" id="subtotal">0.00</div>
                                        </div>
                                        
                                        <div class="item">
                                            <div><span>%</span>Descuento:</div>
                                            <input class="form-control form-control-sm" type="number" name="descuento" id="descuento" value="0">
                                            <div class="value" id="totalDescuento">0.00</div>
                                        </div>

                                        <div class="item">
                                            <div><span>%</span>IVA:</div>
                                            <select class="form-select form-select-sm" name="iva" id="iva">
                                                <option value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="21">21%</option>
                                            </select>
                                            <div class="value" id="totaliva">0.00</div>
                                        </div>

                                        <div class="item">
                                            <div><span>%</span>otrs. imp:</div>
                                            <input class="form-control form-control-sm" type="number" name="otros_impuestos" id="otros_impuestos" value="0">
                                            <div class="value" id="totalOtrosImp">0.00</div>
                                        </div>

                                        <div class="item">
                                            <div><span>%</span>Flete:</div>
                                            <input class="form-control form-control-sm" type="number" name="flete" id="flete" value="0">
                                            <div class="value" id="totalFlete">0.00</div>
                                        </div>

                                        <div class="item">
                                            <div><span>%</span>Recargo:</div>
                                            <input class="form-control form-control-sm" type="number" name="recargo" id="recargo" value="0">
                                            <div class="value" id="totalRecargo">0.00</div>
                                        </div>

                                        <div class="item">
                                            <div><span>%</span>Retención:</div>
                                            <input class="form-control form-control-sm" type="number" name="retencion" id="retencion" value="0">
                                            <div class="value" id="totalRetencion">0.00</div>
                                        </div>
                                        
                                        <div class="item">
                                            <div>Total:</div>
                                            <div class="value" id="totalGeneral">0.00</div>
                                        </div>
                                    </div>
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="agregar()" class="btn btn-primary ml-2 mr-2 btn-sm">Agregar</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
           {{--  </form> --}}
        </div>
    </div>
</div>