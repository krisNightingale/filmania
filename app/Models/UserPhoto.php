<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $image_path
 */
class UserPhoto extends Model
{
    protected $table = 'user_photos';
    public $timestamps = false;

    protected $fillable = [
        'image_path'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
