<?php

namespace App\Http\Controllers\Creditor;

use App\Model\Creditor;
use App\Model\UserType;
use App\Model\CreditorsUser;
use App\Model\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mail;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'creditor';
    protected $maxAttempts = 13;
    protected $decayMinutes = 2;

    protected $loginRoute;

    public function __construct(Creditor $creditor,UserType $usertype)
    {
        $this->middleware('guest:creditor')->except(['getLogin','postLogin','getRegister','postRegister']);
        $this->loginRoute = route('creditor.login');
        $this->redirectHome = route('creditor.dashboard');
        $this->creditor = $creditor;
        $this->usertype = $usertype;
    }

    /**
     * Goto login view page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('creditor.login');
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
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }


        $credential = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];


        if (Auth::guard($this->guardName)->attempt($credential)) {

            $request->session()->regenerate();
            $this->clearLoginAttempts($request);

            return redirect($this->redirectHome);
        } else {
            $this->incrementLoginAttempts($request);

            return back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }


    /**
     * go to register view page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister()
    {
        $user_types = $this->usertype->get();
        return view('creditor.register',compact('user_types'));
    }

        /**
     * Creditor Registration
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function postRegister(Request $request)
    {
    
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'location' => 'required',
            'address' => 'required',
            'confirmed_accounts' => 'required',
            'data_transfer' => 'required',
            'data_sharing' => 'required',
            'white_label_webportal' => 'required',

        ]);
         
        foreach($request->users as $user){
            $user_type = $this->usertype->where('id',$user['user_type'])->where('is_primary',1)->first();
        }

     
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }elseif($user_type != null)
        {

            $verification_code = str_random(6);
            $creditor_id = str_random(6);
            $this->creditor->name = $request->name;
            $this->creditor->email = $request->email;
            $this->creditor->creditor_id = $creditor_id;
            $this->creditor->location = $request->location;
            $this->creditor->address = $request->address;
            $this->creditor->suite = $request->suite;
            $this->creditor->division_or_brand = $request->division_or_brand;

            if($request->confirmed_accounts == 2){
                $this->creditor->confirmed_accounts = $request->is_other;
                $this->creditor->confirmed_accounts = 2;
            }else{
                $this->creditor->confirmed_accounts = 1;
            }
            
            $this->creditor->data_transfer = $request->data_transfer;
            $this->creditor->data_sharing = $request->data_sharing;
            $this->creditor->data_transfer = $request->data_transfer;
            $this->creditor->white_label_webportal = $request->white_label_webportal;
            $this->creditor->verification_code = $verification_code;
            $this->creditor->save();

            // Creditors User Information
           
            foreach ($request->users as $user) 
            {
                $creditors_user = new CreditorsUser;
                $creditors_user->creditor_id = $this->creditor->id;
                $creditors_user->user_name = $user['name'];
                $creditors_user->user_phone = $user['phone'];
                $creditors_user->user_title = $user['title'];
                $creditors_user->user_email = $user['email'];
                $creditors_user->user_type = $user['user_type'];
                $creditors_user->save();
            }

            return redirect('/creditor/welcome');
        }else{
            return back()->with('error','Please Choose Primary Usertype');
        }
    }

        /**
     * Welcome Screen When Creditor Register
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function welcome()
    {
        return view('creditor.welcome');
    }

        /**
     * Email Verification for creditor
     *
     * @param $token $creditor_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */

   
    public function emailVerification($token, $creditor_id)
    {
        $getCreditorData = $this->creditor->where('verification_code', $token)->where('creditor_id', $creditor_id)->first();
        if($getCreditorData)
        {
            $getCreditorData->verification_code = "";
            $getCreditorData->is_email_verified = 1;
            $getCreditorData->save();

            return redirect($this->loginRoute)->with('success', 'Email verification successfully done. Please login!');
        }else
        {
            return back()->with('success', 'Verification failed!');
        }
    }

     

}
