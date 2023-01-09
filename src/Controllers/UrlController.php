<?php

namespace AdGem\UrlShortener\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UrlController extends BaseController
{
    public function index()
    {
        $view = config('url_shortener.default_error_page', 'errors.404');

        if(view()->exists($view)){
            return view($view)->render();
        }
        return "Not Found";
    }
}
