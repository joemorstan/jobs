<?php

namespace App\Mail;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EloquentUser $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.activation')
            ->subject('Please activate your account.')
            ->with([
                'user' => $this->user,
                'code' => $this->code,
            ]);
    }
}
