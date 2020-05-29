<?php

namespace App\Http\Controllers\Notifier;

use App\Http\Controllers\Controller;
use App\Http\Validators\Notifier\DecedentValidator;
use App\Model\Notifier\DecedentRequest;
use App\Model\Notifier\DecedentDraft;
use App\Model\Notifier\DecedentRequestDocumentDraft;
use App\Model\Notifier\DecedentRequestDocument;
use App\Model\DocumentType;
use App\Model\CauseofDeath;
use App\Repository\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use App\Model\Notifier\IdentityDraft;
use App\Model\Notifier\Identity;
use App\Model\Notifier\ParticipatingCreditorDraft;
use App\Model\Notifier\ParticipatingCreditor;
use App\Model\Notifier\DecedentRequestCreditorDraft;
use App\Model\Notifier\DecedentRequestCreditor;
use App\Model\Creditor;
use App\Model\Notifier\DecedentNewCreditorDraft;
use App\Model\Notifier\DecedentNewCreditor;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DecedentController extends Controller
{
    /**
     * _variables are instance of model
     */
    private $validator;
    private $_decedent_request;
    private $_decedent_draft;
    private $_identity_draft;
    private $_document_type;
    private $_causeof_death;
    private $_decedent_document_draft;
    private $_particiapting_creditor_draft;
    private $_decedent_request_creditor_draft;
    private $_decedent_new_creditor_draft;
    private $_decedent_request_document;
    private $_participating_creditors;
    private $_decedent_request_creditor;
    private $_decedent_new_creditor;
    private $_identity;

    /**
     * DecedentController constructor.
     * @param DecedentRequest $decedentRequest
     * @param DecedentDraft $decedentDraft
     * @param IdentityDraft $identityDraft
     */
    public function __construct(Identity $identity,DecedentNewCreditor $decedentNewCreditor,DecedentRequestCreditor $decedentRequestCreditor,ParticipatingCreditor $participatingCreditor, DecedentRequestDocument $decedentRequestDocument,DecedentNewCreditorDraft $decedentNewCreditorDraft,DecedentRequestCreditorDraft $decedentRequestCreditorDraft,ParticipatingCreditorDraft $particiaptingCreditorDraft, DecedentRequestDocumentDraft $decedentDocumentDraft, CauseofDeath $causeof_death, DocumentType $documentType,DecedentRequest $decedentRequest,DecedentDraft $decedentDraft,IdentityDraft $identityDraft)
    {
        $this->validator = new DecedentValidator();
        $this->_decedent_request = new BaseRepository($decedentRequest);
        $this->_decedent_draft = new BaseRepository($decedentDraft);
        $this->_identity_draft = new BaseRepository($identityDraft);
        $this->_document_type = new BaseRepository($documentType);
        $this->_causeof_death = new BaseRepository($causeof_death);
        $this->_decedent_document_draft = new BaseRepository($decedentDocumentDraft);
        $this->_particiapting_creditor_draft = new BaseRepository($particiaptingCreditorDraft);
        $this->_decedent_request_creditor_draft = new BaseRepository($decedentRequestCreditorDraft);
        $this->_decedent_new_creditor_draft = new BaseRepository($decedentNewCreditorDraft);
        $this->_decedent_request_document = new BaseRepository($decedentRequestDocument);
        $this->_participating_creditors = new BaseRepository($participatingCreditor);
        $this->_decedent_request_creditor = new BaseRepository($decedentRequestCreditor);
        $this->_decedent_new_creditor = new BaseRepository($decedentNewCreditor);
        $this->_identity = new BaseRepository($identity);
    }


    /**
     * @param Request $request
     * @return View
     */
    public function completedEstateAccount(Request $request)
    {
        $data = $this->_decedent_request->all();
        return view('notifier.completed-estate',compact('data'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function viewCompletedEstateAccount(Request $request){
        $data = $this->_decedent_draft->find($request->id);
        $documents = DecedentRequestDocumentDraft::where('request_id',$request->id)->get();
        return view('notifier.view-completed-estate',compact('data','documents'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $this->_decedent_draft->all();
        $documents = DecedentRequestDocumentDraft::where('request_id',$request->id)->get();
        return view('notifier.uncomplete-estate',compact('data','documents'));
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeDraft(Request $request)
    {
        if($request->id_type){
            for ($i=0;$i<sizeof($request->id_type);$i++)
            {
                $this->_identity_draft->create([
                    'request_id' => $request->id,
                    'id_type' => $request->id_type[$i],
                    'id_number' => $request->id_number[$i]
                ]);
            }
        }
        if($request->asset_type){
            for ($i=0;$i<sizeof($request->asset_type);$i++)
            {
                $this->_decedent_request_creditor_draft->create([
                    'request_id' => $request->id,
                    'creditor_id' => $request->creditor_id[$i],
                    'asset_type' => $request->asset_type[$i],
                    'account_number' => $request->account_number[$i]
                ]);
            }
        }
        if($request->creditor_name){
                $this->_decedent_new_creditor_draft->create([
                    'request_id' => $request->id,
                    'name' => $request->creditor_name[0],
                ]);
        }
        if($request->participating_creditors)
        {
            $getdata = ParticipatingCreditorDraft::where('request_id',$request->id)->get();
            if($getdata)
            {
                ParticipatingCreditorDraft::where('request_id',$request->id)->delete();
            }
            for ($i=0;$i<sizeof($request->participating_creditors);$i++) {
                $requestData = array(
                    'request_id' => $request->id,
                    'creditor_id' => $request->participating_creditors[$i]
                );
                $create = $this->_particiapting_creditor_draft->create($requestData);
            }
        }else{
            if($request->id)
            {
                $create = $this->_decedent_draft->update($request->all());
            }else{
                $create = $this->_decedent_draft->create($request->all());
            }
        }
        return response()->json($create);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stepOne(Request $request)
    {
        $id = $request->_id;
        $data = $identityData = "";
        if($id)
        {
            $data = $this->_decedent_draft->find($id);
            $identityData = IdentityDraft::where('request_id',$id)->get();
        }
        return view('notifier.decedent-request.step-one',['step' => 1, 'data'=>$data, 'identityData'=>$identityData]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stepTwo(Request $request)
    {
        $step = 2;
        $documents = $this->_document_type->all();
        $causeof_death = $this->_causeof_death->all();
        $data = $request->session()->get('StepOne');
        $id = $request->data;
        if($id)
        {
            $data = $this->_decedent_draft->find($id);
        }
        return view('notifier.decedent-request.step-two',compact('step','documents','data','causeof_death'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stepThree(Request $request)
    {
        $step = 3;
        $id = $request->data;
        $data = ($request->session()->get('StepTwo'))??$id;
        if($id)
        {
            $documentData = DecedentRequestDocumentDraft::where('request_id',$id)->get()->toArray();
        }
        return view('notifier.decedent-request.step-three',compact('step','data','documentData'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeStepOne(Request $request)
    {
        $validate = $this->validator->stepOne($request);
        if ($validate->fails()) {
            $error_messages = implode(',',$validate->errors()->all());
            return back()->withErrors($error_messages)->withInput();
        }
        if($request->id_type)
        {
            $check = 0;
            for ($i=0;$i<sizeof($request->id_type);$i++)
            {
                if($request->id_type[$i] == "") $check = 1;
                if($request->id_number[$i]=="") $check = 1;
            }
            if($check==1)
            {
                $error_messages = "Form of ID and ID no is required.";
                return back()->withErrors($error_messages)->withInput();
            }
        }
        if($request->id)
            $data = $this->_decedent_draft->update($request->all());
        else
            $data = $this->_decedent_draft->create($request->all());

        if($request->id_type){
            Identity::where('request_id', $request->id)->delete();
            for ($i=0;$i<sizeof($request->id_type);$i++)
            {
                $this->_identity_draft->create([
                    'request_id' => $request->id,
                    'id_type' => $request->id_type[$i],
                    'id_number' => $request->id_number[$i]
                ]);
            }
        }
        \session(['StepOne' => $data]);
        return redirect()->route('step.two',['data'=>$data]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeStepTwo(Request $request)
    {
        $validate = $this->validator->stepTwo($request);
        if ($validate->fails()) {
            $error_messages = implode(',',$validate->errors()->all());
            return back()->withErrors($error_messages)->withInput();
        }

        $data = $this->_decedent_draft->update($request->all());
        \session(['StepTwo' => $data]);

        return redirect()->route('step.three',['data'=>$data]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function storeStepThree(Request $request)
    {
        $data = $this->_decedent_draft->find($request->id);
        \session(['StepThree' => $data]);

        return redirect()->route('step.four',['data'=>$data]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function fileUpload(Request $request)
    {
        if(isset($request->type) && $request->type == 2){
            $filename = base_path()."/public/uploads/".$request->name;
            DecedentRequestDocumentDraft::where('document',$request->name)->delete();
            unlink($filename);
        }else {
            $validate = $this->validator->fileUpload($request);
            if ($validate->fails()) {
                return response()->json($validate->errors()->all());
            }

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $size = $image->getSize();
                $name = date("Y-m-d") . "-" . time() . '.' . $image->getClientOriginalExtension();
                $folder_path = '/uploads/' . date("Y-m-d");
                $destinationPath = public_path($folder_path);
                $image->move($destinationPath, $name);
                $requestData = array(
                    'request_id' => $request->request_id,
                    'document' => date("Y-m-d") . "/" . $name,
                    'size' => $size
                );
                $data = $this->_decedent_document_draft->create($requestData);
                $reqdata = $this->_decedent_draft->find($request->request_id);
                $reqdata->request_stage = 3;
                $reqdata->save();

                return response()->json(['status' => true, 'image' => date("Y-m-d") . "/" . $name]);
            }
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stepFour(Request $request)
    {
        $step = 4;
        $id = $request->data;
        $data = ($request->session()->get('StepThree'))??$id;
        $participantCreditors = $newCreditors = $creditorAssetList = "";
        $creditorAssetID = array();
        if($id)
        {
            $participantCreditors = ParticipatingCreditorDraft::where('request_id',$id)->pluck('creditor_id')->toArray();
            $participantCreditors = implode(',',$participantCreditors);
            $newCreditors = DecedentNewCreditorDraft::where('request_id', $id)->get();
            $creditorAssetList = DecedentRequestCreditorDraft::with('Creditors')->where('request_id', $id)->get();
            $creditorAssetID = DecedentRequestCreditorDraft::where('request_id', $id)->pluck('creditor_id')->toArray();
        }
        $creditorList = Creditor::where('status',1)->get();
        return view('notifier.decedent-request.step-four',compact('step','data','creditorList','participantCreditors','newCreditors','creditorAssetList','creditorAssetID'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeDecedentRequest(Request $request)
    {
        $draft_id = $request->id;
        $requestData = $this->_decedent_draft->find($draft_id)->toArray();
        $create = $this->_decedent_request->create($requestData);
        $id = $create->id;
        DecedentDraft::where('id',$draft_id)->delete();

        //identity data insert starts
        $identityUpdatedData = array();
        $identityData = IdentityDraft::where('request_id',$draft_id)->get()->toArray();
        foreach ($identityData as $identity){
            $identity['request_id'] = $id;
            $identityUpdatedData[] = $identity;
        }
        $this->_identity->create($identityUpdatedData);
        IdentityDraft::where('request_id',$draft_id)->delete();
        //identity data insert ends

        //creditor asset details insert starts
        $decedentCreditorUpdatedData = array();
        $decedentCreditorData = DecedentRequestCreditorDraft::where('request_id')->get()->toArray();
        foreach ($decedentCreditorData as $decedentCreditor){
            $decedentCreditor['request_id'] = $id;
            $decedentCreditorUpdatedData[] = $decedentCreditor;
        }
        $this->_decedent_request_creditor->create($decedentCreditorUpdatedData);
        DecedentRequestCreditorDraft::where('request_id',$draft_id)->delete();
        //creditor asset details insert ends

        //new creditor details insert starts
        $decedentNewCreditorUpdatedData = array();
        $decedentNewCreditorData = DecedentNewCreditorDraft::where('request_id')->get()->toArray();
        foreach ($decedentNewCreditorData as $decedentNewCreditor){
            $decedentNewCreditor['request_id'] = $id;
            $decedentNewCreditorUpdatedData[] = $decedentNewCreditor;
        }
        $this->_decedent_new_creditor->create($decedentNewCreditorUpdatedData);
        DecedentNewCreditorDraft::where('request_id',$draft_id)->delete();
        //new creditor details insert ends

        //decedent request document insert starts
        $decedentDocumentUpdatedData = array();
        $decedentDocumentData = DecedentRequestDocumentDraft::where('request_id')->get()->toArray();
        foreach ($decedentDocumentData as $decedentDocument){
            $decedentDocument['request_id'] = $id;
            $decedentDocumentUpdatedData[] = $decedentDocument;
        }
        $this->_decedent_request_document->create($decedentDocumentUpdatedData);
        DecedentRequestDocumentDraft::where('request_id',$draft_id)->delete();
        //decedent request document insert ends

        //participating creditors insert starts
        $participatingCreditorsUpdatedData = array();
        $particiaptingCreditorsData = ParticipatingCreditorDraft::where('request_id')->get()->toArray();
        foreach ($particiaptingCreditorsData as $participatingCreditors){
            $participatingCreditors['request_id'] = $id;
            $participatingCreditorsUpdatedData[] = $participatingCreditors;
        }
        $this->_participating_creditors->create($participatingCreditorsUpdatedData);
        ParticipatingCreditorDraft::where('request_id',$draft_id)->delete();
        //participating creditors insert ends

        return redirect()->route('decedent.request.complete')->with('success','Decedent Request created successfully!');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function decedentRequestComplete()
    {
        $step = 5;
        return view('notifier.decedent-request.complete',compact('step'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('notifier.profile',compact('data'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $validate = $this->validator->profile($request);
        if ($validate->fails()) {
            $error_messages = implode(',',$validate->errors()->all());
            return back()->withErrors($error_messages)->withInput();
        }
        $name="";
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $name = date("Y-m-d") . "-" . time() . '.' . $image->getClientOriginalExtension();
            $folder_path = '/uploads/notifier';
            $destinationPath = public_path($folder_path);
            $image->move($destinationPath, $name);

        }
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country_code = $request->country_code;
        if($name!=""){
            $user->profile_picture = $name;
        }
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }


    public function updatePassword(Request $request)
    {
        $validate = $this->validator->passwordUpdate($request);
        if ($validate->fails()) {
            $error_messages = implode(',',$validate->errors()->all());
            return back()->withErrors($error_messages)->withInput();
        }
        $user = User::find($request->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password),
                'original_password' => $request->password
            ])->save();

            return back()->with('success', 'Password updated successfully!');

        } else {
            return back()->with('error', 'Old password does not match!');
        }
    }
}
