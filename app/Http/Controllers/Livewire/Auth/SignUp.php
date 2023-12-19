<?php

namespace App\Http\Controllers\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\ReferralTransaction;
use App\Models\PlanUsageTransaction;
use App\Models\ReferralBenefit;
use App\Enum\Enum;
use App\Models\UserPlan;
use App\Mail\Common\ConfirmAccount;
use Illuminate\Support\Facades\Mail;


class SignUp extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $mobile;
    public $password;
    public $confirm_password;
    public $referral_code;

    protected $rules = [
        'name' => ['required','min:6','max:255'],
        'email' => ['required','email', 'unique:users'],
        'mobile' => ['required','numeric','digits:10', 'unique:users'],
        'password' => ['required','min:8','max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        'confirm_password' => ['required','same:password'],
        'referral_code' => ['nullable','exists:users,referral_code']
    ];

    protected $messages = [
        'referral_code.exists' => 'Please enter valid referral code.',
    ];

    public function mount() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.auth.sign-up')->extends('livewire.auth.app');
    }

    public function applyReferralCode()
    {
        $this->validate(
            [
            'referral_code' => ['required','exists:users,referral_code']
            ],
            [
                'referral_code.exists' => 'Please enter valid referral code.',
                'referral_code.required' => 'Please enter referral code.'
            ]
        );

        $this->alert('success', 'referral code apply.', [
            'position' => 'top-right',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function submit()
    {
        $this->validate();
 
        $hashedPassword = Hash::make($this->password);
        $referral_code = rand(11111,99999).substr($this->mobile,0,5);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => $hashedPassword
        ]);
        $user->assignRole('user');
        Mail::to($this->email)->send(new ConfirmAccount($user));
        if($this->referral_code) {
            $user->referral_code = $referral_code;
            $user->save();
            $refer_by_user = User::where('referral_code', $this->referral_code)->first();
            $referralBenefit = ReferralBenefit::all()->first();
            $referralTransaction = ReferralTransaction::create([
                'user_id' => $user->id, 
                'refer_by_id' => $refer_by_user->id,
                'fi_download_limit' => $referralBenefit->fi_download_limit
            ]);


            $userPlan = UserPlan::where('expiry_date', '>', now())->where('user_id', $refer_by_user->id)->first();
            if ($userPlan) {
                $usagePlan = $userPlan->usage_plan;
                $usagePlan->fi_downloads = $usagePlan->fi_downloads + $referralBenefit->fi_download_limit;
                $usagePlan->save();
                $referralTransaction->status = 1;
                $referralTransaction->save();
                
                PlanUsageTransaction::create([
                    'user_id' => $refer_by_user->id,
                    'type' => Enum::PLAN_USAGE_TRANSACTION_TYPE,
                    'value' => $referralBenefit->fi_download_limit,
                    'description' => Enum::PLAN_USAGE_TRANSACTION_DESCRIPTION
                ]);
            }
        }

        return redirect()->route('login')->with('message', "Please confirm your email address,<br/>we have sent you an email.");

        $this->reset(['name', 'email', 'mobile', 'password', 'confirm_password']);
    }
}
