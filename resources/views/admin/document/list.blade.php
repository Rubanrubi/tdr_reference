@extends('admin.layouts.app')

@section('content')
@php
    if (Auth::guard('subadmin')->check())
    {
        $user = Auth::guard('subadmin')->user();
        $document_master = explode(",",$user->document_master);
        $role = 2;
    }else
    {
        $role = 1;
        $document_master = array();
    }
@endphp
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Document Master</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Document List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
                <!-- DataTables example -->
                <div class="row">
                    <div class="col s12 m12 l12">
                    <div id="button-trigger" class="card card card-default scrollspy">
                        <div class="card-content">
                        <h4 class="card-title">Document List <a class="waves-effect waves-light btn indigo right modal-trigger" href="#addmodal" @if($role==2 && !in_array(2,$document_master)) style="display: none" @endif><i class="material-icons left">add</i> Add Document</a></h4>
                        <br>
                        <div class="row">
                            <div class="col s12">
                            <table id="page-length-option" class="display">
                                <thead>
                                <tr>
                                    <th>Document Type</th>
                                    <th>Weightage</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $value)
                                <tr>
                                    <td>{{$value->document_type}}</td>
                                    <td>
                                        @if($value->weight==1) High
                                        @elseif($value->weight==2) Medium
                                        @else Low
                                        @endif
                                    </td>
                                    <td>
                                        <a class="waves-effect waves-light btn modal-trigger mb-1 mr-1" href="#deletemodal{{$value->id}}" @if($role==2 && !in_array(4,$document_master)) style="display: none" @endif>Delete</a>
                                        <a class="waves-effect waves-light btn indigo modal-trigger mb-1 mr-1" href="#editmodal{{$value->id}}" @if($role==2 && !in_array(3,$document_master)) style="display: none" @endif>Edit</a>
                                        <div id="editmodal{{$value->id}}" class="modal">
                                            <div class="modal-content">
                                                <h5>Add Document Master</h5>
                                                <form method="POST" action="{{ route('admin.document.update') }}">
                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                    @csrf
                                                    @php
                                                        $document_type="";
                                                        if(old('document_type'))
                                                        {
                                                            $document_type = old('document_type');
                                                        }
                                                        else
                                                        {
                                                            $document_type = $value->document_type;
                                                        }
                                                    @endphp
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <input id="document_type" name="document_type" value="{{ $document_type }}" required type="text">
                                                            <label for="document_type" class="center-align">{{ __('Document Type') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row margin">
                                                        <div class="input-field col s12">
                                                            <select id="weight" name="weight" required>
                                                                @foreach($weight as $key=>$val)
                                                                    <option value="{{$key}}" @if($key==$value->weight) selected @endif>{{$val}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="password">{{ __('Weightage') }}</label>
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

                                        <div id="deletemodal{{$value->id}}" class="modal">
                                            <div class="modal-content">
                                                <p>Are you sure want to delete this document: <b>{{$value->document_type}} </b>?</p>
                                                <form method="POST" action="{{ route('admin.document.delete') }}">
                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col s12 display-flex justify-content-end form-action">
                                                            <button type="submit" class="btn indigo waves-effect waves-light mr-1">Confirm
                                                            </button>
                                                            <button type="reset" class="modal-action modal-close btn btn-light-pink waves-effect waves-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="addmodal" class="modal">
                    <div class="modal-content">
                        <h5>Add Document Master</h5>
                        <form method="POST" action="{{ route('admin.document.add') }}">
                            @csrf
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <input id="document_type" name="document_type" value="{{ old('document_type') }}" required type="text">
                                    <label for="document_type" class="center-align">{{ __('Document Type') }}</label>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <select id="weight" name="weight" required>
                                        @foreach($weight as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <label for="password">{{ __('Weightage') }}</label>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        @if($errors->any())
            var toastHTML = '{{$errors->first()}}';
            M.toast({html: toastHTML});
        @endif
        @if(Session::has('success'))
            var toastHTML = "{{Session::get('success')}}";
            M.toast({html: toastHTML});
        @endif

    </script>
@endsection
