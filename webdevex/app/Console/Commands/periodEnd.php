<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Photo;
use App\Winner;
use App\User;
use App\Mail\WinnerEmail;
use Illuminate\Mail\Mailable;
use Mail;

class periodEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'period:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $winners = DB::table('photos')
                            ->where('uploaded', true)
                            ->orderBy('votes', 'desc')
                            ->first();

            $winners = Photo::find($winners->id);

            $winner = new Winner();

            $winner->name = $winners->User->name;
            $winner->email = $winners->User->email;
            $winner->ip = $winners->ip;
            $winner->period = $winners->period;
            $winner->photo = $winners->photo;
            $winner->votes = $winners->votes;

            $winner->save();
        
            Mail::to('samdewachter@hotmail.com')->send(new WinnerEmail($winner));
        

            $photos = Photo::all();

            foreach ($photos as $photo) {
                $photo->uploaded = false;
                $photo->save();
                $photo->delete();
            }
    }
}
