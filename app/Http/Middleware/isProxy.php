<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class isProxy
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

        $data = Http::get("http://api.isproxyip.com/v1/check.php?key=DsoD1Oe8tbI9HMWK7i30AVyRegfQD73QUQdi5jOAhJgrcJi3xJ&ip=".\Request::ip()."&format=json");

        if($data['proxy'] == 1){
            return response()->json(["error" => "Por favor desligue o proxy para se conectar"]);
        }
        return $next($request);
    }
}
