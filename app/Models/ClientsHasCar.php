<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientsHasCar
 * 
 * @property string $clients_license_num
 * @property string $cars_num
 * 
 * @property Car $car
 * @property Client $client
 *
 * @package App\Models
 */
class ClientsHasCar extends Model
{
	protected $table = 'clients_has_cars';
	public $incrementing = false;
	public $timestamps = false;

	public function car()
	{
		return $this->belongsTo(Car::class, 'cars_num');
	}

	public function client()
	{
		return $this->belongsTo(Client::class, 'clients_license_num');
	}
}
