<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProductNotification extends Notification
{
    //This uses the Queueable trait to allow the notification to be queued for background processing.
    use Queueable;

    //This defines a public property called $product that will hold
    // the product object for the new product being launched.
    public Product $product;

    /**
     * Create a new notification instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // This method specifies the delivery channels for the notification.
        // In this case, it returns an array with a single string value of 'mail',
        // indicating that the notification should be sent by email.
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // This method specifies the email representation of the notification.
    // It takes a $notifiable object as an argument,
    // which is used to customize the notification for the particular recipient.
    // In this case, the method returns a MailMessage object with the subject,
    // greeting, and message body for the notification.
    // The action method is used to provide a link for the recipient to view the new product on the website.
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('We just launched a new Product!')
                    ->greeting('Dear '. $notifiable->name . ' ,')
                    ->line('Wre are pleased to announce a new product. '. $this->product->name)
                    ->action('View Product ', url('/products/' .$this->product->id))
                    ->line('Thank you for using our application');
    }
}
