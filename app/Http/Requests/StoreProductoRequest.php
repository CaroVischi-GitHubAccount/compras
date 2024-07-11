<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//cambiar a true para que continue con próximo método
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'grupo' => 'required',
            //min:1',
            //exists:App\Models\Grupo,id',
            //'exists:App\Models\Grupo,id',
            //'required|not_in:0',
            'familia' => 'required',
            //exists:App\Models\Familia,id',
            'proveedor' => 'required',
            //exists:App\Models\Proveedore,id',
            'EAN' => 'required|max:50',
            //'cod_int' => 112233,
            'stock_min' =>'required|numeric',
            'descrip' => 'required|max:250',
            'observ' => 'nullable',
            'sinonimo1' => 'nullable',
            'sinonimo2' => 'nullable',
            'margen' => 'decimal:1,2',//entre 1 y 2 decimales
            'flete' => 'nullable|decimal:1,2',//entre 1 y 2 decimales
        ];
    }
    public function messages()
{
    return [
        'grupo.required' => 'Debe seleccionar un grupo para el producto',
        'familia.required' => 'Debe seleccionar una familia para el producto',
        'proveedor.required' => 'Debe seleccionar un proveedor para el producto',
        'EAN.required' => 'Debe agregar el código EAN',
        'EAN.max' => 'El código debe tener como máximo 50 caracteres',
        'stock_min.required' => 'Debe indicar el stock mínimo',
        'stock_min.numeric' => 'Debe indicar el stock mínimo con números',
        'descrip.required' => 'Debe indicar una descripción para este producto',
        'descrip.max' => 'La descripción debe tener como máximo 250 caracteres',
        'margen.decimal'=> 'El margen debe ser un número decimal',
        'flete.decimal'=> 'El flete debe ser un número decimal'
    ];
}
}
