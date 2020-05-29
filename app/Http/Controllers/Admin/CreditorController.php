<?php

namespace App\Http\Controllers\admin;

use App\Model\Creditor;
use App\Model\CreditorsUser;
use App\Model\EmailTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;
use File;

class CreditorController extends Controller
{


    public function __construct(Creditor $creditor, CreditorsUser $creditorsUser)
    {
        $this->creditor = $creditor;
        $this->creditorsUser = $creditorsUser;
    }

    /**
     * list of creditors based on status
     *
     * @param $type
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($type)
    {
        return view('admin.creditor.list',['type'=>$type]);
    }


    /**
     * ajax for list data of creditors based on type
     *
     * @param Request $request
     *
     * @return false|string
     */
    public function creditorList(Request $request)
    {
        $type = $request->type;
        if($type=='registered')
        {
            $status = 0;
        }elseif($type=='approved')
        {
            $status = 1;
        }else
        {
            $status = 2;
        }
        $query = $this->creditor->where('status',$status);
        if($request->sSearch!='')
        {
            $keyword = $request->sSearch;
            $query = $query->when($keyword!='',
                function($q) use($keyword){
                    return $q->where('name','like','%'.$keyword.'%')->orWhere('main_contact_name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('main_contact_phone','like','%'.$keyword.'%')->orWhere('location','like','%'.$keyword.'%');
                });
        }
        $limit = $request->iDisplayLength;
        $offset = $request->iDisplayStart;
        $query = $query->when(($limit!='-1' && isset($offset)),
            function($q) use($limit, $offset){
                return $q->offset($offset)->limit($limit);
            });
        $data = $query->orderBy('id','desc')->get();
        $query = $this->creditor->where('status',$status);
        if($request->sSearch!='')
        {
            $keyword = $request->sSearch;
            $query = $query->when($keyword!='',
                function($q) use($keyword){
                    return $q->where('name','like','%'.$keyword.'%')->orWhere('main_contact_name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('main_contact_phone','like','%'.$keyword.'%')->orWhere('location','like','%'.$keyword.'%');
                });
        }
        $total_data = $query->count();
        $column=array();
        foreach ($data as $key => $value) {

            $primaryCreditor = $this->creditorsUser->with(['UserType'=> function($q){
                                        $q->where('is_primary',1);
                                }])->where('creditor_id',$value->id)->first();
            $action = '<a class="waves-effect waves-light btn mb-1 mr-1" href="'.url('/').'/admin/creditor/view-creditor/'.$value->id.'">View</a>';

            $col['creditor_name']=$value->name;
            $col['name'] = isset($primaryCreditor->user_name)?$primaryCreditor->user_name:"-";
            $col['email'] = isset($primaryCreditor->user_email)?$primaryCreditor->user_email:"-";
            $col['phone'] = isset($primaryCreditor->user_phone)?$primaryCreditor->user_phone:"-";
            $col['city']=$value->location;
            $col['action']=$action;

            array_push($column, $col);
            $offset++;
        }
        $data['sEcho']=$request->sEcho;
        $data['aaData']=$column;
        $data['iTotalRecords']=$total_data;
        $data['iTotalDisplayRecords']=$total_data;

        return json_encode($data);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailView($id)
    {
        $creditorData = $this->creditor->with('CreditorsUser.UserType')->find($id);
        return view('admin.creditor.view',['data'=>$creditorData]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reject($id)
    {
        $creditorData = $this->creditor->find($id);
        if($creditorData)
        {
            if($creditorData->status==0)
            {
                $creditorData->status = 2;
                $creditorData->save();
                return redirect('admin/creditor/list/rejected')->with('success','Creditor Rejected Successfully!');
            }else
            {
                return back()->with('success','Not able to update the status!');
            }
        }else
        {
            return back()->with('success','Not a valid user!');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function approve($id)
    {
        $creditorData = $this->creditor->with('CreditorsUser.UserType')->find($id);
        if($creditorData)
        {
            $creditorId = rand(10,99999999);
            return view('admin.creditor.approve',['data'=>$creditorData,'creditorId'=>$creditorId]);
        }else
        {
            return back()->with('success','Not a valid user!');
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateApprove(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'profile_picture' => 'required',
        ],['profile_picture.required' => 'Kindly Upload Creditor Logo!']);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else {
            $name = "";
            if ($request->hasFile('profile_picture')) {
                $image = $request->file('profile_picture');
                $name = date("Y-m-d") . "-" . time() . '.' . $image->getClientOriginalExtension();
                $folder_path = '/uploads/creditors';
                $destinationPath = public_path($folder_path);
                $image->move($destinationPath, $name);
            }
            $creditor = $this->creditor->find($request->id);
            $creditor->creditor_id = $request->creditor_id;
            $creditor->profile_picture = $name;
            $creditor->status = 1;
            $creditor->save();

            $credentialHtml = "<table>";
            $credentialHtml .= "<tr>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>";
            foreach ($request->username as $key => $value) {
                $creditor_user = CreditorsUser::with('UserType')->find($key);
                $creditor_user->status = 1;
                $creditor_user->username = $value;
                $creditor_user->password = Hash::make($request->password[$key]);
                $creditor_user->original_password = $request->password[$key];
                $creditor_user->save();
                $credentialHtml .= "<tr>
                            <td>" . $creditor_user->user_name . "</td>
                            <td>" . $creditor_user->UserType->user_type . "</td>
                            <td>" . $value . "</td>
                            <td>" . $request->password[$key] . "</td>
                        </tr>";
            }
            $credentialHtml .= "</table>";

            $template = EmailTemplate::where('type', 'creditor_registration')->first();
            $messages = $template->body;
            $replacements = array(
                ':NAME' => $creditor->name,
                ':CREDITOR_ID ' => $request->creditor_id,
                ':CREDENTIALS' => $credentialHtml,
                ':BASE_URL' => url('/')
            );
            $message = str_replace(array_keys($replacements), $replacements, $messages);

            $details = [
                'subject' => $template->subject,
                'message' => $message
            ];
            if(isset($request->primary_email) && $request->primary_email!='')
                \Mail::to($request->primary_email)->send(new \App\Mail\CreditorWelcomeMail($details));

            //make directory for creditor
            $path = public_path().'/uploads/decedent_request/' . $request->creditor_id;
            File::makeDirectory($path, $mode = 0777, true, true);

            return redirect('admin/creditor/list/approved')->with('success', 'Creditor approved successfully!');
        }
    }

    public function sendCredentials($id)
    {
        $creditor = $this->creditor->with('CreditorsUser.UserType')->find($id);
        $template = EmailTemplate::where('type','creditor_registration')->first();
        $messages = $template->body;
        $credentialHtml = "<table>";
        $credentialHtml .= "<tr>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>";
        foreach($creditor->CreditorsUser as $value) {
            if($value->UserType->is_primary==1)
            {
                $primary_email = $value->user_email;
            }
            $credentialHtml .= "<tr>
                            <td>".$value->user_name."</td>
                            <td>".$value->UserType->user_type."</td>
                            <td>".$value->username."</td>
                            <td>".$value->original_password."</td>
                        </tr>";
        }
        $credentialHtml .= "</table>";
        $replacements = array(
            ':NAME' => $creditor->name,
            ':CREDITOR_ID ' => $creditor->creditor_id,
            ':CREDENTIALS' => $credentialHtml,
            ':BASE_URL' => url('/')
        );
        $message = str_replace(array_keys($replacements), $replacements, $messages);

        $details = [
            'subject' => $template->subject,
            'message' => $message
        ];
        if(isset($primary_email))
            \Mail::to($primary_email)->send(new \App\Mail\CreditorWelcomeMail($details));

        return redirect('admin/creditor/list/approved')->with('success', 'Credentials sent by email successfully!');
    }
}
