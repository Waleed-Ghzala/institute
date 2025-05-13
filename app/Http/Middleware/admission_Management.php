<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Applying_for_university_admission ;

class admission_Management
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user=auth()->user();
        if (!$user || !$user->hasRole('employee')) {
            return response()->json(['message' => 'Unauthorized'], 403);
                 }
                
                 $admission = Applying_for_university_admission::find($request->route('id'));
                 if (!$admission) {
                    return response()->json(['message' => 'Admission request not found'], 404);
                }
                $request->attributes->set('admission',$admission);

        return $next($request);
    }
}
