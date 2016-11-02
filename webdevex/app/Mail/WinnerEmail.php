<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Winner;

class WinnerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $winner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Winner $winner)
    {
        $this->winner = $winner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        return $this->from('samdewachter@gmail.com')
                ->view('emails.mailEvent')
                ->with([
                        'name' => $this->winner->name,
                        'email' => $this->winner->email,
                        'votes' => $this->winner->votes,
                        ]);

    }
}
