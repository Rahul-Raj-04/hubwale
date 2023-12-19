<?php

namespace App\Http\Controllers\Livewire\Auth;

use App\Mail\Common\ForgotPassword as CommonForgotPassword;
use Livewire\Component;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\PasswordForgot;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Component
{
    use LivewireAlert;

    public $emailOrMobile;
    public $otp;
    public $password;
    public $confirmPassword;
    public $isOtpSent = false;
    public $otpSending = false;
    public $forgotPassword;
    public $user;

    public function render()
    {
        return view('livewire.auth.forgot-password')->extends('livewire.auth.app');
    }

    public function sendOtp()
    {
        $this->validate([
            'emailOrMobile' => ['required']
        ],[
            'emailOrMobile.required' => 'Email or mobile is required.'
        ]);

        $this->user = User::where('mobile', $this->emailOrMobile)->orWhere('email', $this->emailOrMobile)->first();
        if (!$this->user OR ($this->user && !$this->user->hasRole('user'))) {
            throw ValidationException::withMessages([
                'emailOrMobile' => ['Account not found, please create new account.'],
            ]);
        }

        if (!$this->user->email_verified_at) {
            throw ValidationException::withMessages([
                'emailOrMobile' => ['Your email is not verified, Please confirm your email address. we have sent you an email.'],
            ]);
        }
        $this->otpSending = true;
        $otp = rand(111111,999999);

        // send otp to user's email
        Mail::to($this->user->email)->send(new CommonForgotPassword($this->user, $otp));
        
        PasswordForgot::where('user_id', $this->user->id)->delete();
        $this->forgotPassword = PasswordForgot::create([
            'user_id' => $this->user->id,
            'otp' => $otp
        ]);

        $this->isOtpSent = true;
        return $this->alert('success', 'Please check your inbox, we have sent you an OTP to your email address.', [
            'position' => 'top',
            'timer' => 10000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function submitOtp()
    {
        $this->validate([
            'emailOrMobile' => ['required'],
            'otp' => ['required', 'numeric', 'digits:6'],
            'password' => ['required','min:8','max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'confirmPassword' => ['required', 'same:password']
        ]);

        if ($this->forgotPassword->otp !== $this->otp) {
            throw ValidationException::withMessages([
                'otp' => ['Please enter correct otp.'],
            ]);
        }

        PasswordForgot::where('user_id', $this->user->id)->delete();
        $this->user->password = bcrypt($this->password);
        $this->user->save();
        return redirect()->route('login')->with('message', "Password reset successfully, Please login.");
    }
}
