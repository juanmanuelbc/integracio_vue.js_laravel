<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RCategoriaPost
 * 
 * @property int $idPost
 * @property int $idCategoria
 * 
 * @property ACategoria $a_categorium
 * @property TPost $t_post
 *
 * @package App\Models
 */
class RCategoriaPost extends Model
{
	protected $table = 'r_categoria_post';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idPost' => 'int',
		'idCategoria' => 'int'
	];

	protected $fillable = [
		'idPost',
		'idCategoria'
	];

	public function categoria()
	{
		return $this->belongsTo(ACategoria::class, 'idCategoria');
	}

	public function post()
	{
		return $this->belongsTo(TPost::class, 'idPost');
	}
}
