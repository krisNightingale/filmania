<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function createFilm(Request $request){
        return view('admin.create');
    }

    public function addFilm(Request $request){
        $name = $request->name;
        $duration = $request->duration;
        $release_year = $request->release_year;
        $country = $request->country;
        $genre = $request->genre;
        $description = $request->description;

        $film = Film::create([
            'name' => $name,
            'duration' => $duration,
            'release_year' => $release_year,
            'country' => $country,
            'genre' => $genre,
            'description' => $description,
        ]);

        if ($film){
            return redirect(url('/film/new'));
        }
        return back();
    }

    public function updateFilmPage(Request $request){
        $filmId = $request->segment(count(request()->segments()));
        $film = Film::find($filmId);
        return view('admin.update')->with(compact('film'));
    }

    public function updateFilm(Request $request){
        $filmId = $request->segment(count(request()->segments()));
        $film = Film::find($filmId);

        $name = $request->name;
        $duration = $request->duration;
        $release_year = $request->release_year;
        $country = $request->country;
        $genre = $request->genre;
        $description = $request->description;

        $film->update([
            'name' => $name,
            'duration' => $duration,
            'release_year' => $release_year,
            'country' => $country,
            'genre' => $genre,
            'description' => $description,
        ]);

        if ($film){
            return redirect(url('/film/new'));
        }
        return back();
    }

    public function deleteFilm(Request $request){

    }
}
