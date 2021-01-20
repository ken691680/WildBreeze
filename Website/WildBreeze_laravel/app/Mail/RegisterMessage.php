<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RegisterMessage
 * @package App\Mail
 */
class RegisterMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $register;

    /**
     * Register constructor.
     * @param $register
     */
    public function __construct($register)
    {
        $this->register = $register;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->view('mail.member_register');
    }
}
