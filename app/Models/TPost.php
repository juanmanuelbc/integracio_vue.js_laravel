<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TPost
 * 
 * @property int $id
 * @property string $titol
 * @property string $imatge
 * @property string $descripcio
 * @property string $contingut
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $idUsuari
 * 
 * @property TUsuari $t_usuari
 * @property RCategoriaPost $r_categoria_post
 * @property Collection|TComentari[] $t_comentaris
 *
 * @package App\Models
 */
class TPost extends Model
{
	use SoftDeletes;
	
	protected $table = 't_post';

	protected $casts = [
		'idUsuari' => 'int'
	];

	protected $fillable = [
		'titol',
		'imatge',
		'descripcio',
		'contingut',
		'idUsuari'
	];

	public function usuari()
	{
		return $this->belongsTo(TUsuari::class, 'idUsuari');
	}

	public function r_categoria_post()
	{
		return $this->hasOne(RCategoriaPost::class, 'idPost');
	}

	public function comentaris()
	{
		return $this->hasMany(TComentari::class, 'idPost');
	}
}
