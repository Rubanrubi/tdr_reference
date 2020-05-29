@extends('admin.layouts.app')

@section('content')
    @php
        if (Auth::guard('subadmin')->check())
        {
            $user = Auth::guard('subadmin')->user();
            $email_templates = explode(",",$user->email_templates);
            $role = 2;
        }else
        {
            $role = 1;
            $email_templates = array();
        }
    @endphp
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Email Templates Management</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Email Templates</a></li>
                            <li class="breadcrumb-item active">Templates List</li>
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
{{--                                    <h4 class="card-title"> <a class="waves-effect waves-light btn indigo right" href="{{route('admin.email-template.add')}}"><i class="material-icons left">add</i> Add Template</a></h4>--}}
                                    <br>
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $value)
                                                        <tr>
                                                            <td>{{$value->type}}</td>
                                                            <td>{{$value->subject}}</td>
                                                            <td>{{ substr($value->body,0,30)}}</td>
                                                            <td>
                                                                <a @if($role==2 && !in_array(3,$email_templates)) style="display: none" @endif class="waves-effect waves-light btn indigo mb-1 mr-1" href="{{url('/')}}/admin/email-template/edit/{{$value->id}}">Edit</a>
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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @if($errors->any())
        var toastHTML = '{{$errors->first()}}';
        M.toast({html: toastHTML});
    @endif
    @if(Session::has('success'))
        var toastHTML = "{{Session::get('success')}}";
        M.toast({html: toastHTML});
    @endif
@endsection
