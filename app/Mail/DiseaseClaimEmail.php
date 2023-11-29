<?php
// app/Mail/DeathClaimEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DiseaseClaim;

class DiseaseClaimEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $diseaseClaim;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DiseaseClaim $diseaseClaim)
    {
        $this->diseaseClaim = $diseaseClaim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank You for Your Disease Claim Submission')
        ->view('emails.claims.disease-claim');
    }
}

?>