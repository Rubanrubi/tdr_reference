@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit User</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">User</a>
                        </li>
                        <li class="breadcrumb-item active">Edit User
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="row">
                <div class="col l8 s12">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">Update Profile</h4>
                            <form class="row infovalidate" method="post" action="{{route('admin.notifier.update')}}">
                                @csrf
                                <input name="id" type="hidden" value="{{$data->id}}">
                                <div class="col s12">
                                    <div class="input-field col s12">
                                        <input name="name" id="first_name1" type="text" required class="validate" value="{{$data->name}}">
                                        <label for="first_name1" class="active">Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="email3" type="email" name="email" required class="validate" value="{{$data->email}}">
                                        <label for="email3">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="mobile" type="text" name="mobile" value="{{$data->phone}}">
                                        <label for="mobile">Mobile</label>
                                    </div>
                                </div>

                                <div class="col s12 display-flex justify-content-end mt-3">
                                    <button type="submit" class="btn indigo" style="margin-right: 5px">
                                        Save changes</button>
                                    <a href="{{route('admin.notifier.list')}}" class="btn btn-light">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col l4 s12">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">Update Password</h4>
                            <form class="row infovalidate" method="post" action="{{route('admin.notifier.update-password')}}">
                                @csrf
                                <input name="id" type="hidden" value="{{$data->id}}">
                                <div class="col s12">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="password" required class="validate" >
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="confirm_password" type="password" name="password_confirmation" required class="validate" >
                                        <label for="confirm_password">Confirm Password</label>
                                    </div>
                                </div>

                                <div class="col s12 display-flex justify-content-end mt-3">
                                    <button type="submit" class="btn indigo" style="margin-right: 5px">
                                        Save changes</button>
                                    <a href="{{route('admin.notifier.list')}}" class="btn btn-light">Cancel</a>
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
