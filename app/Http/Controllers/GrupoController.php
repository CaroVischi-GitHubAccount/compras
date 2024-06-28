<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Grupo;
use App\Models\Familia;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function index() { 
        $grupos=Grupo::all();
        $flias=Familia::all();
        //dd($grupos);
        return view('grupo-flia.index', compact('grupos', 'flias'));
        //->with('i', (request()->input('page', 1) - 1) * $socios->perPage());
    } 

    public function store(Request $request){
        //dd($request);
        try{
            
            DB::beginTransaction();
            $grupo = Grupo::create([
                'nombre' => $request->nombre,
            ]);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            //dd($e);
            return redirect()->route('grupos')
                ->with('error', 'Ocurrió un error al crear el registro.');
        }
        return redirect()->route('grupos')
            ->with('success', 'Registro creado de forma correcta.');
    }

    public function destroy($id){
        //verif que no existan productos es esta flia
        $productos=Producto::where('id_flia','=', $id) ;

        if (($productos->count()) === 0){
            try{
                DB::beginTransaction();
                $grupo=Grupo::find($id)->delete(); 
                DB::commit();
            }
            catch(\Exception $e){
                DB::rollback();
                //dd($e);
                return redirect()->route('grupos')
                    ->with('error', 'Ocurrió un error al intentar eliminar el registro.');
            };
            return redirect()->route('grupos')
                ->with('success', 'Registro eliminado de forma correcta.');
        }else{
            //no se puede eliminar porque existen productos asociados.
            return redirect()->route('grupos')
                ->with('error', 'No es posible eliminar este registro porque tiene productos asociados.');
        } 
    }

    public function update(Request $request, $id){
    
        //dd($id);

        try{
            DB::beginTransaction();
            $grupo = Grupo::where('id', '=', $id)
            ->update([
                'nombre' => $request->nombre,
            ]);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            dd($e);
            return redirect()->route('grupos')
                ->with('error', 'Ocurrió un error al intentar actualizar el registro.');
        };

        return redirect()->route('grupos')
            ->with('success', 'Registro actualizado correctamente.');
        
    }
}

