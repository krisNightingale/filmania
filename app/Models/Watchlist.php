<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Watchlist
 * 
 * @property int $id
 * @property int $user_id
 * @property int $film_id
 * @property int $mark
 * @property int $action_id
 * 
 * @property \App\Models\Action $action
 * @property \App\Models\Film $film
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Watchlist extends Model
{
	protected $table = 'watchlist';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'film_id' => 'int',
		'mark' => 'int',
		'action_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'film_id',
		'mark',
		'action_id'
	];

	public function action()
	{
		return $this->belongsTo(Action::class);
	}

	public function film()
	{
		return $this->belongsTo(Film::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
