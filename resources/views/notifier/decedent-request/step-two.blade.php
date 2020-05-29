@extends('notifier.decedent-request.layout')

@section('title')
    Step two
@endsection

@php
    $input_class = "input border border-gray-400 appearance-none rounded-sm w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900";
@endphp

@section('content')
<!-- BEGIN: Notifier Information -->
<div class="col-span-12 sm:col-span-12 lg:col-span-8">

    <div class="intro-y box p-6 card-border-radius">
        <form method="post" action="{{route('decedent.request.steptwo')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$data->id}}">
            <input type="hidden" name="status" value="2">
            <input name="request_stage" type="hidden" value="2" id="request_stage">
        <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
            2. The Deceased
        </h2>

        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
            @php
                $name_of_departed = "";
                if(old('name_of_departed')){
                    $name_of_departed = old('name_of_departed');
                }elseif (isset($data->name_of_departed)){
                    $name_of_departed = $data->name_of_departed;
                }
            @endphp
            <div class="intro-y col-span-12 sm:col-span-6">
                <div class="relative">
                    <input name="name_of_departed" required value="{{$name_of_departed}}" class="{{$input_class}}" id="name" type="text" autocomplete="new-name">
                    <label for="name" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base font-sans mt-2 cursor-text">Name of the Deceased<sup>*</sup></label>
                </div>
            </div>
            @php
                $present_address = "";
                if(old('present_address')){
                    $present_address = old('present_address');
                }elseif (isset($data->present_address)){
                    $present_address = $data->present_address;
                }
            @endphp
            <div class="intro-y col-span-12 mb-4 sm:col-span-6">
                <div class="relative">
                    <input name="present_address" required value="{{$present_address}}" class="{{$input_class}}" id="address" autocomplete="new-address" type="text">
                    <label for="address" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Present address</label>
                </div>
            </div>

            <div id="addrow" class=" intro-y col-span-12">
                @php
                    $previous_address = "";
                    if(old('previous_address')){
                        $previous_address = old('previous_address');
                    }elseif (isset($data->previous_address)){
                        $previous_address = $data->previous_address;
                    }
                    $second_previous_address = "";
                    if(old('second_previous_address')){
                        $second_previous_address = old('second_previous_address');
                    }elseif (isset($data->second_previous_address)){
                        $second_previous_address = $data->second_previous_address;
                    }
                    $third_previous_address = "";
                    if(old('third_previous_address')){
                        $third_previous_address = old('third_previous_address');
                    }elseif (isset($data->third_previous_address)){
                        $third_previous_address = $data->third_previous_address;
                    }
                @endphp
                <div class="rowadded">
                    <div class="flex mb-1">
                        <div class="w-11/12 h-12">
                            <div class="intro-y w-auto mr-6 ">
                                <div class="relative">
                                    <input name="previous_address" value="{{$previous_address}}" class="input border w-full border-gray-400 appearance-none rounded-sm w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="formID" type="text">
                                    <label for="formID" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Previous Address* (i.e. last 3 years)</label>
                                </div>
                            </div>
                        </div>
                        @if($second_previous_address=="")
                            <div id="plus0" class="intro-y inline-block float-right border mr-5 p-3 rounded">
                                    <span style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="more_fields" onclick="add_fields(0);" >
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div id="dynamic0"></div>
                @if($second_previous_address!="")
                    <br>
                    <div class="rowadded">
                        <div class="flex mb-1">
                            <div class="w-11/12 h-12">
                                <div class="intro-y w-auto mr-6 ">
                                    <div class="relative">
                                        <input name="second_previous_address" value="{{$second_previous_address}}" class="input border w-full border-gray-400 appearance-none rounded-sm w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="formID" type="text">
                                        <label for="formID" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Previous Address* (i.e. last 3 years)</label>
                                    </div>
                                </div>
                            </div>
                            @if($third_previous_address=="")
                                <div id="plus1" class="intro-y inline-block float-right border mr-5 p-3 rounded">
                                    <span style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="more_fields" onclick="add_fields(1);" >
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div id="dynamic1"></div>
                @endif
                @if($third_previous_address!="")
                    <br>
                    <div class="rowadded">
                        <div class="flex mb-1">
                            <div class="w-11/12 h-12">
                                <div class="intro-y w-auto mr-6 ">
                                    <div class="relative">
                                        <input name="third_previous_address" value="{{$third_previous_address}}" class="input border w-full border-gray-400 appearance-none rounded-sm w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="formID" type="text">
                                        <label for="formID" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Previous Address* (i.e. last 3 years)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @php
                $date_of_birth = "";
                if(old('date_of_birth')){
                    $date_of_birth = old('date_of_birth');
                }elseif (isset($data->date_of_birth)){
                    $date_of_birth = $data->date_of_birth;
                }
            @endphp
            <div class="intro-y col-span-12 sm:col-span-6">
                <label class="mb-1">Date of Birth*</label>
                <div class="relative">
                    <div class="absolute rounded-sm  w-16 h-full flex items-center justify-center border text-gray-600 "> <img src="{{ asset('assets/frontend/images/tdr/date_picker.png')}}" class="w-4"> </div>
                    <input name="date_of_birth" required value="{{$date_of_birth}}" class="input datepicker border border-gray-400 appearance-none rounded-sm w-full p-5 pl-20 px-3 py-3 pl-4 pt-4 pb-3 focus  focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none " id="date_of_birth" placeholder="Date of Birth*" type="text">
                    <!-- <label for="datepicker" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Email Address</label> -->
                </div>
            </div>
            @php
                $date_of_death = "";
                if(old('date_of_death')){
                    $date_of_death = old('date_of_death');
                }elseif (isset($data->date_of_death)){
                    $date_of_death = $data->date_of_death;
                }
            @endphp
            <div class="intro-y col-span-12 sm:col-span-6">
                <label class="mb-1">Date of Death*</label>
                <div class="relative">
                    <div class="absolute rounded-l w-16 h-full flex items-center justify-center  border text-gray-600 "> <img src="{{ asset('assets/frontend/images/tdr/date_picker.png')}}" class="w-4"> </div>
                    <input name="date_of_death" required value="{{$date_of_death}}" class="input datepicker border border-gray-400 appearance-none rounded-sm w-full p-5 pl-20 px-3 py-3 pl-4 pt-4 pb-3 focus  focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none " id="date_of_death" type="text">
                    <!-- <label for="datepicker" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Email Address</label> -->
                </div>
            </div>
            @php
                $cause_of_death = "";
                if(old('cause_of_death')){
                    $cause_of_death = old('cause_of_death');
                }elseif (isset($data->cause_of_death)){
                    $cause_of_death = $data->cause_of_death;
                }
            @endphp
            <div class="intro-y col-span-12 sm:col-span-6">
                <label class="mb-1">Cause of Death*</label>
                <div class="relative">
                    <select name="cause_of_death" onchange="update_draft('cause_of_death',this)" required data-hide-search="true" placeholder="Cause of Death*" class="select2 w-full 3">
                        <option value="">Select Cause of Death</option>
                        @foreach($causeof_death as $cod)
                            <option value="{{$cod->id}}" @if($cause_of_death == $cod->id) selected @endif>{{$cod->cause_of_death}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="intro-y col-span-12 mt-6 mb-4 sm:col-span-6">
                <div class="relative">
                    <!-- <input class="{{$input_class}}" id="address" type="text">
                                <label for="address" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text"></label> -->
                </div>
            </div>
            @php
                $certificate_id = "";
                if(old('certificate_id')){
                    $certificate_id = old('certificate_id');
                }elseif (isset($data->certificate_id)){
                    $certificate_id = $data->certificate_id;
                }
            @endphp
            <div class="intro-y col-span-12 sm:col-span-6">
                <label class="mb-1">Certificates</label>
                <div class="relative">
                    <select name="certificate_id" onchange="update_draft('certificate_id',this)" required data-hide-search="true" placeholder="Cause of Death*" class="select2 w-full 3">
                        <option value="">Select a certificate</option>
                        @foreach($documents as $document)
                            <option value="{{$document->id}}" @if($certificate_id == $document->id) selected @endif>{{$document->document_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @php
                $certificate_number = "";
                if(old('certificate_number')){
                    $certificate_number = old('certificate_number');
                }elseif (isset($data->certificate_number)){
                    $certificate_number = $data->certificate_number;
                }
            @endphp
            <div class="intro-y col-span-12 mb-4 sm:col-span-6">
                <div class="relative mt-6">
                    <input name="certificate_number" required value="{{$certificate_number}}" class="{{$input_class}}" id="certificate_number" type="text">
                    <label for="certificate_number" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Certificate Number</label>
                </div>
            </div>

            <!-- <button class="button w-24 mr-1 mb-2 border text-gray-700">Secondary</button> -->

        </div>
        <div class="flex mt-10 mb-6">
            <div class="xl:w-2/4">

            </div>
            <div class="xl:w-1/4">
                <a href="{{url('/')}}/notifier/decedent-request/step-one?_id={{$data->id}}" class="button rounded-none float-right pl-3 pr-3 w-24 mr-1 mb-2 bg-gray-200 text-gray-600">Previous</a>
            </div>
            <div class="xl:w-1/4">
                <button type="submit" class="button rounded-none w-24 ml-3 pl-3 pr-3 mb-2 bg-theme-dark-blue text-white">Next</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- END:  Notifier Information -->
@endsection

@section('custom-scripts')
    <script src="{{asset('assets/frontend/js/create-estate-registry-step-two.js')}}"></script>
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
    </script>
@endsection
