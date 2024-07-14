<?php

namespace App\Http\Requests\compra;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompra extends FormRequest
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
            'id_estado'       => 'integer|exists:estados,id',
            'total'           => 'required|numeric|min:0',
            /* new calcularTotal(
                $this->input('subtotal'),
                $this->input('descuento'),
                $this->input('recargo'),
                $this->input('iva'),
                $this->input('flete')
            ), */
            'retencion'       => 'numeric|min:0',
            'recargo'         => 'numeric|min:0',
            'flete'           => 'numeric|min:0',
            'otros_impuestos' => 'numeric|min:0',   
            'iva'             => 'numeric|min:0',
            'descuento'       => 'numeric|min:0',
            'subtotal'        => 'required|numeric|min:0',
            'id_prov'         => 'required|exists:proveedores,id',
            'fecha_vto'       => 'required|date|after:fecha_emision',
            'fecha_emision'   => 'required|date',
            'nro_fc'          => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id_prov.required'       => 'El campo Proveedor es obligatorio.',
            'id_prov.exists'         => 'El proveedor seleccionado no existe.',

            'id_estado.integer'      => 'El campo Estado debe ser un número entero.',
            'id_estado.exists'       => 'El estado seleccionado no existe.',

            'nro_fc.required'        => 'El campo Número de Factura es obligatorio.',
            'nro_fc.string'          => 'El campo Número de Factura debe ser una cadena de texto.',
            'nro_fc.max'             => 'El campo Número de Factura no debe exceder los 255 caracteres.',

            'fecha_emision.required' => 'El campo Fecha de Emisión es obligatorio.',
            'fecha_emision.date'     => 'El campo Fecha de Emisión debe ser una fecha válida.',

            'fecha_vto.required'     => 'El campo Fecha de Vencimiento es obligatorio.',
            'fecha_vto.date'         => 'El campo Fecha de Vencimiento debe ser una fecha válida.',
            'fecha_vto.after'        => 'La Fecha de Vencimiento debe ser posterior a la Fecha de Emisión.',

            'subtotal.required'      => 'El campo Subtotal es obligatorio.',
            'subtotal.numeric'       => 'El campo Subtotal debe ser un número.',
            'subtotal.min'           => 'El campo Subtotal debe ser al menos 0.',

            'descuento.numeric'      => 'El campo Descuento debe ser un número.',
            'descuento.min'          => 'El campo Descuento debe ser al menos 0.',

            'recargo.numeric'        => 'El campo Recargo debe ser un número.',
            'recargo.min'            => 'El campo Recargo debe ser al menos 0.',

            'iva.numeric'            => 'El campo iva debe ser un número.',
            'iva.min'                => 'El campo iva debe ser al menos 0.',

            'otros_impuestos.numeric'=> 'El campo Otros Impuestos debe ser un número.',
            'otros_impuestos.min'    => 'El campo Otros Impuestos debe ser al menos 0.',

            'flete.numeric'          => 'El campo Flete debe ser un número.',
            'flete.min'              => 'El campo Flete debe ser al menos 0.',

            'total.required'         => 'El campo Total es obligatorio.',
            'total.numeric'          => 'El campo Total debe ser un número.',
            'total.min'              => 'El campo Total debe ser al menos 0.',
        ];
    }
}
