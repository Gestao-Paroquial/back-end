<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoReprovado extends Mailable
{
    use Queueable, SerializesModels;

    public $conteudoEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($conteudoEmail)
    {
        $this->conteudoEmail = $conteudoEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.pedidoReprovado')
            ->with([
                'conteudoEmail' => $this->conteudoEmail,
            ]);
    }
}
