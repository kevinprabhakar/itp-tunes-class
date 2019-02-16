<?php

namespace App\Http\Middleware;

use Closure;
use App\Configuration;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $maintenanceMode = Configuration::where('name','maintenance')->first();
        if ($maintenanceMode->value == 'on')
        {
            return $next($request);
        }else{
            return redirect('/login');
        }

    }
}
