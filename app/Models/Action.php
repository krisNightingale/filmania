<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Action
 * 
 * @property int $id_action
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $watchlists
 *
 * @package App\Models
 */
class Action extends Model
{
	protected $primaryKey = 'id_action';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function watchlists()
	{
		return $this->hasMany(Watchlist::class);
	}
}
