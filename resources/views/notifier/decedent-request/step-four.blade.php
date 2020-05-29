@extends('notifier.decedent-request.layout')

@section('title')
    Step four
@endsection

@section('custom-styles')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/select2.min.css')}}">
    <style>
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #e2e8f0 !important;
        }

        .select2-selection--multiple {
            height: auto !important;
        }

        .select2-selection__rendered {
            margin-top: 0px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            /*margin-top: 54px;*/
        }

        li.select2-selection__choice {
            background-color: rgba(231, 235, 241, 0.78) !important;
            border: 1px solid #002b5c !important;
            padding: 20px;
        }

        .modal .modal__content.modal__content--lg,
        .modal .modal__content.modal__content--xl {
            /*width: 692px !important;*/
        }

        .search {
            height: 3.1rem !important;
            min-height: 50px;
        }

        button.select2-selection__choice__remove {
            border-right: 0px solid #aaa !important;
            font-size: 20px !important;
        }

        li.select2-selection__choice {
            padding: 17px !important;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection .select2-selection__rendered {
            display: inline-block !important;
        }

        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice:nth-child(1),
        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice:nth-child(2),
        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice:nth-child(3) {
            margin-top: 5px !important;
            margin-left: 5px !important;
            margin-bottom: 5px !important;
        }

        @media (max-width:806px) {
            .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice:nth-child(3) {
                margin-top: 0px !important;
            }
        }

        @media (max-width:470px) {
            .select2-selection__choice {
                margin-left: -40px !important;
            }
        }

        @media (max-width:560px) {
            .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice:nth-child(2) {
                margin-top: 0px !important;
            }
        }

        @media only screen and (min-width: 300px) and (max-width: 700px) {
            .w-1\/4 {
                width: 0% !important;
            }
            .rounded-none {
                margin-right: 10px;
                margin-left: 10px;
            }
            body {
                overflow-x: hidden;
            }
        }

        .select2-search--inline {
            position: relative;
            bottom: 25px;
            display: none;
        }

        span.select2.select2-container.select2-container--default.select2-container--below.select2-container--focus.select2-container--open
        {
            margin-top: 50px !important;
        }
    </style>
@endsection
@php
    $input_class = "input border border-gray-400 appearance-none rounded-sm w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900";
@endphp

@section('content')
    <!-- BEGIN: Notifier Information -->
    <div class="col-span-12 sm:col-span-12 lg:col-span-8">
        <form method="post" action="{{route('decedent.request.store')}}">
            <div class="intro-y box p-6 card-border-radius">
                <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                    4. Input Creditors Account
                </h2>
                <input type="hidden" id="id" name="id" value="{{$data->id}}">
                @csrf
                <div class="mt-5 mb-5">
                    <p class="text-base text-base-grey font-sans">Please input all creditors the deceased had an account within the form below. The list of creditors in our network will scroll down and match as you type the name. If you do not match with the creditor you are trying to register
                        as you type the name it means the creditor is not in our network and you will have to notify that creditor separately from TER. *</p>
                </div>
                <div class="relative mb-5">
                    <label class="text-base font-sans font-semibold mb-5"> Search Creditors by Name</label>
                    <div class="flex mt-2">
                        <div class="z-10 rounded-l w-16 flex items-center justify-center  border border-r-0  text-gray-600 -mr-1 search" style="height: 3.1rem;"><i class="fas fa-search"></i></div>
                        <select class="select21  w-full 3" multiple name="creditor_list[]">
                            @foreach($creditorList as $creditor)
                                <option value="{{$creditor->id}}" @if(in_array($creditor->id,$creditorAssetID)) selected @endif title="{{ ($creditor->profile_picture!="")?asset('uploads/creditors/'.$creditor->profile_picture):""}}">{{$creditor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- BEGIN: MULTISELECT DROPOWN SELECTED DETAILS -->


                <!-- BEGIN: MULTISELET WEB VIEW -->
                <div id="multiselect_web" class="dynamic_multiselect">
                    @foreach($creditorAssetList as $list)
                        <div class="intro-y mt-12" id="{{$list->creditor_id}}">
                            <div class=" px-4 py-4 mb-3 xl:flex items-center ">
                                <div class="w-32 h-32 border border-tdr-blue xl:mt-2 xl:flex bg-box-light-blue  rounded-md overflow-hidden">
                                    <img alt="" class="object-scale-down" width="100%" src="{{ ($list->Creditors->profile_picture!="")?asset('uploads/creditors/'.$list->Creditors->profile_picture):""}}">
                                    <i class="fas fa-times mt-2 mr-2" ></i>
                                </div>
                                <input type="hidden" name="creditor_id[]" value="{{$list->creditor_id}}" id="creditor_id">
                                <div class="xl:ml-6">
                                    <div class="relative mb-4">
                                        <input name="asset_type[]" value="{{$list->asset_type}}" onfocusout="storeAssetType(this,'{{$list->creditor_id}}')" class="input border border-gray-400 appearance-none rounded-l  w-37 px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="asset_type_1" type="text">
                                        <label for="asset_type_1" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base font-sans mt-2 cursor-text">Asset type or service (Credit card, Mortgage Electric, Telecom)</label>
                                    </div>
                                    <div class="relative">
                                        <input name="account_number[]" value="{{$list->account_number}}" onfocusout="storeAssetDraft(this)" class="input border border-gray-400 appearance-none rounded-l w-37 px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="account_no_1" type="number">
                                        <label for="account_no_1" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base font-sans mt-2 cursor-text">Account Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- END: MULTISELET WEB VIEW -->

                <!-- BEGIN: MULTISELET MOBILE VIEW -->
                <div id="multiselect_mobile" class="dynamic_multiselect">

                </div>
                <!-- BEGIN: MULTISELET MOBILE VIEW -->
                <!-- END: MULTISELECT DROPOWN SELECTED DETAILS -->


                <div class="mt-5 mb-3 ">
                    <p class="text-base text-base-grey font-sans text-grey">If your Crediter is not listed on the above list you can add the creditor name below</p>
                </div>
                <div id="addrow" class=" mb-5 intro-y col-span-12">
                    @php $i=0; @endphp
                    @if($newCreditors!="" && count($newCreditors)>0)
                        @foreach($newCreditors as $value)
                            <div class="rowadded{{$i}} @if(count($newCreditors)>$i+1) mb-5 @endif">
                                <div class="flex mb-1">
                                    <div class="w-11/12 h-12">
                                        <div class="intro-y w-auto mr-6 ">
                                            <div class="relative">
                                                <input name="creditor_name[]" value="{{$value->name}}" onfocusout="storeCreditorDraft(this)" class="input border w-full border appearance-none rounded-l w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="creditor_name[]"
                                                       type="text">
                                                <label for="creditor_name" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Creditor Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="{{$i}}" @if(count($newCreditors)!=$i+1) style="display: none" @endif class="intro-y inline-block float-right border mr-5 p-3 rounded">
                                        <span style="cursor: pointer;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="more_fields" onclick="add_fields({{$i}});" >
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @php $i = $i+1; @endphp
                        @endforeach
                    @else
                        <div class="rowadded0">
                            <div class="flex mb-1">
                                <div class="w-11/12 h-12">
                                    <div class="intro-y w-auto mr-6 ">
                                        <div class="relative">
                                            <input name="creditor_name[]" onfocusout="storeCreditorDraft(this)" class="input border w-full border appearance-none rounded-l w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="creditor_name[]"
                                                   type="text">
                                            <label for="creditor_name" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Creditor Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="0" class="intro-y inline-block float-right border mr-5 p-3 rounded">
                                    <span style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="more_fields" onclick="add_fields();" >
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div id="dynamicContent{{($i==0)?$i:$i-1}}"></div>
                </div>

                <div class="mt-3 ">
                    <p class="text-base text-light-grey-note font-sans text-grey">*The creditor may or may not be notified as there is no match for this creditor in our system. But we will email you you if it becomes available. </p>
                </div>
                <div class="mt-10 mb-5">
                    <p class="text-base text-base-grey font-sans">A list of participating Creditors can be accessed by clicking on the link below labeled “Participating Creditors”. You have the option of limiting which Creditors receive the notification by unchecking the check box next to
                        the Creditor listed. If the departed had an account with a Creditor who is not listed, you will still have to reach out to that organization individually</p>
                </div>

                <h2>
                    <a href="javascript:;" data-toggle="modal" data-target="#large-modal-size-preview" class=" font-semibold highlighted-text font-sans text-xl  mr-5 open_modal">Participating Creditors</a>
                </h2>
                <div class="modal" id="large-modal-size-preview">

                    <div class="modal__content modal__content--lg pt-5 pl-6 pb-10 pr-1 text-center pl-modal">
                        <!-- <i class="far fa-times-circle text-4xl float-right"></i> -->
                        <img src="{{ asset('assets/frontend/images/tdr/step_4/close_icon.png')}}" data-dismiss="modal" class="w-8 -mt-8 -mr-4 float-right close_modal">
                        <h2 class="font-semibold text-left mb-2 rounded-l highlighted-text font-sans text-xl  mr-5">List of Participating Creditors</h2>
                        <div class="flex xl:justify-start items-center justify-center flex-wrap">

                            @foreach($creditorList as $creditor)
                                @php
                                    $check = "";  $boxClass = "box-unselect";
                                    $creditorDraft = explode(",",$participantCreditors);
                                    if(in_array($creditor->id, $creditorDraft))
                                    {
                                        $check = "checked";
                                        $boxClass = "box-select";
                                    }else if($participantCreditors==""){
                                        $check = "checked";
                                        $boxClass = "box-select";
                                    }
                                @endphp
                            <div class="creditorsBox mb-4" id="participant{{$creditor->id}}">
                                <div class=" {{$boxClass}} w-32  h-32 border xl:mt-2 xl:flex flex-col bg-box-light-blue rounded-md overflow-hidden bank{{$creditor->id}}">
                                    <div class="mt-8">
                                        <img alt="" class="object-scale-down" width="100%" src="{{ ($creditor->profile_picture!="")?asset('uploads/creditors/'.$creditor->profile_picture):""}}">
                                    </div>
                                    <div class="ml-2 mt-6 mb-4">
                                        <div class="flex items-center text-gray-700 mr-2">
                                            <input type="checkbox" {{$check}} value="{{$creditor->id}}" name="participating_creditors[]" onclick="box_select({{$creditor->id}})" class="input border checkbox{{$creditor->id}}" id="horizontal-checkbox{{$creditor->id}}">
                                            <label class="cursor-pointer font-sans select-none ml-2" for="horizontal-checkbox{{$creditor->id}}">{{$creditor->name}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="flex mt-10 mb-2">
                            <div class="w-2/4">

                            </div>
                            <div class="w-1/4">
                                <button onclick="reset_participants()" class="button rounded-none float-right pl-3 pr-3 w-24 bg-gray-200 text-gray-600" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="w-1/4">
                                <button onclick="store_participants()" class="button rounded-none w-24 pl-3 -ml-4 pr-3 bg-theme-dark-blue text-white">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex mt-10 mb-6">
                    <div class="xl:w-2/4">

                    </div>
                    <div class="xl:w-1/4">
                        <a href="{{url('/')}}/notifier/decedent-request/step-three?data={{$data->id}}" class="button rounded-none float-right pl-3 pr-3 w-24 mr-1 mb-2 bg-gray-200 text-gray-600">Previous</a>
                    </div>
                    <div class="xl:w-1/4">
                        <button type="submit" class="button rounded-none w-24 ml-3 pl-3 pr-3 mb-2 bg-theme-dark-blue text-white">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- END:  Notifier Information -->
@endsection

@section('custom-scripts')
    <script src="{{ asset('assets/frontend/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/create-estate-registry-step-four.js')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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

        function reset_participants() {
            var participating_creditors_data = "";
            var participating_creditors = localStorage.getItem("participating_creditors");
            console.log(participating_creditors);
            if(participating_creditors!="" || participating_creditors!=null) {
                participating_creditors_data = participating_creditors;
            }else if('{{$participantCreditors}}'!=""){
                participating_creditors_data = '{{$participantCreditors}}';
            }
            if(participating_creditors_data!=""){
                $("input[type=checkbox]").prop('checked', false);
                participating_creditors = participating_creditors.split(',');
                for(var i=0; i<participating_creditors.length; i++){
                    var id = participating_creditors[i];
                    $("#horizontal-checkbox"+id).prop('checked', true);
                    $('.bank'+id).removeClass("box-unselect");
                    $('.bank'+id).addClass("box-select");
                    $("#large-modal-size-preview").hide();
                    $('body').removeClass("overflow-y-hidden");
                }
            }else{
                $("input[type=checkbox]").prop('checked', true);
                $("#large-modal-size-preview").hide();
                $('body').removeClass("overflow-y-hidden");
            }
        }

    </script>
    <!-- END: CUSTOM SCRIPT-->
@endsection
