<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class billMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bill;
    public $hirer;
    public $worker;
    public $time;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hirer,$worker,$bill,$time)
    {
        $this->hirer = $hirer ;
        $this->worker = $worker;
        $this->bill = $bill;
        $this->time = $time;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Bill Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'Mails.billMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
