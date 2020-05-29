<?php

namespace App\Http\Controllers\admin;

use App\Model\Admin;
use App\Model\Settings;
use App\Model\EmailTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;
use Hash;

class SettingsController extends Controller
{
    protected $guardName = 'admin';
    protected $subGuardName = 'subadmin';

    public function __construct(EmailTemplate $email_templates)
    {
        $this->email_templates = $email_templates;
    }

    /**
     * get basic data for settings page
     *
     * @param
     *
     * @return view
     */
    public function index()
    {
        $get2fa = Settings::where('key','2fa_enable')->first();
        $twoFactorAuth = isset($get2fa->value)?$get2fa->value:0;

        $g = new \Google\Authenticator\GoogleAuthenticator();
        $secret = $g->generateSecret();
        $QR_Image = $g->getURL(config('app.name','TDR'), auth()->guard($this->guardName)->user()->email, $secret);

        $userData = Admin::where('id',auth()->guard($this->guardName)->user()->id)->first();
        $email = $userData->email;

        $getFax = Settings::where('key','fax_number')->first();
        $fax = isset($getFax->value)?$getFax->value:"";

        return view('admin.settings',['get2fa'=>$twoFactorAuth, 'QR_Image'=>$QR_Image, 'secret'=>$secret, 'email'=>$email, 'fax'=>$fax]);
    }

    /**
     * enable/disable google two factor auth
     *
     * @param object $request
     *
     * @return back
     */
    public function googleTwoFactorUpdate(Request $request)
    {
        $googletwofactor = ($request->googletwofactor==1)?$request->googletwofactor:0;
        if($googletwofactor==1)
        {
            $g = new \Google\Authenticator\GoogleAuthenticator();
            if($g->checkCode($request->secret, $request->otp))
            {
                $id = auth()->guard($this->guardName)->user()->id;
                Admin::where('id', $id)->update(['google2fa_secret'=>$request->secret]);

                $get2fa = Settings::where('key','2fa_enable')->first();
                if(isset($get2fa->value)){
                    Settings::where('key','2fa_enable')->update(['value'=>$googletwofactor]);
                }else{
                    $settings = new Settings();
                    $settings->key = '2fa_enable';
                    $settings->value = $googletwofactor;
                    $settings->save();
                }

                $message = __("Google 2FA Enabled");
            }else{
                $message = __('Entered OTP is wrong!');
            }
        }else
        {
            if($request->otp!="")
            {
                $message = __("Kindly Enable 2FA");
            }else
            {
                $get2fa = Settings::where('key','2fa_enable')->first();
                if(isset($get2fa->value)){
                    Settings::where('key','2fa_enable')->update(['value'=>$googletwofactor]);
                }else{
                    $settings = new Settings();
                    $settings->key = '2fa_enable';
                    $settings->value = $googletwofactor;
                    $settings->save();
                }

                $message = __("Google 2FA Disabled");
            }
        }

        return back()->with('success', $message);
    }


    /**
     * update password based on old password
     *
     * @param object $request
     *
     * @return back
     */
    public function postUpdatePassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'oldpassword' => 'required',
            'password' => 'confirmed|required|different:oldpassword',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $userData = Admin::where('id',auth()->guard($this->guardName)->user()->id)->first();
            //dd($request->oldpassword);
            if(Hash::check($request->oldpassword, $userData->password)){
                $userData->original_password = $request->password;
                $userData->password = Hash::make($request->password);
                $userData->save();

                return back()->with('success', 'Password updated successfully!');
             } else {
                 return back()->with('success','Old Password does not match!');
             }
        }
    }


    /**
     * update admin email after verify pasword
     *
     * @param object $request
     *
     * @return back
     */
    public function postUpdateEmail(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $userData = Admin::where('id',auth()->guard($this->guardName)->user()->id)->first();
            if(Hash::check($request->password, $userData->password)){
                $userData->email = $request->email;
                $userData->save();

                return back()->with('success', 'Email updated successfully!');
             } else {
                 return back()->with('success','Password verification failed!');
             }
        }
    }


    /**
     * update fax number to settings
     *
     * @param object $request
     *
     * @return back
     */
    public function postUpdateFax(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fax' => 'required',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $getFax = Settings::where('key','fax_number')->first();
            if(isset($getFax->value)){
                Settings::where('key','fax_number')->update(['value'=>$request->fax]);
            }else{
                $settings = new Settings();
                $settings->key = 'fax_number';
                $settings->value = $request->fax;
                $settings->save();
            }
            return back()->with('success', 'Fax number updated successfully!');
        }
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function emailTemplateList()
    {
        $templateList = $this->email_templates->get();
        return view('admin.email_template.list',['data'=> $templateList]);
    }



    public function emailTemplateUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subject' => 'required',
            'message' => 'required',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $email_templates = $this->email_templates->find($request->id);
            $email_templates->subject = $request->subject;
            $email_templates->body = $request->message;
            $email_templates->save();

            return redirect('admin/email-template/list')->with('success', 'Template updated successfully!');
        }
    }

    public function emailTemplateEdit($id)
    {
        $templateData = $this->email_templates->where('id',$id)->first();
        return view('admin.email_template.edit',['data'=> $templateData]);
    }
}
