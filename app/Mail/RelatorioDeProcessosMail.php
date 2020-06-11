<?php

namespace App\Mail;

use App\Models\Processo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RelatorioDeProcessosMail extends Mailable
{
    use Queueable, SerializesModels;

    private $processos;
    private $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf){
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('RELATORIO DE PROCESSOS')
            ->markdown('mail.relatorio')
            ->with([
                'name' => 'New Mailtrap User',
                'link' => 'https://mailtrap.io/inboxes'
            ])
            ->attachData($this->pdf->output(), 'relatorio-dos-processos.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
