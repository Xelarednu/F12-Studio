<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Message extends Mailable
{
    use Queueable, SerializesModels;

    public $userEmail;
    public $messageContent;

    public function __construct($userEmail, $messageContent) {
        $this->userEmail = $userEmail;
        $this->messageContent = $messageContent;
    }

    public function build()  {
        return $this->from(config('mail.from.address')) // Sender (your app's email)
                    ->replyTo($this->userEmail) // Reply to the user's email
                    ->subject('New Contact Message')
                    ->view('emails.message')
                    ->with([
                        'messageContent' => $this->messageContent,
                        'userEmail' => $this->userEmail,
                    ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Message',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
