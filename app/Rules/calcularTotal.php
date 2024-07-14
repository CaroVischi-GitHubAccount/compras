<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class calcularTotal implements Rule
{
    protected $subtotal;
    protected $descuento;
    protected $recargo;
    protected $iva;
    protected $flete;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($subtotal, $descuento, $recargo, $iva, $flete)
    {
        $this->subtotal = $subtotal;
        $this->descuento = $descuento;
        $this->recargo = $recargo;
        $this->iva = $iva;
        $this->flete = $flete;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $calculatedTotal = $this->subtotal - ($this->subtotal * ($this->descuento / 100)) + $this->recargo + $this->iva + $this->flete;

        // Comparar el valor calculado con el valor proporcionado
        return abs($calculatedTotal - $value) < 0.01;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El total calculado no coincide con el valor proporcionado.';
    }
}
