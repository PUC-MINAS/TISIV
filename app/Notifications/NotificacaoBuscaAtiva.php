<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificacaoBuscaAtiva extends Notification
{
    use Queueable;

    private $details;
    public $names = ['José Carmo Cansado','Lúcio Mauro Arlindo','Martha Eleonora','Alfonso Beltrame','Arlindo Silveira'];
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($randomNumber)
    {
        $this->name = $this->names[$randomNumber];
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
        return [
            'titulo' => 'Iniciar busca ativa',
            'descricao' => 'Beneficiado: '.$this->name,
        ];
    }
}
