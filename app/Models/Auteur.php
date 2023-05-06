<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Auteur
 * 
 * @property int $id
 * @property string $email
 * @property string $mdp
 * @property string $username
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Auteur extends Model
{
	protected $table = 'auteur';
	public $timestamps = false;

	protected $fillable = [
		'email',
		'mdp',
		'username'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'idauteur');
	}
}
