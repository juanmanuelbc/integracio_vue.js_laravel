<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TComentari
 * 
 * @property int $id
 * @property string $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $idPost
 * @property int $idUsuari
 * 
 * @property TPost $t_post
 * @property TUsuari $t_usuari
 *
 * @package App\Models
 */
class TComentari extends Model
{
	use SoftDeletes;

	protected $table = 't_comentari';

	protected $casts = [
		'idPost' => 'int',
		'idUsuari' => 'int'
	];

	protected $fillable = [
		'text',
		'idPost',
		'idUsuari'
	];

	public function post()
	{
		return $this->belongsTo(TPost::class, 'idPost');
	}

	public function usuari()
	{
		return $this->belongsTo(TUsuari::class, 'idUsuari');
	}
}
