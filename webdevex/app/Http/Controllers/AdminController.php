<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Setting;

class AdminController extends Controller
{

	public function __construct()
	{
	    $this->middleware('admin');
	}

    public function index(){

    	$users = DB::table('users')->where('contestant', true)->paginate(10);
    	
    	return view('manage.index', compact('users'));
    }

    public function details(User $id) {
    	return view('manage.details', compact('id'));
    }

    public function delete(User $id) {
    	$user = User::find($id->id);
    	$user->disqualified = true;
    	$user->contestant = false;
    	$user->save();


    	$user->delete();

    	return redirect('manage')->withErrors(['Contestant succesfully deleted']);
    }

    public function disqualify(User $id){
    	$user = User::find($id->id);

    	$user->disqualified = !$user->disqualified;
    	$user->save();

    	return back();
    }

    public function settings()
    {
    	$settings = Setting::find(1);

    	return view('manage.settings', compact('settings'));
    }

    public function updateSettings(Setting $id, Request $request)
    {
    	$id->beginPeriod1 = $request->beginPeriod1;
    	$id->beginPeriod2 = $request->beginPeriod2;
    	$id->beginPeriod3 = $request->beginPeriod3;
    	$id->beginPeriod4 = $request->beginPeriod4;
    	$id->endPeriod1 = $request->endPeriod1;
    	$id->endPeriod2 = $request->endPeriod2;
    	$id->endPeriod3 = $request->endPeriod3;
    	$id->endPeriod4 = $request->endPeriod4;
    	$id->now = $request->now;

    	$id->save();

    	return back();
    }

}
