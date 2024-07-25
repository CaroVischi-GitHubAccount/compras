<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 * 
 * @property int $id
 * @property int $id_estado
 * @property string $cuit
 * @property string $nombre
 * @property string $dir
 * @property string $tel
 * @property string $mail
 * @property string $localidad
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Proveedore extends Model
{
	protected $table = 'proveedores';

	protected $casts = [
		'id_estado' => 'int'
	];

	protected $fillable = [
		'id',
		'id_estado',
		'cuit',
		'nombre',
		'dir',
		'tel',
		'mail',
		'localidad'
	];

	public function compras() {
		return $this -> hasMany(Compra::class, 'id');
	}

	public function inventarios() {
		return $this -> hasMany(Inventario::class, 'id');
	}
}
