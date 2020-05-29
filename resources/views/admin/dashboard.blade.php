@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/dashboard-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/chartist-js/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/charts-chartist.min.css')}}">
    <style>
        #main .content-wrapper-before
        {
            height: 0px !important;
        }
        .align-center
        {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <div class="row vertical-modern-dashboard">
                        <div class="col s12 m6 l4">
                            <div class="card padding-4 animate fadeLeft">
                                <div class="row">
                                    <div class="col s5 m5">
                                        <h5 class="mb-0">{{$totalActiveCreditors}}</h5>
                                        <p class="no-margin">Active</p>
                                        <p class="mb-0 pt-8">{{$totalCreditors}}</p>
                                    </div>
                                    <div class="col s7 m7 right-align">
                                        <i
                                            class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">perm_identity</i>
                                        <p class="mb-0">Total Creditors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="card padding-4 animate fadeLeft">
                                <div class="row">
                                    <div class="col s5 m5">
                                        <h5 class="mb-0">{{$totalActiveUsers}}</h5>
                                        <p class="no-margin">Active</p>
                                        <p class="mb-0 pt-8">{{$totalUsers}}</p>
                                    </div>
                                    <div class="col s7 m7 right-align">
                                        <i
                                            class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">perm_identity</i>
                                        <p class="mb-0">Total Notifiers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="card padding-4 animate fadeLeft">
                                <div class="row">
                                    <div class="col s5 m5">
                                        <h5 class="mb-0">{{$totalActiveAdmins}}</h5>
                                        <p class="no-margin">Active</p>
                                        <p class="mb-0 pt-8">{{$totalAdmins}}</p>
                                    </div>
                                    <div class="col s7 m7 right-align">
                                        <i
                                            class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">perm_identity</i>
                                        <p class="mb-0">Total SubAdmins</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card subscriber-list-card animate fadeRight">
                <div class="card-content pb-1">
                    <h4 class="card-title mb-0">Recent Notifier List <i class="material-icons float-right">more_vert</i></h4>
                </div>
                <table class="subscription-table responsive-table highlight">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($recentNotifierList as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone}}</td>
                            <td>
                                @if($value->status==1)
                                    <span class="badge green lighten-5 green-text text-accent-4">Active</span>
                                @else
                                    <span class="badge pink lighten-5 pink-text text-accent-4">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <img class="align-center" src="{{asset('assets/images/gallery/intro-slide-1.png')}}" width="320px" height="250px">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="center-align">No Data Found</div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Overlapping Bars On Mobile-->
    <div class="row">
        <div class="col s12">
            <div id="ct8-chart" class="ct-chart card">
                <div class="card-content">
                    <h4 class="card-title">Subscription Payments Report</h4>
                    <p class="caption">
                        Here you will see subscription payments done for the last 12 months. For more details, Goto Subscription Management Page.
                    </p>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('assets/js/scripts/dashboard-modern.js')}}"></script>
    <script src="{{ asset('assets/vendors/chartist-js/chartist.min.js')}}"></script>
    <script src="{{ asset('assets/js/scripts/charts-chartist.min.js')}}"></script>
    <script>

    </script>
@endsection
