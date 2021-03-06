<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mantencion;

class MailMantencion extends Mailable
{
    use Queueable, SerializesModels;

    public $mantencion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mantencion $mantencion)
    {
        $this->mantencion = $mantencion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notificación de mantención')->view('emails.mantencion');
    }
}
