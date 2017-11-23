<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property Review[] $reviews
 * @property Watchlist[] $watchlists
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'watchlist');
    }

    public function wishlist()
    {
        $wishlist = $this->watchlists()->get();
        $films = [];
        foreach ($wishlist as $wish){
            if ($wish->action_id == 2)
                $films[] = $wish->film()->first();
        }
        return $films;
    }

    public function watched()
    {
        $watched = $this->watchlists()->get();
        $films = [];
        foreach ($watched as $item){
            if ($item->action_id == 1)
                $films[] = $item->film()->first();
        }
        return $films;
    }

    public function userPhoto()
    {
        return $this->belongsTo(UserPhoto::class, 'photo_id', 'id');
    }

    public function getPhotoPath()
    {
        return asset('images/'.$this->userPhoto()->first()->image_path);
    }

    public function favorites()
    {
        return $this->belongsToMany(Film::class, 'favorites');
    }

    public function isAdmin()
    {
        $admin = Admin::all()->where('user_id', '==', $this->id)->first();
        return $admin ? true : false;
    }

    public function hasInWishlist($film_id){
        $wishes = $this->wishlist();
        foreach ($wishes as $wish){
            if ($wish->id == $film_id)
                return true;
        }
        return false;
    }

    public function hasWatched($film_id){
        $watched = $this->watched();
        foreach ($watched as $film){
            if ($film->id == $film_id)
                return true;
        }
        return false;
    }

    public function isFilmFavorite($film_id){
        $favorites = $this->favorites()->get();
        foreach ($favorites as $favorite){
            if ($favorite->id == $film_id)
                return true;
        }
        return false;
    }
}
