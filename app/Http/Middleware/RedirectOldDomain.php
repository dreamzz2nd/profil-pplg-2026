<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectOldDomain
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
        $host = strtolower($request->header('host') ?? '');

        // Redirect domain lama atau subdomain www ke domain utama canonical
        $oldDomains = [
            'pplg-smkn1cirebon.sch.id',
            'www.pplg-smkn1cirebon.sch.id',
            'www.pplg.neperone.id',
        ];

        if (in_array($host, $oldDomains)) {
            $targetUrl = 'https://pplg.neperone.id' . $request->getRequestUri();
            return redirect()->to($targetUrl, 301);
        }

        return $next($request);
    }
}
