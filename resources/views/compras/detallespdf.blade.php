<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detalles de tu compra</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
            }   
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                color: #555;
            }
            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
                border-collapse: collapse;
            }
            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }
            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }
            .invoice-box table tr.top table td.title {
                font-size: 30px;
                line-height: 20px;
                color: #333;
            }
            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }
            
            .custom-table {
                width: 100%;
                border-collapse: collapse;
            }

            .custom-table th, .custom-table td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }
            
            .custom-table th {
                background-color: #f2f2f2;
            }

            /* Alineación derecha para las celdas que contienen fechas */
            .invoice-box table tr.top table td:nth-child(2) {
                text-align: right;
            }

            .titulo {
                font-size: 20px;
            }
        </style>
    </head>
    
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="titulo">
                                    Factura de tu compra
                                </td>
                                <td>
                                    Nro factura  : {{ $nro_fc }}<br>
                                    Fecha emitida    : {{ $fecha_emision }}<br>
                                    Fecha vencimiento: {{ $fecha_vto }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Proveedor: {{ $proveedor ->nombre}} <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->producto->descrip}}</td>
                        <td>{{ $detalle->cant }}</td>
                        <td>{{ $detalle->precio_unit }}</td>
                        <td>{{ $detalle->importe }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
