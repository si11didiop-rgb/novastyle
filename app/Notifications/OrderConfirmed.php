<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmed extends Notification
{
    use Queueable;

    public function __construct(public Order $order)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Commande #'.$this->order->id.' confirmée — NovaStyle')
            ->greeting('Bonjour '.$notifiable->name.' !')
            ->line('Ta commande #'.$this->order->id.' a bien été reçue et est en cours de traitement.')
            ->line('**Total : '.number_format($this->order->total, 2).' €**')
            ->line('**Adresse de livraison :** '.$this->order->address)
            ->action('Voir ma commande', url('/mes-commandes/'.$this->order->id))
            ->line('Merci pour ton achat sur NovaStyle !')
            ->salutation('L\'équipe NovaStyle');
    }
}