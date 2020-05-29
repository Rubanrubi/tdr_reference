@extends('notifier.layout.layout')

@section('title')
    View Completed Estate Account
@endsection

@section('top-content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium font-sans mr-auto">
            <span class="font-sembibold font-sans highlighted-gray"> Completed Estate Account &gt; </span>
            {{$data->name_of_departed}}
        </h2>
        <div class="text-base font-sans font-normal text-light-grey">
            ID: {{($data->id < 100) ? "00".$data->id : $data->id}} | {{date("F d, Y h:i A",strtotime($data->created_at))}}</div>
    </div>
@endsection

@section('content')

    <div style="margin-top: 5%;" class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: THE DEPARTED -->
        <div class="intro-y box  p-6">
            <div class="flex flex-col sm:flex-row items-center  ">
                <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                    The Departed
                </h2>
            </div>
            <div class="text-sm text-eye-gray font-sans mt-4">Name of the Departed*</div>
            <div class="text-base font-sans font-semibold text-light-grey">
                {{$data->name_of_departed}}
            </div>
            <div class="flex justify-between mt-4  border-b">
                <div>
                    <div class="text-sm font-sans text-eye-gray ">Present Address</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->present_address}}
                    </div>
                </div>
                <div class="mb-8">
                    <div class="text-sm font-sans text-eye-gray ">Previous Address</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->previous_address}}
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-6  border-b">
                <div>
                    <div class="text-sm font-sans text-eye-gray ">Date of Birth</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->date_of_birth}}
                    </div>
                </div>
                <div class="mb-8">
                    <div class="text-sm font-sans text-eye-gray mr-equal ">Date of death</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->date_of_death}}
                    </div>
                </div>
            </div>
            <div class="text-sm text-eye-gray font-sans mt-4">Cause of Death</div>
            <div class="text-base font-sans font-semibold text-light-grey">
                {{$data->getCauseOfDeath($data->cause_of_death)}}
            </div>
            <div class="flex justify-between mt-6">
                <div>
                    <div class="text-sm font-sans text-eye-gray ">Certificates</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->getDocType($data->certificate_id)}}
                    </div>
                </div>
                <div class="mb-8 mr-20">
                    <div class="text-sm font-sans text-eye-gray ">Certificate Number</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->certificate_number}}
                    </div>
                </div>
            </div>
        </div>

        <!-- END: THE DEPARTED -->
        <!-- BEGIN: NOTIFIER INFORMATION -->
        <div class="intro-y box p-6 mt-5">
            <div class="flex flex-col sm:flex-row items-center  ">
                <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                    Notifier Information
                </h2>
            </div>
            <div class="flex justify-between mt-4 ">
                <div>
                    <div class="text-sm font-sans text-eye-gray ">Full Name</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->name}}
                    </div>
                </div>

                <div class="">
                    <div class="text-sm font-sans text-eye-gray ">Address</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->address}}
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="-mt-8">
                <div class="text-sm font-sans text-eye-gray ">Email</div>
                <div class="text-base font-semibold font-sans text-light-grey">
                    {{$data->email}}
                </div>
            </div>
            <div class="flex justify-between mt-6 mb-8 border-b ">
                <div>
                    <div class="text-sm font-sans text-eye-gray ">Phone Number</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->phone_number}}
                    </div>
                </div>
                <div class="mb-4 mr-6">
                    <div class="text-sm font-sans text-eye-gray  ">Relationship to the departed</div>
                    <div class="text-base font-semibold font-sans text-light-grey">
                        {{$data->relationship}}
                    </div>
                </div>
            </div>
            <div class="text-sm text-eye-gray font-sans mt-4">Are you the person dealing with the estate?</div>
            <div class="text-base font-sans font-semibold highlighted-text ">
                {{($data->person_dealing_with_estate == 1) ? "Yes" : "No"}}
            </div>

            @if($data->person_dealing_with_estate != 1)
            <div class="flex justify-between mt-6 border-b ">
                <div>
                    <div class="text-sm font-sans text-eye-gray ">Phone Number</div>
                    <div class="text-base font-semibold font-sans text-light-grey">+61 95400 79244</div>
                </div>
                <div class="mb-8 mr-22">
                    <div class="text-sm font-sans text-eye-gray ">Name of Executive</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Shanahan Mark</div>
                </div>
            </div>
            @endif

            <div class="text-sm text-eye-gray font-sans mt-8 ">Are you willing for the Creditor to verify your identity and address?</div>
            <div class="text-base font-sans font-semibold highlighted-text  mb-4">
                {{($data->is_verify_identity == null) ? "No" : "Yes"}}
            </div>
            @if($data->is_verify_identity != null)
            <div class="flex justify-between mt-6 border-b mb-4 mt-4">
                <div>
                    <div class="text-sm font-sans text-eye-gray ">What form of ID? </div>
                    <div class="text-base font-semibold font-sans text-light-grey">Driving Licence</div>
                </div>
                <div class="mb-8 mr-4">
                    <div class="text-sm font-sans text-eye-gray ">ID No.</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Shana7567890334M6791</div>
                </div>
            </div>
            @endif

            <div class="text-sm text-eye-gray font-sans mt-8">Has probate been applied for?</div>
            <div class="text-base font-sans font-semibold highlighted-text mb-8 ">
                {{($data->probate_applied == 1) ? "Yes" : "No"}}
            </div>
            <div class="border-b"></div>
            <div class="text-sm text-eye-gray font-sans mt-4">Are you willing to be contacted by the subscribing Creditor?</div>
            <div class="text-base font-sans font-semibold highlighted-text ">
                {{($data->available_for_contact == 1) ? "Yes" : "No"}}
            </div>

            @if($data->available_for_contact == 1)
            <div class="text-sm text-eye-gray font-sans mt-4">How do you prefer to be contacted?</div>
            <div class="text-base font-sans font-semibold highlighted-text mb-4">
                {{($data->email_available_for_contact == 1) ? "Email ," : ""}}
                {{($data->phone_number_available_for_contact == 1) ? "Phone ," : ""}}
                {{($data->mail_available_for_contact == 1) ? "Mail" : ""}}
            </div>
            @endif
        </div>
        <!-- END: NOTIFIER INFORMATION -->
    </div>

    <div style="margin-top: 5%;" class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: CREDITORS ACCOUNT -->
        <div class="intro-y box  ">
            <div class="flex flex-col sm:flex-row items-center p-5 ">
                <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                    Creditors Account
                </h2>
            </div>

            <div class="flex flex-wrap">
                <div>
                    <div class="w-32 m-5 h-32 border border-tdr-blue xl:mt-2 xl:flex flex-col bg-box-light-blue  rounded-md overflow-hidden">
                        <div class="mt-8">
                            <img alt="" class="object-scale-down" width="100%" src="{{url('/')}}/assets/frontend/images/tdr/step_4/anz_bank.png">
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <div class="text-sm font-sans text-eye-gray ">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="text-sm font-sans text-eye-gray mt-2">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="mt-2 text-base text-green font-sans font-semibold">Successfully Processed Creditor</div>
                </div>
            </div>

            <div class="flex flex-wrap pt-2">
                <div>
                    <div class="w-32 m-5 h-32 border border-tdr-blue xl:mt-2 xl:flex flex-col bg-box-light-blue  rounded-md overflow-hidden">
                        <div class="mt-8">
                            <img alt="" class="object-scale-down" width="100%" src="{{url('/')}}/assets/frontend/images/tdr/step_4/anz_bank.png">
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <div class="text-sm font-sans text-eye-gray ">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="text-sm font-sans text-eye-gray mt-2">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="mt-2 text-base text-green font-sans font-semibold">Successfully Processed Creditor</div>
                </div>
            </div>

            <div class="flex flex-wrap pt-2">
                <div>
                    <div class="w-32 m-5 h-32 border border-tdr-blue xl:mt-2 xl:flex flex-col bg-box-light-blue  rounded-md overflow-hidden">
                        <div class="mt-8">
                            <img alt="" class="object-scale-down" width="100%" src="{{url('/')}}/assets/frontend/images/tdr/step_4/anz_bank.png">
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <div class="text-sm font-sans text-eye-gray ">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="text-sm font-sans text-eye-gray mt-2">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="mt-2 text-base text-red font-sans font-semibold">Pending</div>
                </div>
            </div>

            <div class="flex flex-wrap pb-5 pt-2">
                <div>
                    <div class="w-32 m-5 h-32 border border-tdr-blue xl:mt-2 xl:flex flex-col bg-box-light-blue  rounded-md overflow-hidden">
                        <div class="mt-8">
                            <img alt="" class="object-scale-down" width="100%" src="{{url('/')}}/assets/frontend/images/tdr/step_4/anz_bank.png">
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <div class="text-sm font-sans text-eye-gray ">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="text-sm font-sans text-eye-gray mt-2">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-light-grey">Credit card, Debit Card</div>
                    <div class="mt-2 text-base text-green font-sans font-semibold">Successfully Processed Creditor</div>
                </div>
            </div>
        </div>
        <!-- END: CREDITORS ACCOUNT -->

        <!-- BEGIN: DEATH CERTIFICATE -->
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 ">
                <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                    Death Certificate or Other Proof of Passing
                </h2>
                <a href="#" class="download-csv ml-32">
                    <img class="ml-auto w-6 " src="{{url('/')}}/assets/frontend/images/tdr/download.png">
                </a>
            </div>
            <div class="pl-5 pr-5 pb-5 pt-0">
                <!-- <label class="text-base font-sans font-bold mb-5">Upload Documents</label> -->
                <form class="mt-3 rounded-md dropzone items-center border-light-grey ">
                    <!-- <img class="ml-auto mr-auto w-20" src="dist/images/tdr/step-3/upload.png"> -->

                    <div class="flex flex-wrap justify-around items-center">
                        @foreach($documents as $key => $document)
                        <div>
                            <img class="ml-auto mr-auto w-20" src="{{url('/')}}/uploads/{{$document->document}}">
                        <a class="download-files" style="display: none;" href="{{url('/')}}/uploads/{{$document->document}}" download="{{$document->document}}" target="_blank">
                            download
                        </a>
                        </div>
                        @endforeach

{{--                        <div><img class="ml-auto mr-auto w-20" src="dist/images/tdr/step-3/upload.png"></div>--}}
{{--                        <div><img class="ml-auto mr-auto w-20" src="dist/images/tdr/step-3/upload.png"></div>--}}
{{--                        <div><img class="ml-auto mr-auto w-20" src="dist/images/tdr/step-3/upload.png"></div>--}}
{{--                        <div><img class="ml-auto mr-auto w-20" src="dist/images/tdr/step-3/upload.png"></div>--}}
                    </div>
                </form>
            </div>
        </div>
        <!-- END: DEATH CERTIFICATE -->

    </div>

@endsection

@section('custom-scripts')

    <script>
        $('a.download-csv').on('click', function() {
            const docs = document.getElementsByClassName('download-files');
            for (var i = 0; i < docs.length; i++) {
                const _doc = docs[i];
                _doc.click();
            }
        });
    </script>
@endsection
