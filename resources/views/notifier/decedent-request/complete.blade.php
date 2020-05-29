@extends('notifier.decedent-request.layout')

@section('title')
    Step four
@endsection

@section('content')
    <div class="col-span-12 sm:col-span-12 lg:col-span-8">
        <div class="intro-y box p-6 text-center card-border-radius">
            <img class="object-contain ml-auto mr-auto" src="{{ asset('assets/frontend/images/tdr/notifier_registry.png')}}">
            <h2 class="font-semibold highlighted-text mt-10 font-sans text-2xl  mr-5">
                You have successfully completed your submission to TDR.
            </h2>
            <div class="mt-3">
                <p class="text-lg text-base-grey font-sans">You will receive confirmation from the creditor via your preferred
                    <br>method of contact.</p>
            </div>
        </div>
    </div>

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
        @if(Session::has('success'))
            var toastHTML = '{{Session::get('success')}}';
            toastr["success"](toastHTML);
        @endif

    </script>
    <!-- END: CUSTOM SCRIPT-->
@endsection
