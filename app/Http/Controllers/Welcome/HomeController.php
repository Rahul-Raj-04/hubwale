<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ECommercePermission;
use App\Models\ECommerceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use App\Models\EmailVerification;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $freeTrial = Plan::where('monthly_price', 0)->where('yearly_price', 0)->first();

        return view('welcome.home')->with(compact('plans', 'freeTrial'));
    }

    public function dashboard()
    {
        if (!auth()->check()) {
            abort(403, 'Please login');
        }

        $stores = ECommercePermission::where(['user_id' => auth()->user()->id])->orWhere(['mobile' => auth()->user()->mobile])->get();
        return view('welcome.pages.dashboard')->with(compact('stores'));
    }

    public function verifyEmail($token)
    {
        $emailVerification = EmailVerification::where('token', $token)->first();
        if (!$emailVerification) {
            return abort(419);
        }

        $user = User::find($emailVerification->user_id);
        if (!$user) {
            return abort(419);
        }

        $user->email_verified_at = now();
        $user->save();

        $emailVerification->delete();
        return redirect()->route('login')->with('message', "Account verified successfully,<br> Please login using <b>".$user->email."</b>");

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
