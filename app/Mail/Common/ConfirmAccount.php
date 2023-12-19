<?php

namespace App\Mail\Common;

use App\Models\EmailVerification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ConfirmAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailVerification = EmailVerification::create([
            'user_id' => $this->user->id,
            'token' => Str::random(50)
        ]);
        $appUrl = env('APP_URL');
        return $this->view('mail.common.confirm-account', [
            'app_url' => $appUrl,
            'user' => $this->user,
            'email_verification' => $emailVerification
        ]);
    }
}
