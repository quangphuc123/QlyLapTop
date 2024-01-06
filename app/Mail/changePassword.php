<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class changePassword extends Mailable
{
    use Queueable, SerializesModels;

    protected User $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: mb_encode_mimeheader(env('MAIL_FROM_ADDRESS')),
            subject: 'Quên mật khẩu',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.forgot-email',
            with:[
                'id'=>$this->user->id,
                'name'=>$this->user->name,
                'mail'=>$this->user->email
            ]
        );
    }

}
