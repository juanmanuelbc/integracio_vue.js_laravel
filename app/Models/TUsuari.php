<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TUsuari
 * 
 * @property int $id
 * @property string $nom
 * @property string $llinatges
 * @property string|null $username
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TComentari[] $t_comentaris
 * @property Collection|TPost[] $t_posts
 *
 * @package App\Models
 */
class TUsuari extends Model
{
	protected $table = 't_usuari';

	protected $fillable = [
		'nom',
		'llinatges',
		'username'
	];

	public function comentaris()
	{
		return $this->hasMany(TComentari::class, 'idUsuari');
	}

	public function posts()
	{
		return $this->hasMany(TPost::class, 'idUsuari');
	}
}
