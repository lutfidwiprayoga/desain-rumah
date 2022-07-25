<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinalDesain extends Mailable
{
    use Queueable, SerializesModels;
    public $final;
    public function __construct($final)
    {
        $this->final = $final;
    }

    public function build()
    {
        return $this->markdown('backend.desainer.v_emailFinal')
            ->with('final', $this->final)
            ->from('griya.artech@gmail.com', 'Griya Artech Indonesia')
            ->subject('Griya Artech, Solusi Rumah Impian Anda');
    }
}
