@extends('admin.layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-account-settings.min.css')}}">

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Account Settings</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </div>                              
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="container">
            <!-- Account settings -->
            <section class="tabs-vertical mt-1 section">
                <div class="row">
                    <div class="col l4 s12">
                        <!-- tabs  -->
                        <div class="card-panel">
                            <ul class="tabs">                            
                            <li class="tab">
                                <a href="#change-password">
                                <i class="material-icons">lock_open</i>
                                <span>Change Password</span>
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#info">
                                <i class="material-icons">email</i>
                                <span> Change Email</span>
                                </a>
                            </li>                            
                            <li class="tab">
                                <a href="#notifications">
                                <i class="material-icons">lock_open</i>
                                <span> Authentication</span>
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#fax">
                                <i class="material-icons">link</i>
                                <span> Update Fax</span>
                                </a>
                            </li>
                            <li class="indicator" style="left: 0px; right: 0px;"></li></ul>
                        </div>
                    </div>
                    <div class="col l8 s12">
                        <!-- tabs content -->
                        
                        <div id="change-password" class="active">
                            <div class="card-panel">
                            <form class="paaswordvalidate" id="paaswordvalidate" action="update-password" method="post" >
                                @csrf
                                <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                    <input id="oldpswd" name="oldpassword" type="password" required data-error=".errorTxt4">
                                    <label for="oldpswd">Old Password</label>
                                    <small class="errorTxt4"></small>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field">
                                    <input id="newpswd" name="password" id="newpassword" type="password" required data-error=".errorTxt5">
                                    <label for="newpswd">New Password</label>
                                    <small class="errorTxt5"></small>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field">
                                    <input id="repswd" type="password" name="password_confirmation" id="repassword" required data-error=".errorTxt6">
                                    <label for="repswd">Retype new Password</label>
                                    <small class="errorTxt6"></small>
                                    </div>
                                </div>
                                <div class="col s12 display-flex justify-content-end form-action">
                                    <button type="submit" id="updatePassword" class="btn indigo waves-effect waves-light mr-1">Save changes</button>
                                    <button type="reset" class="btn btn-light-pink waves-effect waves-light">Cancel</button>
                                </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div id="info" style="display: none;">
                            <div class="card-panel">
                            <form class="infovalidate" method="post" action="{{ route('admin.update-email') }}">
                                @csrf
                                <div class="row">                                                                                                                                                                
                                    <div class="col s12">
                                        <div class="input-field">
                                        <input id="web-link" type="email" name="email" value="{{$email}}" required class="validate">
                                        <label for="web-link">Email</label>
                                        </div>
                                    </div>  
                                    <div class="col s12">
                                        <div class="input-field">
                                        <input id="repswd" type="password" name="password" id="password" required data-error=".errorTxt6">
                                        <label for="repswd">Enter Password to verify</label>
                                        <small class="errorTxt6"></small>
                                        </div>
                                    </div>                                                              
                                    <div class="col s12 display-flex justify-content-end form-action">
                                        <button type="submit" class="btn indigo waves-effect waves-light mr-2">Save
                                        changes</button>
                                        <button type="button" class="btn btn-light-pink waves-effect waves-light ">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>                        
                        <div id="notifications" style="display: none;">
                            <div class="card-panel">
                                <form action="{{ route('admin.googletwofactor') }}" method="post" class="infovalidate">
                                    @csrf
                                    <div class="row">
                                        <h6 class="col s12 mb-2">Google 2FA</h6>
                                        <div class="col s12 mb-1">
                                            <div class="switch">
                                                <label>
                                                <input type="checkbox" name="googletwofactor" value="1" onchange="showQrCode(this)" @if($get2fa==1) checked @endif id="accountSwitch1">
                                                <span class="lever"></span>
                                                </label>
                                                <span class="switch-label w-100">Enable/Disable google two factor authentication</span>
                                            </div>
                                        </div>
                                        <div class="col s12 mb-1" @if($get2fa==1) style="display:none" @endif id="qrcode">
                                            <img src="{{$QR_Image}}" id="qrImage">
                                            <input type="hidden" name="secret" value="{{$secret}}">
                                        </div>
                                        <div class="col s12" @if($get2fa==1) style="display:none" @endif id="otpdiv">
                                            <div class="input-field">
                                            <input type="text" name="otp" id="otp" data-error=".errorTxt6">
                                            <label for="otp">Scan and Enter OTP</label>
                                            <small class="errorTxt6"></small>
                                            </div>
                                        </div>  
                                        <div class="col s12 display-flex justify-content-end form-action mt-2">
                                        <button type="submit" class="btn indigo waves-light waves-effect mr-sm-1 mr-2">Save
                                            changes</button>
                                        <button type="button" class="btn btn-light-pink waves-light waves-effect">Cancel</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                        </div>
                        <div id="fax" style="display: none;">
                            <div class="card-panel">
                            <form class="infovalidate" method="post" action="{{ route('admin.update-fax') }}">
                                @csrf
                                <div class="row">                                                                                                                                                                
                                    <div class="col s12">
                                        <div class="input-field">
                                        <input id="fax_number" type="text" name="fax" value="{{$fax}}" required class="validate">
                                        <label for="fax_number">Fax Number</label>
                                        </div>
                                    </div>                                                                                                  
                                    <div class="col s12 display-flex justify-content-end form-action">
                                        <button type="submit" class="btn indigo waves-effect waves-light mr-2">Save
                                        changes</button>
                                        <button type="button" class="btn btn-light-pink waves-effect waves-light ">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>        
        </div>
        <div class="content-overlay"></div>
    </div>
</div>

@endsection

@section('script')

    <script src="{{ asset('assets/js/scripts/page-account-settings.min.js')}}"></script>
    
    <script>
        
        function showQrCode(obj)
        {
            // if($(obj).is(":checked")){
            //     $("#qrcode").hide();
            // }
            //else{
                $("#qrcode").show();
                $("#otpdiv").show();
                if($(obj).is(":checked")){
                    $("#otp").prop('required', 'true');
                }else{
                    $("#otp").removeAttr('required');
                }
            //}
        }

        @if(Session::has('success'))
            var toastHTML = "{{Session::get('success')}}";
            M.toast({html: toastHTML});
        @endif

        @if($errors->any())
            var toastHTML = "{{$errors->first()}}";
            M.toast({html: toastHTML});
        @enderror
    </script>

@endsection