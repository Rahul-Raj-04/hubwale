<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Plan;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PlanPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }   

    public function imageDownload(User $user)
    {
        if ($user->user_plan) {

            if ($user->user_plan->usage_plan->fi_downloads > 0){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function planCheck(User $user)
    {
        if ($user->user_plan) {

            return true;
        } else {
            return false;
        }
    }

    public function imageWatermark(User $user)
    {
        if ($user->user_plan->plan->fi_watermark){
            return true;
        } else {
            return abort(403, 'access denide');
        }
    }

    public function imageAdvertisement(User $user)
    {
        if ($user->user_plan->plan->fi_ad){
            return true;
        } else {
            return abort(403, 'access denide');
        }
    }
}
