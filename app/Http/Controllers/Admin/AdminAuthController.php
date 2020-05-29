<?php

namespace App\Http\Controllers\admin;

use App\Model\Admin;
use App\Model\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mail;
use Validator;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'admin';
    protected $subGuardName = 'subadmin';
    protected $maxAttempts = 13;
    protected $decayMinutes = 2;

    protected $loginRoute;

    public function __construct()
    {
        $this->middleware('guest:admin')->except(['getLogin','postLogin']);
        $this->loginRoute = route('admin.login');
        $this->redirectHome = route('admin.dashboard');
        $this->redirectOtp = route('admin.otp');
    }


    /**
     * Goto login view page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.login');
    }


    /**
     * Logout form auth and redirect to login page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogout()
    {
        Auth::guard($this->guardName)->logout();
        Session::flush();
        return redirect($this->loginRoute);
    }


    /**
     * check login auth based on guard and redirect to appropriate page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }


        $credential = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        if (Auth::guard($this->guardName)->attempt($credential)) {

            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            //check if two factor auth is enabled
            $get2fa = Settings::where('key','2fa_enable')->first();
            if(isset($get2fa) && $get2fa->value==1)
            {
                return redirect($this->redirectOtp);
            }else{
                return redirect($this->redirectHome);
            }

        } else {
            if (Auth::guard($this->subGuardName)->attempt($credential)) {

                $request->session()->regenerate();
                $this->clearLoginAttempts($request);
//                //check if two factor auth is enabled
//                $get2fa = Settings::where('key','2fa_enable')->first();
//                if(isset($get2fa) && $get2fa->value==1)
//                {
//                    return redirect($this->redirectOtp);
//                }else{
//                    return redirect($this->redirectHome);
//                }
                return redirect($this->redirectHome);

            }else{
                $this->incrementLoginAttempts($request);

                return back()
                    ->withInput()
                    ->withErrors(["Incorrect user login details!"]);
            }
        }
    }


    /**
     * Goto otp page if 2fa enabled
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOtp()
    {
        return view('admin.otp');
    }


    /**
     * Validate the token of 2fa
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postValidateToken(Request $request)
    {
        $g = new \Google\Authenticator\GoogleAuthenticator();
        $secret = auth()->guard($this->guardName)->user()->google2fa_secret;
        $code = $request->otp;
        //dd($g->checkCode($secret, $code));
        if($g->checkCode($secret, $code))
        {
            return redirect($this->redirectHome);
        }else{
            return back()->with('error','Entered OTP is wrong!');
        }
    }

    public function unauthorisedPage()
    {
        return view('admin.errors.401');
    }

}
