<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $id
 * @property int $user_id
 * @property int $film_id
 * @property \Carbon\Carbon $date
 * @property int $mark
 * @property string $text
 * 
 * @property \App\Models\Film $film
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Review extends Model
{
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'film_id' => 'int',
		'mark' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'user_id',
		'film_id',
		'date',
		'mark',
		'text'
	];

	public function film()
	{
		return $this->belongsTo(Film::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
