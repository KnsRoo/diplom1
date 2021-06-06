<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property string $license_num
 * @property string $name
 * @property string $address
 * @property string $tel_num
 * @property string $user_login
 * 
 * @property User $user
 * @property Collection|Car[] $cars
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';
	protected $primaryKey = 'license_num';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'name',
		'address',
		'tel_num',
		'user_login'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_login');
	}

	public function cars()
	{
		return $this->belongsToMany(Car::class, 'clients_has_cars', 'clients_license_num', 'cars_num');
	}
}
