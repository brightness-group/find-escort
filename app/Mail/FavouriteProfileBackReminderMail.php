<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FavouriteProfileBackReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $girl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $details, $girl )
    {
        $this->details = $details;
        $this->girl    = $girl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown( 'emails.favourite-profile-back' )
                    ->with( 
                            ['details', $this->details ],
                            ['girl', $this->girl ]
                        );
    }
}