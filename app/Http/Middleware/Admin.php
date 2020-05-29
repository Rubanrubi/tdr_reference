<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }
        if (Auth::guard('subadmin')->check()) {
            $user = Auth::guard('subadmin')->user();
            $dashboard = explode(",",$user->dashboard);
            $document_master = explode(",",$user->document_master);
            $causeof_death = explode(",",$user->causeof_death);
            $notifier_management = explode(",",$user->notifier_management);
            $creditor_management = explode(",",$user->creditor_management);
            $email_templates = explode(",",$user->email_templates);
//            $settings = explode(",",$user->settings);

            if($request->getPathInfo()=='/admin/dashboard')
            {
                if(in_array(1,$dashboard))
                {
                    return $next($request);
                }
                else if(in_array(1,$document_master)||in_array(2,$document_master)||in_array(3,$document_master)||in_array(4,$document_master))
                {
                    return redirect('/admin/document/list');
                }
                else if(in_array(1,$causeof_death)||in_array(2,$causeof_death)||in_array(3,$causeof_death)||in_array(4,$causeof_death))
                {
                    return redirect('/admin/cod/list');
                }
                else if(in_array(1,$notifier_management)||in_array(2,$notifier_management)||in_array(3,$notifier_management)||in_array(4,$notifier_management))
                {
                    return redirect('/admin/notifier/list');
                }
                else if(in_array(1,$creditor_management)||in_array(4,$creditor_management))
                {
                    return redirect('/admin/creditor/list');
                }
                else if(in_array(1,$email_templates)||in_array(3,$email_templates))
                {
                    return redirect('/admin/email-template/list');
                }
                else
                {
                    return redirect('admin/unauthorised');
                }
            }
            return $next($request);
        }

        return redirect('admin/login');
    }
}
