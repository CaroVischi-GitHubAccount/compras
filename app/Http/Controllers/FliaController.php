<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familia;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;


class FliaController extends Controller
{

    public function store(Request $request){
        //dd($request);
        $request->validate([
            'nombre_flia' => 'required|max:250'
        ], [
            'nombre_flia.required' => 'Debe asignar un nombre para la nueva familia.',
            'nombre_flia.max' => 'El nombre de la familia no debe superar los 250 caracteres.'
        ]);

        try{
            
            DB::beginTransaction();
            $flia = Familia::create([
                'nombre' => $request->nombre_flia,
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

    public function update(Request $request, $id){

        //dd($id);
    
        try{
            DB::beginTransaction();
            $flia = Familia::where('id', '=', $id)->update([
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

    public function destroy($id){
        
        //verificar que no existan productos en esta familia
        $productos=Producto::where('id_flia','=', $id) ;

        if (($productos->count()) === 0){
            //eliminar:caso no existan productos asociados.
            try{
                DB::beginTransaction();
                $flia=Familia::find($id)->delete(); 
                DB::commit();
            }
            catch(\Exception $e){
                DB::rollback();
                dd($e);
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
}

