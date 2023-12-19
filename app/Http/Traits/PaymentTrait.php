<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;
use App\Models\UserPlan;
use App\Models\Plan;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\UsagePlan;
use App\Models\ReferralTransaction;
use App\Models\ReferralBenefit;
use App\Models\PlanUsageTransaction;
use App\Enum\Enum;

/**
 * To make payment
 */
trait PaymentTrait
{
    public function createOrder($data)
    {
        // $data = [
        //     'user_id',
        //     'plan_id',
        //     'validity',
        //     'coupon_code',
        //     'info',
        //     'payment_method',
        //     'currency',
        // ];

        $plan = Plan::find($data['plan_id']);
        $amount = $plan->monthly_price;
        if ($data['validity'] == 'y') {
            $amount = $plan->yearly_price;
        }
        $tax = 0;
        $discount = 0;
        $coupon = Coupon::where('code', $data['coupon_code'])->first();
        $coupon_id = null;
        if ($coupon) {
            $coupon_id = $coupon->id;
            if ($coupon->type === 'percentage') {
                if ($data['validity'] == 'm') {
                    $discount = $plan->monthly_price * ($coupon->value / 100);
                } else {
                    $discount = $plan->yearly_price * ($coupon->value / 100) ;
                }
            } else {
                $discount = $coupon->value;
            }
        }
        $total_amount = $amount - $tax - $discount;
        $orderId = strtolower(Str::random(4).rand(111,999).Str::random(3));
        
        $referal_transaction_download = ReferralTransaction::where('status', 0)->where('refer_by_id', $data['user_id'])->sum('fi_download_limit');

        $plan = Plan::find($data['plan_id']);
        $fi_download_limit = $plan->fi_download_limit;

        if ($referal_transaction_download) {
            $referrralTransactions =ReferralTransaction::where('status', 0)->where('refer_by_id', $data['user_id'])->get();
            foreach ($referrralTransactions as $key => $referrralTransaction) {
                $referrralTransaction->status = 1;
                $referrralTransaction->save();
            }
            $fi_download_limit = $fi_download_limit + $referal_transaction_download;
            PlanUsageTransaction::create([
                'user_id' => $data['user_id'],
                'type' => Enum::PLAN_USAGE_TRANSACTION_TYPE,
                'value' => $referal_transaction_download,
                'description' => Enum::PLAN_USAGE_TRANSACTION_DESCRIPTION
            ]);
        }

        if ($data['user_id'] && $data['plan_id']) {
            $userPlans = UserPlan::where('user_id', $data['user_id'])->get();
            if ($userPlans) {
                foreach ($userPlans as $key => $userPlan) {
                    $usage_plan = $userPlan->usage_plan;
                    $userPlan->delete();
                    if ($usage_plan) {
                        $usage_plan->delete();
                    }
                }
            }
        }
        $usagePlan = UsagePlan::create([
            'fi_downloads' => $fi_download_limit
        ]);
        
        $UserPlan = UserPlan::create([
            'user_id' => $data['user_id'],
            'plan_id' => $data['plan_id'],
            'usage_plan_id' => $usagePlan->id,
            'expiry_date' => ($data['validity'] == 'm') ? now()->addMonth(1) : now()->addMonth(12)
        ]);

        $invoice = Invoice::create([
            'user_id' => $data['user_id'],
            'plan_id' => $plan->id,
            'amount' => $amount,
            'tax' => $tax,
            'total_amount' => $total_amount,
            'info' => $data['info'],
            'reference_id' => $orderId,
            'payment_method' => $data['payment_method'],
            'currency' => $data['currency'],
            'coupon_id' => $coupon_id,
            'status' => 'SUCCESS',
        ]);

        $response = [
            'usagePlan' => $usagePlan,
            'UserPlan' => $UserPlan,
            'invoice' => $invoice
        ];
        return $response;
    }
}
