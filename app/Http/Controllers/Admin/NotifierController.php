<?php

namespace App\Http\Controllers\admin;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Hash;

class NotifierController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    /**
     * show list of document types
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $getUsersList = $this->user->where('status','!=',0)->get();
        return view('admin.notifier.list',['data' => $getUsersList]);
    }


    public function notifierList(Request $request)
    {
        $query = $this->user->where('status','!=',0);
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
                    return $q->where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('phone','like','%'.$keyword.'%');
                });
        }

        $limit = $request->iDisplayLength;
        $offset = $request->iDisplayStart;
        $query = $query->when(($limit!='-1' && isset($offset)),
            function($q) use($limit, $offset){
                return $q->offset($offset)->limit($limit);
            });
        $data = $query->orderBy('id','desc')->get();
        $query = $this->user->where('status','!=', 0);
        $query = $query->when($status!="",
            function($q) use( $status){
                return $q->where('status',$status);
            });
        if($request->sSearch!='')
        {
            $keyword = $request->sSearch;
            $query = $query->where(
                function($q) use($keyword){
                    return $q->where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('phone','like','%'.$keyword.'%');
                });
        }
        $total_data = $query->get();
        $column=array();

        foreach ($data as $key => $value) {
            if (Auth::guard('subadmin')->check())
            {
                $user = Auth::guard('subadmin')->user();
                $notifier_management = explode(",",$user->notifier_management);
                $role = 2;
            }else
            {
                $role = 1;
                $notifier_management = array();
            }
            $action = "";
            if($role==2 && in_array(3,$notifier_management))
            {
                $action .= '<a class="waves-effect waves-light indigo btn mb-1 mr-1" href="'.url('/').'/admin/notifier/edit/'.$value->id.'">Edit</a>';
            }elseif ($role==1)
            {
                $action .= '<a class="waves-effect waves-light indigo btn mb-1 mr-1" href="'.url('/').'/admin/notifier/edit/'.$value->id.'">Edit</a>';
            }
            if($role==2 && in_array(4,$notifier_management))
            {
                $action .= '<a class="waves-effect waves-light btn modal-trigger mb-1 mr-1" href="#updatestatus'.$value->id.'">';
                if($value->status==1)
                    $action .= 'Deactive';
                else
                    $action .= 'Active';

                $action .= '</a>';
            }elseif ($role==1)
            {
                $action .= '<a class="waves-effect waves-light btn modal-trigger mb-1 mr-1" href="#updatestatus'.$value->id.'">';
                if($value->status==1)
                    $action .= 'Deactive';
                else
                    $action .= 'Active';

                $action .= '</a>';
            }

            $action .= '<div id="updatestatus'.$value->id.'" class="modal">
                            <div class="modal-content">
                                <p>Are you sure want to ';
            if($value->status==1) $action .= 'Deactive';
            else $action .= 'Active';

            $action .= ' this notifier: <b>'.$value->name.' </b>?</p>
                                <form method="POST" action="'. route('admin.notifier.update-status') .'">
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
            $col['status'] = $status;
            $col['action'] = $action;

            array_push($column, $col);
            $offset++;
        }
        $data['sEcho']=$request->sEcho;
        $data['aaData']=$column;
        $data['iTotalRecords']=count($total_data);
        $data['iTotalDisplayRecords']=count($total_data);

        return json_encode($data);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.notifier.add');
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
            'email' => 'required|unique:users',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $this->user->name = $request->name;
            $this->user->email = $request->email;
            $this->user->phone = $request->mobile;
            $this->user->password = Hash::make($request->password);
            $this->user->original_password = $request->password;
            $this->user->status = 1;
            $this->user->save();

            return redirect('admin/notifier/list')->with('success', 'Notifier added successfully!');
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
        $getUserData = $this->user->find($id);

        return view('admin.notifier.edit',['data'=>$getUserData]);
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
            'email' => 'required|unique:users,email,'.$request->id,
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $user = $this->user->find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->mobile;
            $user->save();

            return redirect('admin/notifier/list')->with('success', 'Notifier updated successfully!');
        }
    }


    /**
     * update user password data in to the table
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|confirmed',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $user = $this->user->find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->mobile;
            $user->password = Hash::make($request->password);
            $user->original_password = $request->password;
            $user->save();

            return redirect('admin/notifier/list')->with('success', 'Notifier password updated successfully!');
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
        $user = $this->user->find($request->id);
        $user->status = (int)$request->status;
        $user->save();

        return back()->with('success', 'Notifier status updated successfully!');
    }
}
