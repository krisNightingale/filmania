<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Staff;
use App\Models\Watchlist;
use App\Models\User;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function getAll(Request $request){
        $filmCount = Film::count();

        $offset = $request->has('offset') ? $request->offset : 0;
        $limit = $request->has('limit') ? $request->limit : $filmCount;

        $films = Film::skip($offset)->take($limit)->get();

        return view('film_list')->with(compact('films'));
    }

    public function getMain(){
        $limit = 6;
        $top = Film::orderByRaw('rating DESC')
            ->take($limit)
            ->get();
        $new = Film::orderByRaw('id DESC')
            ->take($limit)
            ->get();

        return view('main')->with(['top' => $top, 'new' => $new]);
    }

    public function searchFilm(Request $request){
        $name = $request->query('search');

        $films = Film::where('name', 'like', "%".$name."%")->get()->all();
        if (count($films) == 0){
            $films = Film::where('release_year', '=', intval($name))->get()->all();
        }
        if (count($films) == 0){
            $films = Film::where('country', 'like', "%".$name."%")->get()->all();
        }
        if (count($films) == 0){
            $films = Film::where('rating', '=', $name)->get()->all();
        }

        return view('film_list')->with(['films' => $films]);
    }

    public function searchFilmByGenre(Request $request){
        $name = $request->query('genre');

        $films = Film::where('genre', 'like', "%".$name."%")->get();
        return view('film_list')->with(['films' => $films]);
    }

    public function getTop(){
        $top = Film::orderByRaw('rating DESC')->get();
        return view('film_list')->with(['films' => $top]);
    }

    public function getNew(){
        $new = Film::orderByRaw('release_year DESC')->get();
        return view('film_list')->with(['films' => $new]);
    }

    public function getFilmById($id){
        $film = Film::find($id);
        $user = request()->user();
        $reviews = $film->reviews()->get();
        $recommends = Film::orderByRaw('rating DESC')->take(3)->get();
        if ($user->watchlists()->get()->where('film_id', '==', $id)->first())
            $mark = $user->watchlists()->get()->where('film_id', '==', $id)->first()->mark;
        else $mark = 0;

        return view('film')->with(compact('film', 'user', 'reviews', 'recommends', 'mark'));
    }

    public function updateMark(Request $request){
        $user_id = $request->user_id;
        $film_id = $request->film_id;
        $mark = $request->mark;

        $wathchlistItem = Watchlist::find()
            ->where('user_id', '=', $user_id)
            ->where('film_id', '=', $film_id)
            ->first();
        $wathchlistItem->update([
            'mark' => $mark,
            'action_id' => 1,
        ]);
    }

    public function addToWatchlist(Request $request){
        $user_id = $request->user_id;
        $film_id = $request->film_id;

        $watchlistItem = User::all()->find($user_id)->watchlists()
        ->create([
            'film_id' => $film_id,
        ]);
        if ($watchlistItem){
            return true;
        }
        return false;
    }

    /**
     * @param Request $request
     */
    public function changeAction(Request $request){
        $user_id = $request->user_id;
        $film_id = $request->film_id;
        $action_id = $request->action_id;

        $watchlist = Watchlist::find()
            ->where('user_id', '=', $user_id)
            ->where('film_id', '=', $film_id)
            ->get();

        $watchlist->action_id = $action_id;
        $watchlist->update([
            'action_id' => $action_id
        ]);
    }


}
