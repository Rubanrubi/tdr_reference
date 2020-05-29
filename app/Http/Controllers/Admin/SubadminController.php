<?php

namespace App\Http\Controllers\admin;

use App\Model\Subadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Hash;

class SubadminController extends Controller
{

    public function __construct(Subadmin $subadmin)
    {
        $this->subadmin = $subadmin;

    }

    /**
     * show list of document types
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.subadmin.list');
    }


    public function subadminList(Request $request)
    {
        $query = $this->subadmin->where('status','!=',0);
        $status = isset($request->status)?$request->status:"";
        $query = $query->when($status!="",
            function($q) use( $status){
                return $q->where('status',$status);
            });

        if($request->sSearch!='')
        {
            $keyword = $request->sSearch;
            $query = $query->where(
                function($q) use($keyword){
                    return $q->where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('phone','like','%'.$keyword.'%')->orWhere('role','like','%'.$keyword.'%');
                });
        }

        $limit = $request->iDisplayLength;
        $offset = $request->iDisplayStart;
        $query = $query->when(($limit!='-1' && isset($offset)),
            function($q) use($limit, $offset){
                return $q->offset($offset)->limit($limit);
            });
        $data = $query->orderBy('id','desc')->get();
        $query = $this->subadmin->where('status','!=', 0);
        $query = $query->when($status!="",
            function($q) use( $status){
                return $q->where('status',$status);
            });
        if($request->sSearch!='')
        {
            $keyword = $request->sSearch;
            $query = $query->where(
                function($q) use($keyword){
                    return $q->where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('phone','like','%'.$keyword.'%')->orWhere('role','like','%'.$keyword.'%');
                });
        }
        $total_data = $query->count();
        $column=array();

        foreach ($data as $key => $value) {

            $action = '<a class="waves-effect waves-light indigo btn mb-1 mr-1" href="'.url('/').'/admin/subadmin/edit/'.$value->id.'">Edit</a>
                        <a class="waves-effect waves-light btn modal-trigger mb-1 mr-1" href="#updatestatus'.$value->id.'">';
            if($value->status==1)
                $action .= 'Deactive';
            else
                $action .= 'Active';

            $action .= '</a>';

            $action .= '<div id="updatestatus'.$value->id.'" class="modal">
                            <div class="modal-content">
                                <p>Are you sure want to ';
            if($value->status==1) $action .= 'Deactive';
            else $action .= 'Active';

            $action .= ' this subadmin: <b>'.$value->name.' </b>?</p>
                                <form method="POST" action="'. route('admin.subadmin.update-status') .'">
                                    <input type="hidden" name="id" value="'.$value->id.'">';
            if($value->status==1)
                $action .= '<input type="hidden" name="status" value="2">';
            else
                $action .= '<input type="hidden" name="status" value="1">';

            $action .= '<input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="row">
                                        <div class="col s12 display-flex justify-content-end form-action">
                                            <button type="submit" class="btn indigo waves-effect waves-light mr-1">Confirm
                                            </button>
                                            <button type="reset" class="modal-action modal-close btn btn-light-pink waves-effect waves-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>';

            if($value->status==1)
                $status = '<span class="badge green lighten-5 green-text text-accent-4">Active</span>';
            else
                $status = '<span class="badge pink lighten-5 pink-text text-accent-4">InActive</span>';

            $col['id'] = "";
            $col['name'] = $value->name;
            $col['email'] = $value->email;
            $col['phone'] = ($value->phone==null)?"-":$value->phone;
            $col['role'] = $value->role;
            $col['status'] = $status;
            $col['action'] = $action;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.subadmin.add');
    }

    /**
     * insert user data in to the table
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'email' => 'required|unique:users',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            if(empty($request->dashboard) && empty($request->document) && empty($request->causeofdeath) && empty($request->notifier) && empty($request->creditor) && empty($request->email_template) && empty($request->settings) && empty($request->user_type))
            {
                return back()->with('success','Give Permission to atleast one module!');
            }else
            {
                $this->subadmin->name = $request->name;
                $this->subadmin->email = $request->email;
                $this->subadmin->phone = $request->mobile;
                $this->subadmin->role = $request->role;
                $this->subadmin->password = Hash::make($request->password);
                $this->subadmin->original_password = $request->password;
                $this->subadmin->status = 1;
                $this->subadmin->dashboard = isset($request->dashboard)?implode(",",$request->dashboard):"";
                $this->subadmin->document_master = isset($request->document)?implode(",",$request->document):"";
                $this->subadmin->causeof_death = isset($request->causeofdeath)?implode(",",$request->causeofdeath):"";
                $this->subadmin->notifier_management = isset($request->notifier)?implode(",",$request->notifier):"";
                $this->subadmin->creditor_management = isset($request->creditor)?implode(",",$request->creditor):"";
                $this->subadmin->email_templates = isset($request->email_template)?implode(",",$request->email_template):"";
                $this->subadmin->user_type = isset($request->user_type)?implode(",",$request->user_type):"";
                $this->subadmin->save();
            }

            return redirect('admin/subadmin/list')->with('success', 'Subadmin added successfully!');
        }
    }

    /**
     * get user data and redirect to edit page
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $getUserData = $this->subadmin->find($id);

        return view('admin.subadmin.edit',['data'=>$getUserData]);
    }


    /**
     * update user profile data in to the table
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|unique:users,email,'.$request->id,
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            if(empty($request->dashboard) && empty($request->document) && empty($request->causeofdeath) && empty($request->notifier) && empty($request->creditor) && empty($request->email_template) && empty($request->settings) && empty($request->user_type))
            {
                return back()->with('success','Give Permission to atleast one module!');
            }else {

                $subadmin = $this->subadmin->find($request->id);
                $subadmin->name = $request->name;
                $subadmin->email = $request->email;
                $subadmin->phone = $request->mobile;
                $subadmin->role = $request->role;
                if ($request->password != "") {
                    $subadmin->password = Hash::make($request->password);
                    $subadmin->original_password = $request->password;
                }
                $subadmin->dashboard = isset($request->dashboard) ? implode(",", $request->dashboard) : "";
                $subadmin->document_master = isset($request->document) ? implode(",", $request->document) : "";
                $subadmin->causeof_death = isset($request->causeofdeath) ? implode(",", $request->causeofdeath) : "";
                $subadmin->notifier_management = isset($request->notifier) ? implode(",", $request->notifier) : "";
                $subadmin->creditor_management = isset($request->creditor) ? implode(",", $request->creditor) : "";
                $subadmin->email_templates = isset($request->email_template) ? implode(",", $request->email_template) : "";
                $subadmin->user_type = isset($request->user_type)?implode(",",$request->user_type):"";
                $subadmin->save();

                return redirect('admin/subadmin/list')->with('success', 'Subadmin updated successfully!');
            }
        }
    }



    /**
     * update active/inactive status of notifier
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request)
    {
        $user = $this->subadmin->find($request->id);
        $user->status = (int)$request->status;
        $user->save();

        return back()->with('success', 'Subadmin status updated successfully!');
    }
}
