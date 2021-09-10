<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioMailContato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $contato;
    public function __construct($contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {       
          return $this->from(env('MAIL_FROM_ADDRESS'))
                ->view('mail.contatoEmail')
                ->attach(storage_path('app/'.$this->contato->url_anexo))
                ->with([
                    'contato' => $this->contato,
                ]);
    }
}
