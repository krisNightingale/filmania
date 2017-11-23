<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUserList(){
        $users = User::all()->get();
        return $users;
    }

    public function getUserById($id){

    }

    public function getMyProfile(Request $request){
        $user = $request->user();
        $watchlists = $user->watchlists()->get();
        $watched = [];
        $wished = [];
        foreach ($watchlists as $watchlist){
            if($watchlist->action_id == 1){
                $watched[] = $watchlist->film()->first();
            } elseif ($watchlist->action_id == 2){
                $wished[] = $watchlist->film()->first();
            }
        }
        $favorites = $user->favorites()->get();
        return view('user')->with([
            'user' => $user,
            'watched' => $watched,
            'wished' => $wished,
            'favorites' => $favorites
        ]);
    }

    public function userInfo(Request $request){
        return view('edit_user_info')->with(['user' => $request->user()]);
    }

    public function updateUserInfo(Request $request){
        $first_name = $request->first_name;
        $last_name = $request->last_name;

        $user =$request->user()
            ->update([
                'first_name' => $first_name,
                'last_name' => $last_name
            ]);

        return redirect(url('/user/me'));
    }

    public function setReview($id){
        $user = request()->user();
        $text = request('text');

        $user->reviews()->create([
            'film_id' => $id,
            'text' => $text,
        ]);

        return redirect(url('/film/'.$id));
    }

    public function setRating($film_id, $rating){
        $user = request()->user();
        $watchlist = $user->watchlists()->get()->where('film_id', '==', $film_id)->first();
        $watchlist->update([
            'mark' => $rating,
        ]);
        Film::find($film_id)->updateRating();

        return redirect(url('/film/'.$film_id));
    }

    public function addToWishlist($id){
        $user = request()->user();

        $watchlist = $user->watchlists()->get()->where('film_id', '==', $id)->first();
        if (!$watchlist){
            $user->watchlists()->create([
                'film_id' => $id,
                'action_id' => 2,
            ]);
        } else {
            $watchlist->update([
                'action_id' => 2,
            ]);
        }
        return redirect(url('/film/'.$id));
    }

    public function removeFromWatchlist($id){
        $user = request()->user();
        $watchlist = $user->watchlists()->get()->where('film_id', '==', $id)->first();
        $watchlist->delete();

        return redirect(url('/film/'.$id));
    }

    public function addToFavorites($id){
        $user = request()->user();

        if ($user->hasWatched($id)){
            $user->favorites()->attach($id);
        }
        return redirect(url('/film/'.$id));
    }

    public function removeFromFavorites($id){
        $user = request()->user();
        $user->favorites()->detach($id);

        return redirect(url('/film/'.$id));
    }

    public function addToWatched($id){
        $user = request()->user();

        $watchlist = $user->watchlists()->get()->where('film_id', '==', $id)->first();
        if (!$watchlist){
            $user->watchlists()->create([
                'film_id' => $id,
                'action_id' => 1,
            ]);
        } else {
            $watchlist->update([
                'action_id' => 1,
            ]);
        }
        return redirect(url('/film/'.$id));
    }
}
