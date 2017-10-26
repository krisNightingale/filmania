<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stuff
 * 
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $position_id
 * 
 * @property \App\Models\Position $position
 * @property \Illuminate\Database\Eloquent\Collection $films
 *
 * @package App\Models
 */
class Stuff extends Model
{
	protected $table = 'stuff';
	public $timestamps = false;

	protected $casts = [
		'position_id' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'position_id'
	];

	public function position()
	{
		return $this->belongsTo(Position::class);
	}

	public function films()
	{
		return $this->belongsToMany(Film::class);
	}
}
