<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $stuffs
 *
 * @package App\Models
 */
class Position extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function stuffs()
	{
		return $this->hasMany(Staff::class);
	}
}
