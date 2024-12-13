<?php

namespace App\Http\Middleware;

use App\Models\PasswordResetToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePasswordResetTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $passwordReset = PasswordResetToken::where('token', $request->route('token'))->first();
        if (is_null($passwordReset)) {
            return redirect()->route('home')->with('error', "Password reset token doesn't exist");
        }

        if (!empty($passwordReset) && $passwordReset->isExpired()) {
            $passwordReset->delete();
            return redirect()->route('home')->with('error', 'Password reset token has expired, ask for a new one.');
        }

        return $next($request);
    }
}
