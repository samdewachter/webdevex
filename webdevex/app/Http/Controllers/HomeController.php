<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Mail\Mailable;
use App\User;
use App\Setting;

use App\Winner;

class HomeController extends Controller
{
    public function index()
    {
    	$winners = Winner::All();

        $settings = Setting::find(1);

        return view('home.index', compact('winners', 'settings'));
    }

}
