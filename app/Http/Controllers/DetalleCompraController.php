<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\Compra;
use App\Models\Grupo;
use App\Models\Familia;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetalleCompraController extends Controller
{

    public function create()
    {
        $detalle_compra = new DetalleCompra();
        $grupos=Grupo::all();
        $familias=Familia::all();

        $detalle_compras = DB::table('detalle_compras')
        ->join('compras','detalle_compras.id_compra','=', 'compras.id' )
        ->join('productos', 'detalle_compras.id_prod', '=','productos.id')
        ->select('detalle_compras.*','productos.descrip as producto')
        ->where('detalle_compras.id','=', 1)
        ->get();

        if (($detalle_compras->count()) === 0){
            return view('compras.createDetalle', compact('grupos', 'familias','detalle_compras'));
        }else{
            $detalle_compras = 0;
            return view('compras.createDetalle', compact('grupos', 'familias','detalle_compras'));
        }

        //return view('detalle_compra.create', compact('grupos', 'familias'));
    }

    public function getProds(Request $request)
    {
        //dd($request->grupo);
        $grupo = $request->grupo;
        $familia = $request->familia;
        //dd($grupo, '', $familia);
        $productos = Producto::where('id_grupo', $grupo)
            ->where('id_flia', $familia)
            ->get();
    
        $options = '';
        foreach ($productos as $prod) {
            $options .= "<option value=\"$prod->id\">$prod->descrip</option>";
        }
        
        return $options;
    }
    

    public function store( Request $request)
    {

    $request->validate([
            'grupo' => 'required',
            'familia' => 'required',
            'prod'=> 'required',
            'cant'=> 'required|numeric|min:1',
            'PU'=> 'required'

        ], [
            'grupo.required' => 'Debe selecccionar un grupo.',
            'familia.required' => 'Debe seleccionar una familia.',
            'prod.required' => 'Debe seleccionar el producto.',
            'cant.required' => 'Debe indicar la cantidad de productos.',
            'cant.numeric' => 'La cantidad debe expresarse en números.',
            'cant.min' => 'La cantidad mínima es 1.',
            'PU.required' => 'Debe indicar el precio unitario del producto.',

        ]);
        dd($request);
        try{
            DB::beginTransaction();
            $detalle_compra = DetalleCompra::create([
                //'id_compra' => $request->??????/,
                'id_prod' => $request->prod,
                'cant' => $request->cant,
                'cod_int' => $nuevo_cod,
                'pcio_unit' => $request->PU,
                'importe' => $request->importe,
            ]);
            DB::commit();
        }
        catch(\Exception $e){
                DB::rollback();
                dd($e);
                return redirect()->route('detallecompras.create');
                //    ->with('error', 'Ocurrió un error al crear el registro.');
        }
        return redirect()->route('detallecompras.create')
            ->with('success', 'Se agregó una nueva compra al registro.');
    }
    

    public function destroy($id)
    {   // destroy compra + detalle
        // disminuir stock de cada producto en la cantidad del detalle
        dd($id);
        try{
            DB::beginTransaction();
            $detalle_compra=DetalleCompra::find($id)->delete();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            //dd($e);
            return redirect()->route('detallecompras.create')
                ->with('error', 'Ocurrió un error al intentar eliminar el registro.');
        }
        return redirect()->route('detallecompras.create')
            ->with('success', 'Registro eliminado de forma correcta.');
    }

}