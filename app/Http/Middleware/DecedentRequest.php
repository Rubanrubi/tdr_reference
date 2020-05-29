<?php

namespace App\Http\Middleware;

use Closure;

class DecedentRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$step)
    {
        switch ($step){
            case "TWO":
                if(!$request->session()->get('StepOne')){
                    \Log::info("session value".$request->session()->get("stepOne"));
                    return redirect()->route('step.one');
                }
                break;
            case "THREE":
                if(!$request->session()->get('StepTwo'))
                    return redirect()->route('step.two');
                break;
            case "FOUR":
                if(!$request->session()->get('StepThree'))
                    return redirect()->route('step.three');
                break;
        }
        return $next($request);
    }
}
