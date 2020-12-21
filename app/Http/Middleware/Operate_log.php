<?php

namespace App\Http\Middleware;

use App\Models\OperateLog;
use Closure;
use Illuminate\Http\Request;

class Operate_log
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

       OperateLog::query()->create([
           'user_id' => $request->user()->id,
           'username' => $request->user()->username,
           'uri' => $request->getUri(),
           'parameter' => http_build_query($request->except(['_token'])),
           'method' => $request->getMethod(),
       ]);

        return $next($request);
    }
}
