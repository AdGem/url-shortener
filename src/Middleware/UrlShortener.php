<?php

namespace AdGem\UrlShortener\Middleware;

use Closure;
use AdGem\UrlShortener\Shortener;

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

        if ($request->is("$default/*") and $request->short_id and $url = (new Shortener)->getUrl($request->short_id)) {
            return redirect()->to($url);
        }

        return $next($request);
    }
}
