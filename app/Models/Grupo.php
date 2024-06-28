<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Grupo extends Model
{
	protected $table = 'grupos';

	protected $fillable = [
		'nombre'
	];
}
