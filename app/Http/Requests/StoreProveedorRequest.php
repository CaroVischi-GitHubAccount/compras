<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:250',
            'cuit' => 'required|max:20',
            'dir' => 'required|max:250',
            'tel' => 'required|max:15',
            'mail' => 'nullable',
            'localidad' => 'required|max:250'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe asignar un nombre al proveedor.',
            'nombre.max' => 'El nombre no debe superar los 250 caracteres',
            'cuit.required' => 'Debe asignar un número de CUIT/CUIL al proveedor',
            'cuit.max' => 'El CUIT/CUIL no debe superar los 20 caracteres',
            'dir.required' => 'Debe asignar una dirección al proveedor.',
            'dir.max' => 'La dirección no debe superar los 250 caracteres',
            'tel.required' => 'Debe asignar un número de teléfono al proveedor.',
            'tel.max' => 'El nombre no debe superar los 15 caracteres',
            'localidad.required' => 'Debe asignar una localidad al proveedor.',
            'locaidad.max' => 'La localidad no debe superar los 250 caracteres'
        ];
    }
    
}
