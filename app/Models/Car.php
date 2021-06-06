<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * 
 * @property string $num
 * @property string $mark
 * @property string $power
 * @property string $year
 * @property string $color
 * 
 * @property Collection|Client[] $clients
 * @property Collection|Request[] $requests
 * @property Collection|Work[] $works
 *
 * @package App\Models
 */
class Car extends Model
{
	protected $table = 'cars';
	protected $primaryKey = 'num';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'mark',
		'power',
		'year',
		'color'
	];

	public function clients()
	{
		return $this->belongsToMany(Client::class, 'clients_has_cars', 'cars_num', 'clients_license_num');
	}

	public function requests()
	{
		return $this->hasMany(Request::class, 'cars_num');
	}

	public function works()
	{
		return $this->hasMany(Work::class, 'cars_num');
	}
}
