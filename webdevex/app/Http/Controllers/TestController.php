<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\setting;

class TestController extends Controller
{
    public function index(){

    	$settings = Setting::find(1);

    	$now = date('Y-m-d', strtotime($settings->endPeriod4));

    	$end = date('Y-m-d', strtotime($settings->endPeriod3));

    	var_dump($end);
    	var_dump($now);


    	if ($end < $now) {
    		echo 'kleir';
    	}

    }
}
