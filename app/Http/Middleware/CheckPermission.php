<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        $user = auth()->user();
        $requiredPermissions =  ["show_User", "create_User", "edit_User", "delete_User", "show_product", "create_product", "edit_product", "delete_product", "show_Category", "create_Category", "edit_Category", "delete_Category"];
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && array_intersect($requiredPermissions, $userPermissions)) {
            return $next($request);
        } 
    
        abort(403, 'Unauthorized action.');
    }
}
      