<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificacaoBuscaAtiva extends Notification
{
    use Queueable;

    private $beneficiado;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($beneficiado)
    {
        $this->beneficiado = $beneficiado;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $telefone = is_null($this->beneficiado->telefone) ? 'Nao informado' : $this->beneficiado->telefone;
        $whatsapp = is_null($this->beneficiado->num_wpp) ? 'Nao informado' : $this->beneficiado->num_wpp;
        $cto_emerg = is_null($this->beneficiado->contato_emerg) ? 'Nao informado' : $this->beneficiado->contato_emerg;

        return [
            'nome' => $this->beneficiado->nome,
            'telefone' => $telefone,
            'whatsapp' => $whatsapp,
            'cto_emerg' => $cto_emerg,
        ];
    }
}
