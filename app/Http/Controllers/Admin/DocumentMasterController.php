<?php

namespace App\Http\Controllers\admin;

use App\Model\DocumentType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;

class DocumentMasterController extends Controller
{

    public function __construct(DocumentType $document)
    {
        $this->document = $document;
        $this->weight = array(
            '1' => 'High',
            '2' => 'Medium',
            '3' => 'Low'
        );
    }

    /**
     * show list of document types
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $getDocumentList = $this->document->where('status',1)->get();
        return view('admin.document.list',['data' => $getDocumentList, 'weight'=>$this->weight]);
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
            'document_type' => 'required',
            'weight' => 'required',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $data = $this->document->where('document_type',$request->document_type)->where('status','!=',0)->first();
            if($data)
            {
                return back()->withInput()->withErrors("This document type is already taken!");
            }else
            {
                $this->document->document_type = $request->document_type;
                $this->document->weight = $request->weight;
                $this->document->status =1;
                $this->document->save();
            }

            return back()->with('success', 'Document added successfully!');
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
            'document_type' => 'required',
            'weight' => 'required',
        ]);
        if($validator->fails()) {
            $error_messages = implode(',',$validator->messages()->all());
            return back()->withInput()->withErrors($error_messages);
        }else
        {
            $data = $this->document->where('document_type',$request->document_type)->where('id','!=',$request->id)->where('status','!=',0)->first();
            if($data)
            {
                return back()->withInput()->withErrors("This document type is already taken!");
            }else {
                $document = $this->document->find($request->id);
                $document->document_type = $request->document_type;
                $document->weight = $request->weight;
                $document->save();
            }
            return back()->with('success', 'Document updated successfully!');
        }
    }


    public function delete(Request $request)
    {
        $document = $this->document->find($request->id);
        $document->status = 0;
        $document->save();

        return back()->with('success', 'Document deleted successfully!');
    }
}
