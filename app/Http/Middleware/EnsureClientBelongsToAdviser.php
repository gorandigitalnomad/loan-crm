<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureClientBelongsToAdviser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        $client = $request->route('client');
        
        if ($client instanceof Client && $client->adviser_id !== auth()->id()) {
            abort(403, 'Unauthorized access to client.');
        }

        return $next($request);
    }
}