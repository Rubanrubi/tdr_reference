<?php

namespace App\Http\Controllers\admin;

use App\Model\CauseofDeath;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Auth;

class CauseOfDeathController extends Controller
{

    public function __construct(CauseofDeath $cod)
    {
        $this->cod = $cod;
    }

    /**
     * show list of document types
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $getCodList = $this->cod->where('status',1)->get();
        return view('admin.causeofdeath.list',['data' => $getCodList]);
    }

    public function causeOfDeathlist(Request $request)
    {
        $query = $this->cod->where('status',1);

        if($request->sSearch!='')
        {
            $keyword = $request->sSearch;
            $query = $query->when($keyword!='',
                function($q) use($keyword){
                    return $q->where('cause_of_death','like','%'.$keyword.'%');
                });
        }
        $limit = $request->iDisplayLength;
        $offset = $request->iDisplayStart;
        $query = $query->when(($limit!='-1' && isset($offset)),
            function($q) use($limit, $offset){
                return $q->offset($offset)->limit($limit);
            });
        $data = $query->orderBy('id','desc')->get();
        $total_data =$this->cod->where('status',1)->get();
        $column=array();

        foreach ($data as $key => $value) {
            $cod_name="";
            if(old('cause_of_death'))
            {
                $cod_name = old('cause_of_death');
            }
            else
            {
                $cod_name = $value->cause_of_death;
            }
            if (Auth::guard('subadmin')->check())
            {
                $user = Auth::guard('subadmin')->user();
                $causeof_death = explode(",",$user->causeof_death);
                $role = 2;
            }else
            {
                $role = 1;
                $causeof_death = array();
            }
            $action = "";
            if($role==2 && in_array(4,$causeof_death))
            {
                $action .= '<a class="waves-effect waves-light btn modal-trigger mb-1 mr-1" href="#deletemodal'.$value->id.'">Delete</a>';
            }elseif ($role==1)
            {
                $action .= '<a class="waves-effect waves-light btn modal-trigger mb-1 mr-1" href="#deletemodal'.$value->id.'">Delete</a>';
            }
            if($role==2 && in_array(3,$causeof_death))
            {
                $action .= '<a class="waves-effect waves-light btn indigo modal-trigger mb-1 mr-1" href="#editmodal' . $value->id . '">Edit</a>';
            }elseif ($role==1)
            {
                $action .= '<a class="waves-effect waves-light btn indigo modal-trigger mb-1 mr-1" href="#editmodal' . $value->id . '">Edit</a>';
            }

            $action .= '<div id="editmodal'.$value->id.'" class="modal">
                            <div class="modal-content">
                                <h5>Edit Cause of Death Type</h5>
                                <form method="POST" action="'. route("admin.cod.update") .'">
                                    <input type="hidden" name="id" value="'.$value->id.'">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <div class="row margin">
                                        <div class="input-field col s12">
                                            <input id="cod_name" autofocus name="cause_of_death" value="'. $cod_name .'" required type="text">
                                            <label for="cod_name" class="center-align active">'. __('Cause of Death Name') .'</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s12 display-flex justify-content-end form-action">
                                            <button type="submit" class="btn indigo waves-effect waves-light mr-1">Save changes</button>
                                            <button type="reset" class="modal-action modal-close btn btn-light-pink waves-effect waves-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="deletemodal'.$value->id.'" class="modal">
                            <div class="modal-content">
                                <p>Are you sure want to delete this document: <b>'.$value->cause_of_death.' </b>?</p>
                                <form method="POST" action="'. route('admin.cod.delete') .'">
                                    <input type="hidden" name="id" value="'.$value->id.'">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
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

            $col['name']=$value->cause_of_death;
            $col['action']=$action;

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
     * Add document type to the table
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'cause_of_death' => 'required|unique:causeof_deaths',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $this->cod->cause_of_death = $request->cause_of_death;
            $this->cod->status =1;
            $this->cod->save();

            return back()->with('success', 'CauseofDeath added successfully!');
        }
    }


    /**
     * Update document type to the table
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'cause_of_death' => 'required|unique:causeof_deaths,cause_of_death,'.$request->id,
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $cod = $this->cod->find($request->id);
            $cod->cause_of_death = $request->cause_of_death;
            $cod->save();

            return back()->with('success', 'CauseofDeath updated successfully!');
        }
    }


    public function delete(Request $request)
    {
        $cod = $this->cod->find($request->id);
        $cod->status = 0;
        $cod->save();

        return back()->with('success', 'CauseofDeath deleted successfully!');
    }
}
