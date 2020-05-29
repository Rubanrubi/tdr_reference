@extends('admin.layouts.app')

@section('content')
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
                            <li class="breadcrumb-item active">{{ ucfirst($type) }} Creditor List</li>
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
{{--                                    <h4 class="card-title">Document List <a class="waves-effect waves-light btn indigo right modal-trigger" href="#addmodal"><i class="material-icons left">add</i> Add Document</a></h4>--}}
                                    <br>
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                <tr>
                                                    <th>Creditor Name</th>
                                                    <th>Primary Contact Name</th>
                                                    <th>Primary Contact Email</th>
                                                    <th>Primary Contact Phone</th>
                                                    <th>City</th>
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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        @if (session('success'))
            var toastHTML = "{{session('success')}}";
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
                "sAjaxSource": "{{url('/')}}/admin/creditor/creditor-list?type={{$type}}",

                columns: [
                    { data: "creditor_name" },
                    { data: "name" },
                    { data: "email" },
                    { data: "phone" },
                    { data: "city"},
                    { data: "action" },
                ]
            } );
        } );


    </script>
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
