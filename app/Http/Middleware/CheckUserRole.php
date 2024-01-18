<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();
        // dd(in_array($user->role, $roles));
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }
        abort(403, 'HÀNH ĐỘNG TRÁI PHÉP BẠN KHÔNG CÓ QUYỀN TRUY CẬP VÀO ĐƯỜNG DẪN NÀY');
    }
}