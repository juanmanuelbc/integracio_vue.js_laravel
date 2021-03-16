<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ACategoria
 * 
 * @property int $id
 * @property string $nom
 * 
 * @property RCategoriaPost $r_categoria_post
 *
 * @package App\Models
 */
class ACategoria extends Model
{
	protected $table = 'a_categoria';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function r_categoria_post()
	{
		return $this->hasOne(RCategoriaPost::class, 'idCategoria');
	}
}
