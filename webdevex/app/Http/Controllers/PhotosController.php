<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\UserVote;
use App\User;
use Auth;
use DB;
use App\Setting;

class PhotosController extends Controller
{
    public function index()
    {
    	$photos = Photo::All();

    	if (Auth::user()) {
    		$userId = Auth::user()->id;    		
    	}
    	else {
    		$userId = 0;
    	}

        $settings = setting::find(1);

        $now = date('Y-m-d', strtotime($settings->now));

    	$user = User::find($userId);

    	$userVotes = DB::table('user_votes')
    				->where('user_id', $userId)
    				->get();

    	return view('photos.index', compact('photos', 'user', 'settings', 'now'));
    }

    public function show(Photo $id)
    {
    	
    	return view('photos.show', compact('id'));


    }

    public function vote(Photo $id){

    	$userId = Auth::user()->id;

    	$voteCheck = DB::table('user_votes')->where([
    		['user_id', '=', $userId],
    		['photo_id', '=', $id->id],
    	])->get();

    	if (count($voteCheck) == 0) {

    		$id->votes += 1;

    		$id->save();

    		$vote = new UserVote();

	    	$vote->user_id = $userId;
	    	$vote->photo_id = $id->id;

	    	$vote->save();

    	}
    	else {
    		var_dump('al gevote');
    	}

    	return back();
    }
}
