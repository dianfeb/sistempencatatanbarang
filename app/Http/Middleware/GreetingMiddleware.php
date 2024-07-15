<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GreetingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $hour = Carbon::now()->format('H');
        $greeting = 'Selamat datang';

        if ($hour < 12) {
            $greeting = 'Selamat pagi';
        } elseif ($hour < 18) {
            $greeting = 'Selamat sore';
        } else {
            $greeting = 'Selamat malam';
        }

        $request->merge(['greeting' => $greeting]);

        return $next($request);
    }
}
