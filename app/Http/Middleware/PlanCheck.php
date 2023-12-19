<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PlanCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user->can('planCheck', $user)) {

            alert()->error('Sorry ',"You don't have active plan, buy a plan or renew.");
            return redirect()->route('home');
        }

        return $next($request);
    }
}
