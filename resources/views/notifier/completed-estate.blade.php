@extends('notifier.layout.layout')

@section('title')
    Completed Estate Account
@endsection

@section('content')

    @if(sizeof($data) == 0)
    <!-- BEGIN: CONTENT -->
    <div class="col-span-12 sm:col-span-12 lg:col-span-12">
        <div class="intro-y p-6 text-center card-border-radius">
            <img class="object-contain ml-auto mr-auto" src="{{asset('assets/frontend/images/tdr/notifier_empty_state.png')}}">
            <!-- <h2 class="font-semibold highlighted-text mt-10 font-sans text-2xl  mr-5">
                You have successfully completed your submission to TER.
            </h2> -->
            <div class="mt-3">
                <p class="text-2xl text-base-grey font-semibold font-sans">You have not created any Estate Account yet.
                    <br> Please proceed to create your first Estate Account.</p>
            </div>
            <div class="flex items-center justify-center mt-6 mb-4">
                <a href="{{route('step.one')}}" class="button font-sans button--lg w-auto rounded-sm text-white bg-theme-dark-blue xl:mr-3">Create Estate Account</a>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    @else
            <div class="col-span-12">
                <h2 class="text-xl ml-2 highlighted-text font-semibold font-sans truncate mr-5">
                    Completed Estate Account
                </h2>
            </div>
            @foreach($data as $key => $decedent)
            <!-- BEGIN: FIRST CARD -->
            <div class="intro-y card-border-radius box col-span-12 px-5 py-5 sm:py-3 lg:col-span-4">

                <div class="flex flex-wrap justify-between">
                    <div class="tex-sm font-sans text-light-grey-note">ID: {{($decedent->id < 100) ? "00".$decedent->id : $decedent->id}}</div>
                    <div class="text-xs font-sans text-light-grey-note">
                        {{date("F d, Y h:i A",strtotime($decedent->created_at))}}
                    </div>
                </div>
                <h2 class="text-xl highlighted-text font-semibold font-sans truncate mr-5 mt-2">
                    {{$decedent->name_of_departed}}
                </h2>
                <div class="text-sm text-light-grey font-sans">
                    {{$decedent->getCauseOfDeath($decedent->cause_of_death)}}
                </div>
                <div class="flex flex-wrap mt-3">
                    <div class="tex-sm font-sans text-eye-gray">
                        <img src="{{asset('assets/frontend/images/tdr/calendar.png')}}" class="w-3 mt-1">
                    </div>
                    <div class="text-sm font-sans text-eye-gray ml-2">
                        {{$decedent->date_of_birth}} - {{$decedent->date_of_death}}
                    </div>
                </div>
                <div class="flex flex-wrap mt-2">
                    <div class="tex-sm font-sans text-eye-gray">
                        <img src="{{asset('assets/frontend/images/tdr/map.png')}}" class="w-3 mt-1">
                    </div>
                    <div class="text-sm font-sans text-eye-gray xl:ml-2">
                        {{$decedent->present_address}}
                    </div>
                </div>
                <div class="flex flex-wrap justify-between mt-4">
                    <div class="text-xs mt-2 text-eye-gray font-sans">Processed by <span class="font-sans font-bold text-green">2 Creditors</span> &nbsp; - &nbsp;<span class="font-sans text-red font-medium">1 Pending</span></div>
                    <div class="">
                        <a href="{{ url('notifier/completed-estate-account', [$decedent->id]) }}" class="button button--sm w-20  font-sans mb-2 border border-tdr-blue highlighted-text">
                            View
                        </a>

                    </div>
                </div>
            </div>
            <!-- END: FIRST CARD -->
            @endforeach

    @endif

@endsection

@section('custom-scripts')
    <!-- BEGIN: CUSTOM LABEL -->
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if($errors->any())
            var toastHTML = '{{$errors->first()}}';
            toastr["error"](toastHTML);
        @endif

        @if(Session::has('success'))
            var toastHTML = '{{Session::has('success')}}';
            toastr["success"](toastHTML);
        @endif


    </script>
    <!-- END: CUSTOM SCRIPT-->
@endsection
