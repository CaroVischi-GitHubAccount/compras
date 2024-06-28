<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property int $id_grupo
 * @property int $id_flia
 * @property int $id_prov
 * @property string $EAN
 * @property string $cod_int
 * @property string $descrip
 * @property string $observ
 * @property int $stock_min
 * @property string|null $sinonimo1
 * @property string|null $sinonimo2
 * @property float $margen
 * @property float $flete
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';

	protected $casts = [
		'id_grupo' => 'int',
		'id_flia' => 'int',
		'id_prov' => 'int',
		'stock_min' => 'int',
		'margen' => 'float',
		'flete' => 'float'
	];

	protected $fillable = [
		'id_grupo',
		'id_flia',
		'id_prov',
		'EAN',
		'cod_int',
		'descrip',
		'observ',
		'stock_min',
		'sinonimo1',
		'sinonimo2',
		'margen',
		'flete'
	];
}
