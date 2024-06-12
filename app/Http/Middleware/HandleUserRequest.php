<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator; 
use Mtownsend\XmlToArray\XmlToArray;

class HandleUserRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function authorize()
    {
         return true;   
    }
    public function handle(Request $request, Closure $next): Response
    {
        $userPosted= XmlToArray::convert($request->getContent());
        // Log::debug($userPosted);
        return $next($userPosted);
       
    }
}
