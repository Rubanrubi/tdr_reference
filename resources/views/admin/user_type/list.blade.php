@extends('admin.layouts.app')

@section('content')
@php
    if (Auth::guard('subadmin')->check())
    {
        $user = Auth::guard('subadmin')->user();
        $user_type = explode(",",$user->user_type);
        $role = 2;
    }else
    {
        $role = 1;
        $user_type = array();
    }
@endphp
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>User Type</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Type</li>
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
                        <h4 class="card-title">User Type <a href="{{route('admin.user-type.add')}}" class="waves-effect waves-light btn indigo right" @if($role==2 && !in_array(2,$user_type)) style="display: none" @endif><i class="material-icons left">add</i> Add UserType</a></h4>
                        <br>
                        <div class="row">
                            <div class="col s12">
                            <table id="page-length-option" class="display">
                                <thead>
                                <tr>
                                    <th>User Type</th>
                                    <th>Primary Contact</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $value)
                                <tr>
                                    <td>{{$value->user_type}}</td>
                                    <td>
                                        @if($value->is_primary==1) <span class="badge green lighten-5 green-text text-accent-4">True</span>
                                        @else <span class="badge pink lighten-5 pink-text text-accent-4">False</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="waves-effect waves-light btn mb-1 modal-trigger mr-1" href="#updatestatus{{$value->id}}" @if($role==2 && !in_array(4,$user_type)) style="display: none" @endif>Delete</a>
                                        <a class="waves-effect waves-light btn indigo mb-1 mr-1" href="{{url('/')}}/admin/user-type/edit/{{$value->id}}" @if($role==2 && !in_array(3,$user_type)) style="display: none" @endif>Edit</a>
                                    </td>
                                    <div id="updatestatus{{$value->id}}" class="modal">
                                        <div class="modal-content">
                                            <p>Are you sure want to @if($value->status==1) Deactive @else Active @endif this User Type: <b>{{$value->user_type}} </b>?</p>
                                            <form method="POST" action="{{route('admin.user-type.update-status')}}">
                                                <input type="hidden" name="id" value="{{$value->id}}">
                                                <input type="hidden" name="status" value="{{($value->status==1)?2:1}}">
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
