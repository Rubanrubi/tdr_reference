@extends('admin.layouts.app')

@section('content')
    @php
        if (Auth::guard('subadmin')->check())
        {
            $user = Auth::guard('subadmin')->user();
            $notifier_management = explode(",",$user->notifier_management);
            $role = 2;
        }else
        {
            $role = 1;
            $notifier_management = array();
        }
    @endphp
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-users.min.css') }}">
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Users List</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">User</a>
                            </li>
                            <li class="breadcrumb-item active">Users List
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <!-- users list start -->
                <section class="users-list-wrapper section">
                    <div class="users-list-filter">
                        <div class="card-panel">
                            <div class="row">
                                <form>
                                    <div class="col s12 m6 l3">
                                        <label for="users-list-status">Status</label>
                                        <div class="input-field">
                                            <select class="form-control" id="users-list-statuss">
                                                <option value="">Any</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l3 display-flex align-items-center show-btn">
                                        <button type="button" id="user_search" class="btn btn-block indigo waves-effect waves-light">Show</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="users-list-table">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title"><a @if($role==2 && !in_array(2,$notifier_management)) style="display: none" @endif class="waves-effect waves-light btn indigo right" href="{{route('admin.notifier.add')}}"><i class="material-icons left">add</i> Add Notifier</a></h4>
                                <br>
                                <!-- datatable start -->
                                <div class="responsive-table">
                                    <table id="users-list-datatable" class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- datatable ends -->
                            </div>
                        </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/scripts/page-users.min.js') }}"></script>
    <script>
        @if (session('success'))
            var toastHTML = "{{session('success')}}";
            M.toast({html: toastHTML});
        @endif


        $(document).ready(function() {
            $('#users-list-datatable').DataTable( {
                "processing": true,
                "serverSide": true,
                paging: true,
                "searching": true,
                "ordering": false,
                "info": true,
                "lengthChange": true,
                "bProcessing": true,
                "bServerSide": true,
                "destroy": true,
                "sAjaxSource": "notifier-list",

                columns: [
                    { data: "id" },
                    { data: "name" },
                    { data: "email" },
                    { data: "phone" },
                    { data: "status"},
                    { data: "action" },
                ],
                "initComplete": function(settings, json) {
                    $('.modal').modal();
                }
            } );
        } );

        $("#user_search").on("click",function(){
            var status = $("#users-list-statuss").val();
            $('#users-list-datatable').DataTable( {
                "processing": true,
                "serverSide": true,
                paging: true,
                "searching": true,
                "ordering": false,
                "info": true,
                "lengthChange": true,
                "bProcessing": true,
                "bServerSide": true,
                "destroy": true,
                "sAjaxSource": "notifier-list?status="+status,

                columns: [
                    { data: "id" },
                    { data: "name" },
                    { data: "email" },
                    { data: "phone" },
                    { data: "status"},
                    { data: "action" },
                ],
                "initComplete": function(settings, json) {
                    $('.modal').modal();
                }
            } );
        });

    </script>
@endsection
