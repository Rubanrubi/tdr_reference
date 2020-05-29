@extends('admin.layouts.app')

@section('content')
    @php
        if (Auth::guard('subadmin')->check())
        {
            $user = Auth::guard('subadmin')->user();
            $creditor_management = explode(",",$user->creditor_management);
            $role = 2;
        }else
        {
            $role = 1;
            $creditor_management = array();
        }
    @endphp
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-users.min.css')}}">
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Creditor Management</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Creditors</a></li>
                            <li class="breadcrumb-item active">View Creditor Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container">
                <!-- users view start -->
                <div class="section users-view">
                    <!-- users view media object start -->
                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h6 class="mb-2 mt-2">
                                        <i class="material-icons">account_circle</i> PRE - on Board Creditor Member Registration
                                        @if($data->status==1)
                                            <a @if($role==2 && !in_array(4,$creditor_management)) style="display: none" @endif class="waves-effect waves-light btn indigo right modal-trigger" href="{{url('/')}}/admin/creditor/send-credentials/{{$data->id}}">Send Credentials</a>
                                        @endif
                                    </h6>
                                    <div class="row">
                                        <table class="striped col s12 m6">
                                            <tbody>
                                                <tr>
                                                    <td>Creditor Name:</td>
                                                    <td>{{$data->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Division Onboard:</td>
                                                    <td>{{$data->division_or_brand}}</td>
                                                </tr>
                                                <tr>
                                                    <td>City,State,Zip:</td>
                                                    <td>{{$data->location}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="striped col s12 m6">
                                            <tbody>
                                            <tr>
                                                <td>Address:</td>
                                                <td>{{$data->address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Suite:</td>
                                                <td>{{$data->suite}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view media object ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Additional User Details</h6>
                                    @php $i=1; @endphp
                                    @foreach($data->CreditorsUser as $value)
                                        <div class="row">
                                            <table class="striped col s12 m6">
                                                <tbody>
                                                <tr>
                                                    <td>User{{$i}} Name:</td>
                                                    <td>{{$value->user_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>User{{$i}} Title:</td>
                                                    <td>{{$value->user_title}}</td>
                                                </tr>
                                                <tr>
                                                    <td>User{{$i}} Type:</td>
                                                    <td>{{$value->UserType->user_type}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="striped col s12 m6">
                                                <tbody>
                                                <tr>
                                                    <td>User{{$i}} Phone:</td>
                                                    <td>{{$value->user_phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>User{{$i}} Email:</td>
                                                    <td>{{$value->user_email}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            @php $i++; @endphp
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h6 class="mb-2 mt-2"><i class="material-icons">dns</i> Customization Request</h6>
                                    <table class="responsive-table">
                                        <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Customization Type</th>
                                            <th>Answer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Confirmed Accounts</td>
                                            <td>@if($data->confirmed_accounts==1) Yes @else No @endif</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Data Transfer</td>
                                            <td>@if($data->data_transfer==1) Yes @else No @endif</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Data Sharing</td>
                                            <td>@if($data->data_sharing==1) Yes @else No @endif</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>White Label Web-Portal Invested</td>
                                            <td>@if($data->white_label_webportal==1) Yes @else No @endif</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($data->status==0)
                        <div class="card-panel" @if($role==2 && !in_array(4,$creditor_management)) style="display: none" @endif>
                            <div class="row">
                                <div class="col s12 quick-action-btns display-flex justify-content-center align-items-center pt-2">
                                    <a href="{{url('/')}}/admin/creditor/approve/{{$data->id}}" class="waves-effect waves-light btn indigo">Approve</a>
                                    <a href="{{url('/')}}/admin/creditor/reject/{{$data->id}}" class="waves-effect waves-light btn ">Reject</a>
                                    <a href="{{url('/')}}/admin/creditor/list/registered" class="btn btn-light-indigo">Cancel</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/scripts/page-users.min.js')}}"></script>
    @if($errors->any())
        var toastHTML = '{{$errors->first()}}';
        M.toast({html: toastHTML});
    @endif
    @if(Session::has('success'))
        var toastHTML = "{{Session::get('success')}}";
        M.toast({html: toastHTML});
    @endif
@endsection
