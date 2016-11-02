<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Photo;
use Auth;

class AccountController extends Controller
{
    public function index(User $id){
    	return view('account.index', compact('id'));
    }

    public function delete(Photo $id){

    	$photo = Photo::find($id->id);
        if (Auth::user()->id == $photo->user_id) {
            $photo->uploaded = false;
            $photo->save();
            $photo->delete();
        }
    	
    	return Redirect::back()->withErrors(['Photo succesfully deleted']);
    }
}
