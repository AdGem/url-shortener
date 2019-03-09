<?php

namespace QEDTeam\UrlShortener\Middleware;

use Closure;
use QEDTeam\UrlShortener\Url;

class UrlShortener
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
        $default = config('url_shortener.default_url_path');

        if ($request->is("$default/*") and $request->short_id and $url = Url::findByCode($request->short_id)) {
            return redirect($url->original_url);
        }

        return $next($request);
    }
}
