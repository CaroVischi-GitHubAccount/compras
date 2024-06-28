<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleCompra
 * 
 * @property int $id
 * @property int $id_compra
 * @property int $id_prod
 * @property int $cant
 * @property float $precio_unit
 * @property float $total
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class DetalleCompra extends Model
{
	protected $table = 'detalle_compras';

	protected $casts = [
		'id_compra' => 'int',
		'id_prod' => 'int',
		'cant' => 'int',
		'precio_unit' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'id_compra',
		'id_prod',
		'cant',
		'precio_unit',
		'total'
	];
}
