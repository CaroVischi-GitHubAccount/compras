<?php

namespace App\Http\Controllers;

use App\Http\Requests\compra\StoreCompra;
use App\Models\Compra;
use App\Models\DetalleCompra;
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

    public function obtenerCompras() {
        $compras = Compra::all();

        return response()->json(['data' => $compras]);
    }

    public function create(StoreCompra $request) {        
        $compra = new Compra($request ->all());
    
        $compra->save();
    
        foreach ($request->input('datos') as $detalle) {
            $detalleCompra = new DetalleCompra();
            
            $detalleCompra -> id_compra   = $compra->id;
            $detalleCompra -> id_prod     = $detalle['productoSel'];
            $detalleCompra -> cant        = $detalle['cantidad'];
            $detalleCompra -> precio_unit = $detalle['precio_unit'];
            $detalleCompra -> importe     = $detalle['importe'];
            
            $detalleCompra->save();
        }
    
        return response()->json(['success' => 'Compra agregada correctamente']);
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