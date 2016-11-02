<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use Auth;
use DB;
use Carbon\Carbon;
use App\Setting;

class UploadController extends Controller
{
    public function index(){

        

        $settings = setting::find(1);

        $now = date('Y-m-d', strtotime($settings->now));

        $userId = Auth::user()->id;

        $photoCheck = DB::table('photos')
                        ->where('user_id', $userId)
                        ->whereNull('deleted_at')
                        ->first();

    	return view('upload.index', compact('photoCheck', 'settings', 'now'));
    }

    public function store(Request $request){

        $user = Auth::user();
    	
    	$userId = $user->id;

        $photoCheck = DB::table('photos')
                        ->where('user_id', $userId)
                        ->whereNull('deleted_at')
                        ->get();

        $settings = Setting::find(1);

        $period = 0;

        if (count($photoCheck) == 0) {
            $photo = new Photo();

            $now = date('Y-m-d', strtotime($settings->now));

            $beginPeriod1 = date('Y-m-d', strtotime($settings->beginPeriod1));
            $beginPeriod2 = date('Y-m-d', strtotime($settings->beginPeriod2));
            $beginPeriod3 = date('Y-m-d', strtotime($settings->beginPeriod3));
            $beginPeriod4 = date('Y-m-d', strtotime($settings->beginPeriod4));

            $endPeriod1 = date('Y-m-d', strtotime($settings->endPeriod1));
            $endPeriod2 = date('Y-m-d', strtotime($settings->endPeriod2));
            $endPeriod3 = date('Y-m-d', strtotime($settings->endPeriod3));
            $endPeriod4 = date('Y-m-d', strtotime($settings->endPeriod4));

            if ($beginPeriod1 < $now && $now <= $endPeriod1) {
                $period = 1;
            } else if ($beginPeriod2 < $now && $now <= $endPeriod2){
                $period = 2;
            } else if($beginPeriod3 < $now && $now <= $endPeriod3) {
                $period = 3;
            } else if ($beginPeriod4 < $now && $now <= $endPeriod4) {
                $period = 4;
            }

            $this->validate($request, [
                'photoName' => 'required',
                'contestPhoto' => 'image|mimes:jpg,png,jpeg|required'
            ]);            

            $photo->name = $request->photoName;
            $photo->user_id = $userId;
            $photo->votes = 0;
            $photo->uploaded = true;
            $photo->ip = $request->ip();
            $photo->period = $period;

            $imageName = $request->file('contestPhoto')->getClientOriginalName();

            $imageName = rand(0, 10000) . $imageName;

            $request->file('contestPhoto')->move(
                base_path() . '/public/uploads/', $imageName
            );

            $photo->photo = $imageName;

            $photo->save();

            $user->contestant = true;

            $user->save();
        }
        else{
            var_dump('reeds foto upgeload');
        }
    	
    	return back();
    }
}
