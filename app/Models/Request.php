<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Request
 * 
 * @property int $id
 * @property string $date
 * @property string $category
 * @property string $cars_num
 * 
 * @property Car $car
 *
 * @package App\Models
 */
class Request extends Model
{
	protected $table = 'request';
	public $timestamps = false;

	protected $fillable = [
		'date',
		'category',
		'cars_num',
		'user_login'
	];

	public function car()
	{
		return $this->belongsTo(Car::class, 'cars_num');
	}
}
