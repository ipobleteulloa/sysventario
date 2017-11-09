<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mantencion;

class MantencionCaja extends Mailable
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
        return $this->subject('Mantención a computador de caja')->view('emails.mantencion_caja');
    }
}
