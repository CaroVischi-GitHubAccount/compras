<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 * 
 * @property int $id
 * @property int $id_prov
 * @property int $id_prod
 * @property int $stock
 * @property string $tipo_op
 * @property Carbon $fecha
 * @property float $total
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Inventario extends Model
{
	protected $table = 'inventario';

	protected $casts = [
		'id_prov' => 'int',
		'id_prod' => 'int',
		'stock' => 'int',
		/* 'fecha' => 'datetime', */
		'total' => 'float'
	];

	protected $fillable = [
		'id_prov',
		'id_prod',
		'stock',
		'tipo_op',
		'fecha',
		'total'
	];

	public function proveedores() {
		return $this -> belongsTo(Proveedore::class, 'id_prov');
	}
}
