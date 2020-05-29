<?php

namespace App\Http\Controllers\admin;

use App\Model\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Validation\Rule;

class UserTypeController extends Controller
{

    public function __construct(UserType $userType)
    {
        $this->userType = $userType;
    }

    /**
     * show list of document types
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $getUsertypeList = $this->userType->where('status',1)->get();
        return view('admin.user_type.list',['data' => $getUsertypeList]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.user_type.add');
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
        $user_type = $request->user_type;
        $validator = Validator::make($request->all(),[
            'user_type' => ['required', Rule::unique('user_types')->where(function($query) use($user_type){
                return $query->where('user_type',$user_type)->where('status',1);
            })],
            'is_primary' => 'required',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            if($request->data=="" && $request->search=="" && $request->report=="" && $request->billing=="")
            {
                return back()->with('success','Give Permission to atleast one module!');
            }else
            {
                $checkPrimary = $this->userType->where('is_primary',1)->where('status',1)->get();
                if(sizeof($checkPrimary)>0 && $request->is_primary==1)
                {
                    return back()->with('success','There must be only one Primary Contact UserType!');
                }
                $this->userType->user_type = $request->user_type;
                $this->userType->is_primary = (int)$request->is_primary;
                $this->userType->status = 1;
                $this->userType->data_privilage = isset($request->data)?$request->data:"";
                $this->userType->report_privilage = isset($request->report)?$request->report:"";
                $this->userType->search_privilage = isset($request->search)?$request->search:"";
                $this->userType->billing_privilage = isset($request->billing)?$request->billing:"";
                $this->userType->save();
            }

            return redirect('admin/user-type/list')->with('success', 'UserType added successfully!');
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
        $getUserTypeData = $this->userType->find($id);

        return view('admin.user_type.edit',['data'=>$getUserTypeData]);
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
        $user_type = $request->user_type;
        $id = $request->id;
        $validator = Validator::make($request->all(),[
            'is_primary' => 'required',
            'user_type' => ['required',Rule::unique('user_types')->where(function($query) use($user_type,$id){
                return $query->where('user_type',$user_type)->where('status',1)->where('id','!=',$id);
            })],
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            if($request->data=="" && $request->search=="" && $request->report=="" && $request->billing=="")
            {
                return back()->with('success','Give Permission to atleast one module!');
            }else {
                $checkPrimary = $this->userType->where('is_primary', 1)->where('id','!=',$request->id)->where('status',1)->get();
                if (sizeof($checkPrimary)>0 && $request->is_primary == 1) {
                    return back()->with('success', 'There must be only one Primary Contact UserType!');
                }
                $userType = $this->userType->find($request->id);
                $userType->user_type = $request->user_type;
                $userType->is_primary = (int)$request->is_primary;
                $userType->data_privilage = isset($request->data) ? $request->data : "";
                $userType->report_privilage = isset($request->report) ? $request->report : "";
                $userType->search_privilage = isset($request->search) ? $request->search : "";
                $userType->billing_privilage = isset($request->billing) ? $request->billing : "";
                $userType->save();

                return redirect('admin/user-type/list')->with('success', 'UserType updated successfully!');
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
        $user = $this->userType->find($request->id);
        if($user->is_primary==1 && $request->status=2)
        {
            return back()->with('success', 'Primary Contact could not delete!');
        }
        $user->status = (int)$request->status;
        $user->save();

        return back()->with('success', 'UserType status updated successfully!');
    }

}
