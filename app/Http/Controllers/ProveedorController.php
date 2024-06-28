<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Models\Estado;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProveedorController extends Controller
{
    public function index()
    {
        //$proveeds = Proveedore::where('id_estado','=', 1)->get();
        //->paginate(10);
        $proveedores = DB::table('proveedores')
        ->join('estados', 'proveedores.id_estado', '=','estados.id')
        ->select('proveedores.*','estados.nombre as estado')
        ->get();
        return view('proveedores.index', compact('proveedores'));
            //->with('i', (request()->input('page', 1) - 1) * $activs->perPage());
    }


    public function buscador(Request $request)
    {

        //dd($request->busqueda);
        $proveedores = DB::table('proveedores')
        ->join('estados', 'proveedores.id_estado', '=','estados.id')
        ->select('proveedores.*','estados.nombre as estado')
        ->where('proveedores.nombre', 'like', $request->busqueda.'%')
        ->orWhere('cuit', 'like', $request->busqueda.'%')
        //->orWhere('localidad', 'like', $request.'%')
        ->get();
        //dd($proveedores);
        //$socios=collect($socios)->paginate(10);

        return view('proveedores.index', compact('proveedores'));
    }



    //public function create()
    //{
        //$proveed = new Proveedore();
        //return view('proveedores.create', compact('proveed'));
    //}

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $proveed = Proveedore::create([
                'nombre' => $request->nombre,
                'cuit' => $request->cuit,
                'dir' => $request->dir,
                'tel' => $request->tel,
                'mail' => $request->mail,
                'localidad' => $request->localidad,
                'id_estado'=> 1,
            ]);
            DB::commit();
        }
        catch(\Exception $e){
                DB::rollback();
                //dd($e);
                return redirect()->route('proveedores')
                    ->with('error', 'Ocurrió un error al crear el registro.');
        }
        return redirect()->route('proveedores')
            ->with('success', 'Se agregó un proveedor nuevo al registro.');
    }
    
    /*public function show($id)
    {
        $proveed = Proveedore::find($id);
        return view('proveedores.show', compact('proveed'));
    }
    */
    
    /*public function edit($id)
    {
        $activ = Activ::find($id);

        return view('proveedores.edit', compact('activ'));
    }*/

    public function update(Request $request, $id)
    {
        //dd($request->all());
        try{
            DB::beginTransaction();
            $prov=Proveedore::where('id', '=', $id)->update([
                'nombre' => $request->nombre,
                'cuit' => $request->cuit,
                'id_estado'=>$request->estado,
                'dir' => $request->dir,
                'tel' => $request->tel,
                'mail' => $request->mail,
                'localidad' => $request->localidad,
            ]);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            dd($e);
            return redirect()->route('proveedores')
                ->with('error', 'Ocurrió un error al actualizar el registro.');
        }
        return redirect()->route('proveedores')
            ->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        //verificar que no existan productos de este proveedor.
        $productos=Producto::where('id_prov','=', $id);
        //dd($productos);
        
        if (($productos->count()) === 0){
            //caso TRUE=> cambiar estado proveedor a inactivo
            try{
                DB::beginTransaction();
                $prov=Proveedore::where('id', '=', $id)->update([
                    'id_estado' => 2,
                ]);
                DB::commit();
            }
            catch(\Exception $e){
                DB::rollback();
                dd($e);
                return redirect()->route('proveedores')
                    ->with('error', 'Ocurrió un error al intentar eliminar el registro.');
            }
            return redirect()->route('proveedores')
                ->with('success', 'Registro eliminado de forma correcta.');
        }else{
            //no se puede eliminar porque existen productos asociados.
            return redirect()->route('proveedores')
                ->with('error', 'No es posible eliminar este registro porque tiene productos asociados.');
        }
    }

}