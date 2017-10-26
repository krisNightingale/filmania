<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Film
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $release_year
 * @property int $duration
 * @property string $country
 * @property string $genre
 * @property float $rating
 * 
 * @property \Illuminate\Database\Eloquent\Collection $stuffs
 * @property \Illuminate\Database\Eloquent\Collection $reviews
 * @property \Illuminate\Database\Eloquent\Collection $watchlists
 *
 * @package App\Models
 */
class Film extends Model
{
	public $timestamps = false;

	protected $casts = [
		'duration' => 'int',
		'rating' => 'float'
	];

	protected $dates = [
		'release_year'
	];

	protected $fillable = [
		'name',
		'release_year',
		'duration',
		'country',
		'genre',
		'rating'
	];

	public function stuffs()
	{
		return $this->belongsToMany(Stuff::class);
	}

	public function reviews()
	{
		return $this->hasMany(Review::class);
	}

	public function watchlists()
	{
		return $this->hasMany(Watchlist::class);
	}
}
