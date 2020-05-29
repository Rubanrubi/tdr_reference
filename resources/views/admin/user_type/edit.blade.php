@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit UserType</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">User Type</a>
                            </li>
                            <li class="breadcrumb-item active">Edit UserType
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
                        <form class="row infovalidate" method="post" action="{{route('admin.user-type.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="col s12">
                                <div class="input-field col s12">
                                    <input name="user_type" id="user_type" type="text" value="{{$data->user_type}}" required class="validate">
                                    <label for="user_type" class="active">Name</label>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field col s4">
                                    <label class="active">Is this primary contact? </label>
                                </div>
                                <div class="input-field col s8">
                                    <p>
                                        <label>
                                            <input id="is_primary_true" type="radio" @if($data->is_primary==1) checked @endif value="1" name="is_primary" required class="validate">
                                            <span> Yes </span>
                                        </label>
                                        <label>
                                            <input id="is_primary_false" type="radio" @if($data->is_primary==0) checked @endif value="0" name="is_primary" required class="validate">
                                            <span> No </span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="col s12 ">
                                <table class="responsive-table mt-1">
                                    <thead>
                                    <tr>
                                        <th>Creditor Module Permission</th>
                                        <th>Access</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Data</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="data" value="1" @if($data->data_privilage==1) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Report</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="report" @if($data->report_privilage==1) checked @endif value="1"/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Search</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="search" value="1" @if($data->search_privilage==1) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Billing</td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="billing" value="1" @if($data->billing_privilage==1) checked @endif/>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s12 display-flex justify-content-end mt-3">
                                <button type="submit" class="btn indigo mr-1">
                                    Save changes</button>
                                <a href="{{route('admin.user-type.list')}}" class="btn btn-light">Cancel</a>
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
