<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property string $login
 * @property string $password
 * @property int $type
 * 
 * @property Collection|Client[] $clients
 * @property Collection|Mechanic[] $mechanics
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'login';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'type' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password',
		'type'
	];

	public function clients()
	{
		return $this->hasMany(Client::class, 'user_login');
	}

	public function mechanics()
	{
		return $this->hasMany(Mechanic::class, 'user_login');
	}
}
