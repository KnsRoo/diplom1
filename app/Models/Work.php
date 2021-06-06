<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 * 
 * @property int $id
 * @property Carbon $start_date
 * @property string $category
 * @property int|null $cost
 * @property Carbon|null $end_plan
 * @property Carbon|null $end_fact
 * @property int $mechanics_id
 * @property string $cars_num
 * 
 * @property Car $car
 * @property Mechanic $mechanic
 *
 * @package App\Models
 */
class Work extends Model
{
	protected $table = 'works';
	public $timestamps = false;

	protected $casts = [
		'cost' => 'int',
		'mechanics_id' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_plan',
		'end_fact'
	];

	protected $fillable = [
		'start_date',
		'category',
		'cost',
		'end_plan',
		'end_fact',
		'mechanics_id',
		'cars_num'
	];

	public function car()
	{
		return $this->belongsTo(Car::class, 'cars_num');
	}

	public function mechanic()
	{
		return $this->belongsTo(Mechanic::class, 'mechanics_id');
	}
}
