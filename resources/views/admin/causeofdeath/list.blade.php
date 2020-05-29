@extends('admin.layouts.app')

@section('content')
@php
    if (Auth::guard('subadmin')->check())
    {
        $user = Auth::guard('subadmin')->user();
        $causeof_death = explode(",",$user->causeof_death);
        $role = 2;
    }else
    {
        $role = 1;
        $causeof_death = array();
    }
@endphp
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Cause of Death Master</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cause of Death List</li>
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
                        <h4 class="card-title">Cause of Death List <a @if($role==2 && !in_array(2,$causeof_death)) style="display: none" @endif class="waves-effect waves-light btn indigo right modal-trigger" href="#addmodal"><i class="material-icons left">add</i> Add Cause of Death</a></h4>
                        <br>
                        <div class="row">
                            <div class="col s12">
                            <table id="page-length-option" class="display">
                                <thead>
                                <tr>
                                    <th>Cause of Death Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

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
                        <h5>Add Cause of Death Type</h5>
                        <form method="POST" action="{{ route('admin.cod.add') }}">
                            @csrf
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <input id="cod_name" name="cause_of_death" value="{{ old('cause_of_death') }}" required type="text">
                                    <label for="cod_name" class="center-align">{{ __('Cause of Death Name') }}</label>
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

        $(document).ready(function() {
            $('#page-length-option').DataTable( {
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
                "sAjaxSource": "causeofdeath-list",

                columns: [
                    { data: "name" },
                    { data: "action" },
                ],
                "initComplete": function(settings, json) {
                    $('.modal').modal();
                }
            } );
        } );
    </script>
@endsection
