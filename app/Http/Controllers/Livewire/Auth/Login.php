<?php

namespace App\Http\Controllers\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Login extends Component
{
    use LivewireAlert;

    public $emailOrMobile;
    public $password;

    protected $rules = [
        'emailOrMobile' => ['required'],
        'password' => ['required','min:8','max:20'],
    ];

    public function mount() {
        if (Auth::check()) {
            return redirect()->route('erp.home');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('livewire.auth.app');
    }

    public function submit()
    {
        $this->validate();
        $user = User::where('mobile', $this->emailOrMobile)->orWhere('email', $this->emailOrMobile)->first();

        if (!$user) {
            return $this->alert('error', 'Account not found, please create new account', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }

        if (!$user->hasRole('user')) {
            return $this->alert('error', 'Account not found, please create new account', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }

        if (!$user->email_verified_at) {
            return $this->alert('error', 'Please confirm your email address, we have sent you an email.', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }

        if (Auth::attempt(['email' => $user->email, 'password' => $this->password])) {
            $this->confirmed();
        } else {
            return $this->alert('error', 'Please enter valid password.', [
                'position' => 'top',
                'timer' => 1000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function confirmed()
    {
        redirect()->route('erp.home');
    }

    public function getListeners()
    {
        return [
            'confirmed'
        ];
    }
}
