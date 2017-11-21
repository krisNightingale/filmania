<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserList(){
        $users = User::all()->get();
        return $users;
    }

    public function getCurrentUser(Request $request){
        $user = $request->user();
        return view('user')->with(compact('user'));
    }

    public function getUserById($id){

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
        if ($user){
            return view('user')->with(compact('user'));
        }
    }

    public function setReview(Request $request){
        $user_id = $request->user_id;
        $film_id = $request->film_id;
        $text = $request->text;
        $mark = $request->mark;

        $user = User::find($user_id)
            ->reviews()->create([
                'film_id' => $film_id,
                'text' => $text,
                'mark' => $mark,
            ]);
    }
}
