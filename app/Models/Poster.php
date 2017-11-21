<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $image_path
 */
class Poster extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'image_path'
    ];

    public function film()
    {
        return $this->hasOne(Film::class);
    }
}
