<?php

namespace App\Mail\Guest;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $url;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->url = url(config('app.url') . '/reset-password/' . $token . '?email=' . urlencode($user->email));
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgot Password Link - ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.guest.forgot-password-link',
            with: [
                'url' => $this->url,
            ],
        );
    }
}
