<?php

namespace App\Events;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OtpMail extends Mailable
{
    use Dispatchable, SerializesModels;

    public $reset_otp;

    /**
     * OtpMail constructor.
     * @param $reset_otp
     */
    public function __construct($reset_otp)
    {
        $this->reset_otp = $reset_otp;
    }

    /**
     * @return mixed
     */
    public function build()
    {
        return $this->from('mail@example.com', 'Mailtrap')
            ->subject('Forget Password OTP Email')
            ->markdown('email')
            ->with([
                'reset_otp' => $this->reset_otp,
                'name' => 'New Mailtrap User',
                'link' => 'https://mailtrap.io/inboxes'
            ]);
    }
}
