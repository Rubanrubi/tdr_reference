@extends('admin.layouts.app')

@section('content')
    <style>
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin-left: auto;
            padding-top: .90rem;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 40px;
            z-index: 1;
            top: 60px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 30px;
            height: 30px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 8px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 82px;
            height: 82px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            margin-left: 5rem;
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .users-view .users-view-timeline {
            padding: 3rem !important;
        }
    </style>
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
                            <li class="breadcrumb-item active">Approve Creditor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container">
                <!-- users view start -->
                <div class="section users-view">
                    <form action="{{url('/')}}/admin/creditor/approve" method="post" enctype="multipart/form-data">
                        <!-- users view card details start -->
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12">
                                        <h6 class="mb-2 mt-2"><i class="material-icons">account_circle</i> Approve Creditor Registration Request</h6>
                                        <div class="row indigo lighten-5 border-radius-4 mb-2">
                                            <div class="col s12 m4 users-view-timeline">
                                                <h6 class="indigo-text m-0">Creditor ID: <span>{{$creditorId}}</span></h6>
                                                <input type="hidden" name="creditor_id" value="{{$creditorId}}">
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                @csrf
                                            </div>
                                        <div class="">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file" id="imageUpload" name="profile_picture" accept=".png, .jpg, .jpeg">
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg);">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <td>Suite:</td>
                                                    <td>{{$data->suite}}</td>
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
                                                    <td>City,State,Zip:</td>
                                                    <td>{{$data->location}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h6 class="mb-2 mt-2"><i class="material-icons">vpn_key</i> Create Credentials for the Primary User</h6>
                                        @foreach($data->CreditorsUser as $value)
                                            @if($value->UserType->is_primary == 1)
                                                <input type="hidden" name="primary_email" value="{{$value->user_email}}">
                                                <div class="row">
                                                    <table class="striped col s12 m6">
                                                        <tbody>
                                                        <tr>
                                                            <td>Primary Contact Name:</td>
                                                            <td>{{$value->user_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Primary Contact Title:</td>
                                                            <td>{{$value->user_title}}</td>
                                                        </tr>
                                                        @if($data->status==0)
                                                        <tr>
                                                            <td>Create Username for Primary Contact</td>
                                                            <td>
                                                                <div class="row margin">
                                                                    <div class="input-field col s12">
                                                                        <input name="username[{{$value->id}}]" id="creditor_username" type="text" required>
                                                                        <label for="creditor_username">{{ __('Username') }}</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                    <table class="striped col s12 m6">
                                                        <tbody>
                                                        <tr>
                                                            <td>Primary Contact Email:</td>
                                                            <td>{{$value->user_email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Primary Contact Phone:</td>
                                                            <td>{{$value->user_phone}}</td>
                                                        </tr>
                                                        @if($data->status==0)
                                                        <tr>
                                                            <td>Create Password</td>
                                                            <td>
                                                                <div class="row margin">
                                                                    <div class="input-field col s12">
                                                                        <input name="password[{{$value->id}}]" id="creditor_password" type="password" required>
                                                                        <label for="creditor_password">{{ __('Password') }}</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        @endforeach
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
                                        <h6 class="mb-2 mt-2"><i class="material-icons">vpn_key</i> Create Credentials for Additional users</h6>
                                        @php $i=1; @endphp
                                        @foreach($data->CreditorsUser as $value)
                                            @if($value->UserType->is_primary != 1)
                                            <input type="hidden" name="user_id{{$i}}" value="{{$value->id}}">
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
                                                    @if($data->status==0)
                                                    <tr>
                                                        <td>Create Username for User{{$i}}</td>
                                                        <td>
                                                            <div class="row margin">
                                                                <div class="input-field col s12">
                                                                    <input name="username[{{$value->id}}]" id="sub_username" type="text" required>
                                                                    <label for="sub_username">{{ __('Username') }}</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endif
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
                                                    @if($data->status==0)
                                                    <tr>
                                                        <td>Create Password for User{{$i}}</td>
                                                        <td>
                                                            <div class="row margin">
                                                                <div class="input-field col s12">
                                                                    <input name="password[{{$value->id}}]" id="sub_password" type="password" required>
                                                                    <label for="sub_password">{{ __('Password') }}</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                                @php $i++; @endphp
                                            </div>
                                            <hr>
                                            @endif
                                        @endforeach
                                        <h6>Note: The created credentials will be sent to the main user's Email</h6>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- users view card details ends -->

                        @if($data->status==0)
                            <div class="card-panel">
                                <div class="row">
                                    <div class="col s12 quick-action-btns display-flex justify-content-center align-items-center pt-2">
                                        <button type="submit" class="waves-effect waves-light btn indigo">Approve</button>
                                        <a href="{{url('/')}}/admin/creditor/reject/{{$data->id}}" class="waves-effect waves-light btn ">Reject</a>
                                        <a href="{{url('/')}}/admin/creditor/list/registered" class="btn btn-light-indigo">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/scripts/page-users.min.js')}}"></script>
    <script>
        @if($errors->any())
            var toastHTML = "{{$errors->first()}}";
            M.toast({html: toastHTML});
        @endif
        @if(Session::has('success'))
            var toastHTML = "{{Session::get('success')}}";
            M.toast({html: toastHTML});
        @endif
    </script>
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

    </script>
@endsection
