<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $id
 * @property int $id_prov
 * @property int $id_estado
 * @property string $nro_fc
 * @property Carbon $fecha_emision
 * @property Carbon $fecha_vto
 * @property float $subtotal
 * @property float $descuesto
 * @property float $recargo
 * @property float $impuestos
 * @property float $otros_impuestos
 * @property float $flete
 * @property float $total
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compras';

	protected $casts = [
		'id_prov' => 'int',
		'id_estado' => 'int',
		// Comente porque me traia de esta forma: 2024-07-13T00:00:00.000000Z
		/* 'fecha_emision' => 'date', */
		/* 'fecha_vto' => 'date', */
		'subtotal' => 'float',
		'descuesto' => 'float',
		'recargo' => 'float',
		'impuestos' => 'float',
		'otros_impuestos' => 'float',
		'flete' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'id_prov',
		'id_estado',
		'nro_fc',
		'fecha_emision',
		'fecha_vto',
		'subtotal',
		'descuesto',
		'recargo',
		'iva',
		'otros_impuestos',
		'flete',
		'total'
	];
	
	public function detalles()
    {
        return $this->hasMany(DetalleCompra::class, 'id_compra');
    }

	public function proveedor()
    {
        return $this->belongsTo(Proveedore::class, 'id_prov');
    }
}
