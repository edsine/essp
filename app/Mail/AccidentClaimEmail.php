<?php
// app/Mail/DeathClaimEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\AccidentClaim;

class AccidentClaimEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $accidentClaim;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AccidentClaim $accidentClaim)
    {
        $this->accidentClaim = $accidentClaim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank You for Your Accident Claim Submission')
        ->view('emails.claims.accident-claim');
    }
}

?>