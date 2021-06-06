<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mechanic
 * 
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $tel_num
 * @property int $qualification
 * @property string $user_login
 * 
 * @property User $user
 * @property Collection|Work[] $works
 *
 * @package App\Models
 */
class Mechanic extends Model
{
	protected $table = 'mechanics';
	public $timestamps = false;

	protected $casts = [
		'qualification' => 'int'
	];

	protected $fillable = [
		'name',
		'address',
		'tel_num',
		'qualification',
		'user_login'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_login');
	}

	public function works()
	{
		return $this->hasMany(Work::class, 'mechanics_id');
	}
}
