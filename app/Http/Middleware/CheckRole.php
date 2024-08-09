<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole === 'admin' || in_array($userRole, $roles)) {
            return $next($request);
        }

        switch ($userRole) {
            case 'member':
                if (in_array('partner', $roles)) {
                    return response()->view('unauthorized_partner');
                } elseif (in_array('volunteer', $roles)) {
                    return response()->view('unauthorized_volunteer');
                } elseif (in_array('admin', $roles)) {
                    return response()->view('unauthorized');
                }
                break;
            case 'partner':
                if (in_array('member', $roles)) {
                    return response()->view('unauthorized_member');
                } elseif (in_array('volunteer', $roles)) {
                    return response()->view('unauthorized_volunteer');
                } elseif (in_array('admin', $roles)) {
                    return response()->view('unauthorized');
                }
                break;
            case 'volunteer':
                if (in_array('member', $roles)) {
                    return response()->view('unauthorized_member');
                } elseif (in_array('partner', $roles)) {
                    return response()->view('unauthorized_partner');
                } elseif (in_array('admin', $roles)) {
                    return response()->view('unauthorized');
                }
                break;
        }

        return response()->view('unauthorized');
    }
}
