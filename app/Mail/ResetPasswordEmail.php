<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cartalyst\Sentinel\Users\UserInterface;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UserInterface $user, $code)
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
        return $this->view('emails.forgot-password')
            ->subject("Hello, {$this->user->first_name}! Please reset your password.")
            ->with([
                'user' => $this->user,
                'code' => $this->code,
            ]);
    }
}
