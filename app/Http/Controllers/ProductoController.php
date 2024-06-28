<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Models\Grupo;
use App\Models\Familia;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    public function index()
    {
        //$proveeds = Proveedore::where('id_estado','=', 1)->get();
        //->paginate(10);
        $productos = DB::table('productos')
        ->join('grupos', 'productos.id_grupo', '=','grupos.id')
        ->join('familias', 'productos.id_flia', '=','familias.id')
        ->join('proveedores', 'productos.id_prov', '=','proveedores.id')
        ->select('productos.*','grupos.nombre as grupo','familias.nombre as flia','proveedores.nombre as proveedor')
        ->get();
        return view('productos.index', compact('productos'));
            //->with('i', (request()->input('page', 1) - 1) * $activs->perPage());
    }


    public function buscador(Request $request)
    {
        //dd($request->busqueda);
        $productos = DB::table('productos')
        ->join('grupos', 'productos.id_grupo', '=','grupos.id')
        ->join('familias', 'productos.id_flia', '=','familias.id')
        ->join('proveedores', 'productos.id_prov', '=','proveedores.id')
        ->where('productos.descrip', 'like', $request->busqueda.'%')
        ->orWhere('grupos.nombre', 'like', $request->busqueda.'%')
        ->orWhere('familias.nombre', 'like', $request.'%')
        ->orWhere('proveedores.nombre', 'like', $request.'%')
        ->select('productos.*','grupos.nombre as grupo','familias.nombre as flia','proveedores.nombre as proveedor')
        ->get();
        //dd($proveedores);
        //$socios=collect($socios)->paginate(10);

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $prod = new Producto();
        $grupos=Grupo::all();
        $familias=Familia::all();
        $proveedores=DB::table('proveedores')
        ->select('proveedores.id as id', 'proveedores.nombre as nombre')
        ->get();
        return view('productos.create', compact('prod', 'grupos', 'familias', 'proveedores'));
    }

    public function store(Request $request)
    {
        /*$cant_prods=DB::select('select count(id) from productos as q');
        //dd($cant_prods);
        $nro_unid=(int)$cant_prods[0]+1;
        dd($nro_unid);
        $cod_int=$request->grupo.$request->familia.$nro_unid;
        dd($cod_int);*/
        //dd($request);
        try{
            DB::beginTransaction();
            $producto = Producto::create([
                'id_grupo' => $request->grupo,
                'id_flia' => $request->familia,
                'id_prov' => $request->proveedor,
                'EAN' => $request->EAN,
                'cod_int' => 112233,
                'stock_min' => $request->stock_min,
                'descrip' => $request->descrip,
                'observ' => $request->observ,
                'sinonimo1' => $request->sinonimo1,
                'sinonimo2' => $request->sinonimo2,
                'margen' => $request->margen,
                'flete' => $request->flete,
            ]);
            DB::commit();
        }
        catch(\Exception $e){
                DB::rollback();
                //dd($e);
                return redirect()->route('productos')
                    ->with('error', 'Ocurrió un error al crear el registro.');
        }
        return redirect()->route('productos')
            ->with('success', 'Se agregó un proveedor nuevo al registro.');
    }
    
    public function show($id)
    {
        //$proveed = Proveedore::find($id);
        //return view('proveedores.show', compact('proveed'));
        $producto = DB::table('productos')
        ->join('grupos', 'productos.id_grupo', '=','grupos.id')
        ->join('familias', 'productos.id_flia', '=','familias.id')
        ->join('proveedores', 'productos.id_prov', '=','proveedores.id')
        ->where('productos.id', '=', $id)
        ->select('productos.*','grupos.nombre as grupo','familias.nombre as flia','proveedores.nombre as proveedor')
        ->get();
        //dd($prod[0]->grupo);
        return view('productos.show', compact('producto'));
    }
    
    
    public function edit($id)
    {
        $producto = DB::table('productos')
        ->join('grupos', 'productos.id_grupo', '=','grupos.id')
        ->join('familias', 'productos.id_flia', '=','familias.id')
        ->join('proveedores', 'productos.id_prov', '=','proveedores.id')
        ->where('productos.id', '=', $id)
        ->select('productos.*','grupos.nombre as grupo','familias.nombre as flia','proveedores.nombre as proveedor')
        ->get();
        //dd($producto);
        $grupos=Grupo::all();
        $familias=Familia::all();
        $proveedores=DB::table('proveedores')
        ->select('proveedores.id as id', 'proveedores.nombre as nombre')
        ->get();

        return view('productos.edit', compact('producto', 'grupos', 'familias', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        try{
            DB::beginTransaction();
            if($request->grupo != 0){
                $prod=Producto::where('id', '=', $id)->update([
                    'id_grupo' => $request->grupo,
                ]);
            }
            if($request->familia != 0){
                $prod=Producto::where('id', '=', $id)->update([
                    'id_flia' => $request->familia,
                ]);
            }
            if($request->proveedor != 0){
                $prod=Producto::where('id', '=', $id)->update([
                    'id_prov' => $request->proveedor,
                ]);
            }
            $prod=Producto::where('id', '=', $id)->update([
                //'id_grupo' => $request->grupo,
                //'id_flia' => $request->familia,
                //'id_prov' => $request->proveedor,
                'EAN' => $request->EAN,
                'stock_min' => $request->stock_min,
                'descrip' => $request->descrip,
                'observ' => $request->observ,
                'sinonimo1' => $request->sinonimo1,
                'sinonimo2' => $request->sinonimo2,
                'margen' => $request->margen,
                'flete' => $request->flete,
            ]);

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            //dd($e);
            return redirect()->route('productos')
                ->with('error', 'Ocurrió un error al actualizar el registro.');
        }
        return redirect()->route('productos')
            ->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $producto=Producto::find($id)->delete();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            //dd($e);
            return redirect()->route('productos')
                ->with('error', 'Ocurrió un error al intentar eliminar el registro.');
        }
        return redirect()->route('productos')
            ->with('success', 'Registro eliminado de forma correcta.');
    }

}