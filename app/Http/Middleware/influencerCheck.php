<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class influencerCheck
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
        if ((Cookie::get('loggertype')) && (Cookie::get('loggertype')) == 'influencer') {
            $loggerUId = (Cookie::get('loggerUniqueId'));
            $profile_status = DB::table('vendor_profile')->where('vendor_user_id', $loggerUId)->count();
            $mints = (60 * 24 * 30);
            Cookie::queue('profile_status', $profile_status, $mints);
            return $next($request);
        } else {
            return redirect('/sign-in');
        }
    }
}
