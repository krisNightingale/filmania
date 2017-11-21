<?php

namespace App\Http\Controllers;

use App\Models\Film;
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

        return view('main')->with(compact('films'));
    }

    public function getMain(Request $request){
        $limit = 4;
        $top = Film::orderByRaw('rating DESC')
            ->take($limit)
            ->get();
        $newest = Film::orderByRaw('id DESC')
            ->take($limit)
            ->get();

        return view('main')->with(['top' => $top, 'newest' => $newest]);
    }

    public function getFilmById(Request $request){
        $filmId = $request->segment(count(request()->segments()));
        $film = Film::find($filmId);

        $header = [ 'Content-Type' => 'application/json; charset=utf-8' ];
        return response()->json($film, 200, $header, JSON_UNESCAPED_UNICODE);
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
