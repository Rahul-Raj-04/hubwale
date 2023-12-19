<?php

namespace App\Http\Controllers\Livewire\Common\Payment;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Plan;
use App\Models\Coupon;
use App\Models\User;
use App\Http\Traits\PaymentTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\ReferralTransaction;
use App\Models\PlanUsageTransaction;
use App\Models\ReferralBenefit;
use App\Enum\Enum;
use App\Models\UserPlan;

class Checkout extends Component
{
    use PaymentTrait, LivewireAlert;

    public $plan;
    public $validity;
    public $coupon_code;
    public $coupon;
    public $coupon_discount;
    public $total_amount;

    public $full_name;
    public $email;
    public $mobile;
    public $password;
    public $confirm_password;

    public $referral_code;

    public function mount($plan_id)
    {
        $this->validity = 'm';
        $this->plan = Plan::find($plan_id);

        if (auth()->user()) {
            
            $user = User::find(auth()->user()->id);
            $isUserPLan = UserPlan::where('user_id', $user->id)->first();
            if($isUserPLan) {
                alert()->warning('Alert','Your active plan will be removed, If you by another plan.');
            }
        }
    }

    public function render()
    {   
        return view('livewire.common.payment.checkout')->extends('livewire.common.payment.app');
    }

    public function changeValidity($v)
    {
        $this->validity = $v;
        $this->reset(['coupon', 'coupon_discount']);
        $this->coupon_discount = 0;
    }

    public function applyCoupon()
    {
        $this->validate(
            [
            'coupon_code' => ['required', 'exists:coupons,code']
            ],
            [
                'coupon_code.exists' => 'Please enter valid coupon code.',
                'coupon_code.required' => 'Please enter coupon code.'
            ]
        );
        
        $this->coupon = Coupon::where('code', $this->coupon_code)->first();
        if ($this->coupon->type === 'percentage') {
            if ($this->validity == 'm') {
                $this->coupon_discount = $this->plan->monthly_price * ($this->coupon->value / 100);
            } else {
                $this->coupon_discount = $this->plan->yearly_price * ($this->coupon->value / 100) ;
            }
        } else {
            $this->coupon_discount = $this->coupon->value;
        }
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
        $rules = [
            'full_name' => ['required','min:6','max:255'],
            'email' => ['required','email', 'unique:users'],
            'mobile' => ['required','numeric','digits:10', 'unique:users'],
            'password' => ['required','min:8','max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'confirm_password' => ['required','same:password'],
            'referral_code' => ['exists:users,referral_code']
        ];
        $message = [
            'referral_code.exists' => 'Please enter valid referral code.',
        ];

        $user = '';
        if (!auth()->user()) {
            $this->validate($rules, $message);
            $referral_code = rand(11111,99999).substr($this->mobile,0,5);
            $user = User::create([
                'name' => $this->full_name,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'password' => bcrypt('password'),
                'referral_code' => $referral_code
            ]);
            if($this->referral_code) {
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
        } else {
            $user = User::find(auth()->user()->id);
        }
        $data = [
            'user_id' => $user->id,
            'plan_id' => $this->plan->id,
            'validity' => $this->validity,
            'coupon_code' => $this->coupon_code,
            'info' => $this->plan->name." purchased.",
            'payment_method' => "DIRECT",
            'currency' => "INR",
        ];
        if ($this->validity == 'y'){
            $total_amount = $this->plan->yearly_price - $this->coupon_discount;
        }
        else {
            $total_amount = $this->plan->monthly_price - $this->coupon_discount;
        }

        if ($total_amount < 1) {
            $this->createOrder($data);
            $this->alert('success', 'Plan activated, redirecting to login page.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
                'onDismissed' => 'confirmed'
            ]);
        } else {
            //todo payment integration
        }
    }

    public function confirmed()
    {
        redirect()->route('main.dashboard');
    }

    public function getListeners()
    {
        return [
            'confirmed'
        ];
    }
}
