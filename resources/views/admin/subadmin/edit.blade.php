@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Subadmin</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Subadmin</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Subadmin
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <form class="row infovalidate" method="post" action="{{route('admin.subadmin.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="col s12">
                                <div class="input-field col s12">
                                    <input name="name" id="first_name1" type="text" value="{{$data->name}}" required class="validate">
                                    <label for="first_name1" class="active">Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="email3" type="email" name="email" value="{{$data->email}}" required class="validate">
                                    <label for="email3">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="mobile" type="text" name="mobile" value="{{$data->phone}}" required class="validate">
                                    <label for="mobile">Mobile</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="role" type="text" name="role" value="{{$data->role}}" required class="validate">
                                    <label for="role">Role</label>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field col s11">
                                    <input id="password" type="password" name="password" >
                                    <label for="password">Password</label>
                                </div>
                                <div class="input-field col s1">
                                    <a id="view_password" href="javascript:;"><i class="material-icons prefix pt-2">visibility</i></a>
                                    <a id="hide_password" style="display: none;" href="javascript:;"><i class="material-icons prefix pt-2">visibility_off</i></a>
                                </div>
                            </div>
                            <div class="col s12 ">
                                <table class="responsive-table mt-1">
                                    <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th>View</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Status Update/Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Dashboard</td>
                                        <td>
                                            @php
                                                if(!empty($data->dashboard))
                                                    $dashboard = explode(",",$data->dashboard);
                                                else
                                                    $dashboard = array();
                                            @endphp
                                            <label>
                                                <input type="checkbox" name="dashboard[]" value="1" @if(in_array(1,$dashboard)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Document Master</td>
                                        <td>
                                            @php
                                                if(!empty($data->document_master))
                                                    $document_master = explode(",",$data->document_master);
                                                else
                                                    $document_master = array();
                                            @endphp
                                            <label>
                                                <input type="checkbox" name="document[]" @if(in_array(1,$document_master)) checked @endif value="1"/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="document[]" value="2" @if(in_array(2,$document_master)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="document[]" value="3" @if(in_array(3,$document_master)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="document[]" value="4" @if(in_array(4,$document_master)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cause of Death</td>
                                        <td>
                                            @php
                                                if(!empty($data->causeof_death))
                                                    $causeof_death = explode(",",$data->causeof_death);
                                                else
                                                    $causeof_death = array();
                                            @endphp
                                            <label>
                                                <input type="checkbox" name="causeofdeath[]" value="1" @if(in_array(1,$causeof_death)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="causeofdeath[]" value="2" @if(in_array(2,$causeof_death)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="causeofdeath[]" value="3" @if(in_array(3,$causeof_death)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="causeofdeath[]" value="4" @if(in_array(4,$causeof_death)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Notifier Management</td>
                                        <td>
                                            @php
                                                if(!empty($data->notifier_management))
                                                    $notifier_management = explode(",",$data->notifier_management);
                                                else
                                                    $notifier_management = array();
                                            @endphp
                                            <label>
                                                <input type="checkbox" name="notifier[]" value="1" @if(in_array(1,$notifier_management)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="notifier[]" value="2" @if(in_array(2,$notifier_management)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="notifier[]" value="3" @if(in_array(3,$notifier_management)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="notifier[]" value="4" @if(in_array(4,$notifier_management)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Creditor Management</td>
                                        <td>
                                            @php
                                                if(!empty($data->creditor_management))
                                                    $creditor_management = explode(",",$data->creditor_management);
                                                else
                                                    $creditor_management = array();
                                            @endphp
                                            <label>
                                                <input type="checkbox" name="creditor[]" value="1" @if(in_array(1,$creditor_management)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="creditor[]" value="4" @if(in_array(4,$creditor_management)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email Templates</td>
                                        <td>
                                            @php
                                                if(!empty($data->email_templates))
                                                    $email_templates = explode(",",$data->email_templates);
                                                else
                                                    $email_templates = array();
                                            @endphp
                                            <label>
                                                <input type="checkbox" name="email_template[]" value="1" @if(in_array(1,$email_templates)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="email_template[]" value="3" @if(in_array(3,$email_templates)) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td></td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <td>Settings</td>--}}
{{--                                        <td>--}}
{{--                                            @php--}}
{{--                                                if(!empty($data->settings))--}}
{{--                                                    $settings = explode(",",$data->settings);--}}
{{--                                                else--}}
{{--                                                    $settings = array();--}}
{{--                                            @endphp--}}
{{--                                            <label>--}}
{{--                                                <input type="checkbox" name="settings[]" value="1" @if(in_array(1,$settings)) checked @endif/>--}}
{{--                                                <span></span>--}}
{{--                                            </label>--}}
{{--                                        </td>--}}
{{--                                        <td></td>--}}
{{--                                        <td>--}}
{{--                                            <label>--}}
{{--                                                <input type="checkbox" name="settings[]" value="3" @if(in_array(3,$settings)) checked @endif/>--}}
{{--                                                <span></span>--}}
{{--                                            </label>--}}
{{--                                        </td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s12 display-flex justify-content-end mt-3">
                                <button type="submit" class="btn indigo mr-1">
                                    Save changes</button>
                                <a href="{{route('admin.subadmin.list')}}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @endsection

        @section('script')
            <script>
                $("#view_password").click(function (e) {
                    $("#password").prop('type','text');
                    $("#hide_password").show();
                    $("#view_password").hide();
                });
                $("#hide_password").click(function (e) {
                    $("#password").prop('type','password');
                    $("#view_password").show();
                    $("#hide_password").hide();
                });
                    @if($errors->any())
                var toastHTML = '{{$errors->first()}}';
                M.toast({html: toastHTML});
                    @endif
                    @if (session('success'))
                var toastHTML = "{{session('success')}}";
                M.toast({html: toastHTML});
                @endif
            </script>
@endsection
