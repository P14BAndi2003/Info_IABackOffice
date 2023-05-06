<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property int $id
 * @property int $idauteur
 * @property string $titre
 * @property string|null $image
 * @property Carbon|null $datecreation
 * @property string|null $contenu
 * @property int|null $statut
 * 
 * @property Auteur $auteur
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'article';
	public $timestamps = false;

	protected $casts = [
		'idauteur' => 'int',
		'datecreation' => 'datetime',
		'statut' => 'int'
	];

	protected $fillable = [
		'idauteur',
		'titre',
		'image',
		'datecreation',
		'contenu',
		'statut',
		'description'
	];

	public function auteur()
	{
		return $this->belongsTo(Auteur::class, 'idauteur');
	}
}
