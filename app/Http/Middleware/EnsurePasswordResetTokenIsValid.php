<?php

namespace App\Http\Middleware;

use App\Services\PasswordResetService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EnsurePasswordResetTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $token): Response
    {
        (new PasswordResetService())->checkIfExistsByToken($token);

        return $next($request);
    }
}
