<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $email
 * @property string $mdp
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admin';
	public $timestamps = false;

	protected $fillable = [
		'email',
		'mdp'
	];
}
