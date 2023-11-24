<?php
// app/Mail/DeathClaimEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DeathClaim;

class DeathClaimEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $deathClaim;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DeathClaim $deathClaim)
    {
        $this->deathClaim = $deathClaim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank You for Your Death Claim Submission')
                    ->view('emails.death-claim');
    }
}

?>