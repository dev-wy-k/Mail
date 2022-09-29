<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $postTitle,  $postDescription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postTitle, $postDescription)
    {
        $this->postTitle = $postTitle;
        $this->postDescription = $postDescription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kyaw@gyi.com', 'Kyaw Gyi')
                    ->cc('mg@mg.com', 'Maung Gyi')
                    // ->to('kyaw@kyaw.com')
                    ->subject('San Kyi Tr Par')
                    ->view('mail.mailSend');
    }
}
