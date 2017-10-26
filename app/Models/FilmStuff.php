<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilmStuff
 * 
 * @property int $film_id
 * @property int $stuff_id
 * 
 * @property \App\Models\Film $film
 * @property \App\Models\Stuff $stuff
 *
 * @package App\Models
 */
class FilmStuff extends Model
{
	protected $table = 'film_stuff';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'film_id' => 'int',
		'stuff_id' => 'int'
	];

	public function film()
	{
		return $this->belongsTo(Film::class);
	}

	public function stuff()
	{
		return $this->belongsTo(Stuff::class);
	}
}
