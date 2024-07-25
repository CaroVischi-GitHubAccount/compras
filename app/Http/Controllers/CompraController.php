<?php

namespace App\Http\Controllers;

use App\Http\Requests\compra\StoreCompra;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Proveedore; //Cambiar a "Proveedor"
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

/* use App\Models\Compra;
use App\Models\Proveedore;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 */

class CompraController extends Controller
{
    public function index() {
        $productos = Producto::all();
        $compras   = Compra::all();
        $proveedores = Proveedore::all();
        
        return view('compras.index', compact('productos', 'compras', 'proveedores'));
    }

    public function listarProductos(Request $request) {
        if($request -> id){
            $producto = Producto::find($request -> id);
            return response()->json($producto);
        }
    }

    public function obtenerCompras(Request $request) {
        if($request -> id){
            $compra = Compra::find($request -> id);
            return response()->json($compra);
        }

        $compras = Compra::all();

        return response()->json(['data' => $compras]);
    }

    public function create(StoreCompra $request) {        
        $compra = new Compra($request ->all());
        $stock = 0;
    
        $compra->save();
    
        foreach ($request->input('datos') as $detalle) {
            $detalleCompra = new DetalleCompra();

            $stock += $detalle['cantidad'];

            $detalleCompra -> id_compra   = $compra->id;
            $detalleCompra -> id_prod     = $detalle['productoSel'];
            $detalleCompra -> cant        = $detalle['cantidad'];
            $detalleCompra -> precio_unit = $detalle['precio_unit'];
            $detalleCompra -> importe     = $detalle['importe'];
            
            $detalleCompra->save();
        }

        $inventario = new Inventario();
        
        $inventario -> id_prov = $request -> id_prov;
        $inventario -> stock   = $stock;
        $inventario -> fecha   = $request -> fecha_emision;
        $inventario -> total   = $request -> total;
        $inventario -> tipo_op = 'Ingreso';

        $inventario -> save();
    
        return response()->json(['success' => 'Compra agregada correctamente']);
    }

    public function delete(Request $request) {
        
            $id = $request -> id;
            
            if(!$id) {
                return back();
            } 
            
            $compra = Compra::find($request -> id);

            if(!$compra) {
                return back();
            }
            
            $compra -> delete();
            return response()->json(['success' => 'La compra ha sido eliminado']);
        
    }

    public function productos(Request $request) {
        $productos = DetalleCompra::join('productos', 'productos.id', 'id_prod')
            ->select('detalle_compras.id as detalle', 'productos.id', 'productos.cod_int', 'productos.descrip', 'detalle_compras.precio_unit', 'detalle_compras.cant', 'detalle_compras.importe')
            ->where('id_compra', $request->id)->get();

        /* dd($productos); */
    
        // Devolver los productos como respuesta JSON
        return response()->json($productos);
    }

    public function update(Request $request)
    {
        // Buscar la compra existente por su ID
        $compra = Compra::find($request->id);

        if (!$compra) {
            return response()->json(['error' => 'Compra no encontrada'], 404);
        }

        // Actualizar los campos de la compra con los nuevos valores
        $compra->fecha_emision   = $request->fecha_emision;
        $compra->fecha_vto       = $request->fecha_vto;
        $compra->nro_fc          = $request->nro_fc;
        $compra->id_prov         = $request->id_prov;
        $compra->subtotal        = $request->subtotal;
        $compra->descuento       = $request->descuento;
        $compra->iva             = $request->iva;
        $compra->otros_impuestos = $request->otros_impuestos;
        $compra->flete           = $request->flete;
        $compra->recargo         = $request->recargo;
        $compra->total           = $request->total;

        // Guardar los cambios en la compra
        $compra->update();

        // Eliminar todos los detalles existentes de la compra
        DetalleCompra::where('id_compra', $compra->id)->delete();

        // Iterar sobre los nuevos detalles y añadirlos
        foreach ($request->input('datos') as $detalle) {
            $nuevoDetalle = new DetalleCompra();
            $nuevoDetalle->id_compra = $compra->id;
            $nuevoDetalle->id_prod = $detalle['productoSel'];
            $nuevoDetalle->cant = $detalle['cantidad'];
            $nuevoDetalle->precio_unit = $detalle['precio_unit'];
            $nuevoDetalle->importe = $detalle['importe'];
            $nuevoDetalle->save();
        }

        return response()->json(['success' => 'Compra actualizada correctamente']);
    }
    
    public function detallespdf($id) {
        try {
            //Obtengo la compra
            $compra = Compra::find($id);
            
            // Obtener la información de la compra
            $fecha_emision = $compra -> fecha_emision;
            $fecha_vto     = $compra -> fecha_vto;
            $nro_fc        = $compra -> nro_fc; 
    
            // Obtener los detalles de la compra
            $dataCompra    = $compra ->get('*');
            $detalles      = $compra->detalles()->get();
            
            // Obtener el proveedor relacionado con la compra
            $proveedor = $compra->proveedor()->first();
    
            $pdf = Pdf::loadView('compras.detallespdf', compact('detalles' ,'compra', 'proveedor' ,'dataCompra', 'fecha_emision', 'fecha_vto', 'nro_fc'));
    
            return $pdf->stream('compra.pdf');

        } catch(\Exception $e){ 
            return redirect('/compras') -> with('error', 'Hubo un error al intentar ver los detalles de la compra.');
        }  
    }
    
    public function buscadorProducto(Request $request) {
        $buscar   = $request->input('data');
        $products = Producto::where('descrip', 'LIKE', "%{$buscar}%")->get();

        $resultado = [];
        foreach ($products as $product) {
            $resultado[] = [
                'id'   => $product->id,
                'text' => $product->descrip
            ];
        }

        return response()->json(['items' => $resultado]);
    }

    //Carolina
    /* public function create()
    {
        $compra = new Compra();
        $proveedores=DB::table('proveedores')
        ->select('proveedores.id as id', 'proveedores.nombre as nombre')
        ->get();
        return view('compras.createCompra', compact('compra', 'proveedores'));
    } */
}