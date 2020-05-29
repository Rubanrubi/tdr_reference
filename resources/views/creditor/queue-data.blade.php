@extends('creditor.layouts.app')

@section('title')
    Data In Queue
@endsection

<style>
            @media (min-width: 767px) {
            .fas.fa-chevron-down {
                margin-top: 10px!important;
            }
            .tooltiptail {
                display: block;
                border-color: transparent #124683 transparent transparent;
                border-style: solid;
                border-width: 20px;
                width: 0px;
                height: 0px;
            }
            #toolTip {
                background-color: #ffffff;
                margin-left: 2rem;
                position: relative;
                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                box-shadow: 0px 0px 8px -1px black;
                -moz-box-shadow: 0px 0px 8px -1px black;
                -webkit-box-shadow: 0px 0px 8px -1px black;
            }
            #tail1 {
                width: 0px;
                height: 0px;
                border: 10px solid;
                border-color: transparent #124683 transparent transparent;
                position: absolute;
                top: 2rem;
                left: -20px;
            }
        }
        
        .content {
            border-radius: 16px 16px 0px 0px;
            min-height: 90vh;
            background-color: #124683;
            flex: 1 1 0%;
            padding: 1.5rem 2.5rem 0rem 2.2rem;
        }
</style>

@section('content')

<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 ">
            <div class="intro-y xl:flex xl:flex-row lg:flex lg:flex-row items-center h-10 mt-2">
                <h2 class="text-xl text-white font-medium font-sans mr-5">
                    Data in Queue
                </h2>
                <div class="flex flex-row  xl:ml-auto lg:ml-auto md:ml-auto mt-4">
                    <button class="button xl:ml-auto w-38 font-sans font-light-blue font-light mr-2 mb-2 flex items-center p-3 rounded-xs justify-evenly bg-theme-1 ">
                     <!-- <i data-feather="activity" class="w-4 h-4  text-white"></i>  -->
                     <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/refresh-white.png')}}" class="w-4 mr-3 mt-1" alt="">
                     Populate Data </button>
                    <button class="button w-38  mb-2 font-sans font-light-blue font-light flex items-center p-3 rounded-xs justify-evenly bg-theme-1 ">
                     <!-- <i data-feather="activity" class="w-4 h-4  text-white"></i>  -->
                     <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/data-transfer-white.png')}}" class="w-4 mr-3" alt="">
                     <a href="javascript:;" data-toggle="modal" data-target="#button-modal-preview" class="inline-block open_modal">Data Transfer </a></button>
                    <!-- <a href="" class="ml-auto flex text-theme-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw w-4 h-4 mr-3"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>                                Reload Data </a> -->
                </div>
            </div>


            <div class="modal" id="button-modal-preview">
                <div class="modal__content relative">
                    <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-3">
                        <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/close.png')}}" alt="" class="w-8 h-8  mt-3 close_modal">
                    </a>
                    <div class="p-5 h-32 ">
                        <div class="text-lg font-sans text-white font-medium">Data Transfer</div>
                        <p class="text-base font-sans text-white font-light mt-2">Please select data transfer icon when you are ready to securely transfer the latest reported deceased accounts via SFTP or API.</p>
                        <div class=" xl:flex lg:flex md:flex flex-wrap mt-8 xl:p-0 lg:p-0 p-4">
                            <div class="xl:w-1/2 xl:h-12  ">
                                <div class="w-64 h-48 rounded-lg xl:mr-auto lg:mr-5 md:mr-5 border overflow-hidden">
                                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/sftp.png')}}" class="ml-auto mr-auto w-20 mt-5" alt="">
                                    <p class="text-xs text-white font-sans text-center font-light p-4">To begin the secure transfer of the latest reported deceased accounts. Click here to get started.</p>
                                </div>
                            </div>
                            <div class="xl:w-1/2 xl:h-12 mt-4 xl:mt-0 lg:mt-0">
                                <div class="w-64 h-48 rounded-lg xl:ml-auto lg:ml-1 md:ml-1 border overflow-hidden">
                                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/api.png')}}" class="ml-auto mr-auto w-20 mt-6" alt="">
                                    <p class="text-xs text-white font-sans text-center font-light pt-5 p-4">To have your data transfer happen automatically on a regular scheduled basis, click here to contact a TDR representative.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div> -->
                </div>
            </div>



            <div class="grid grid-cols-12 gap-6 mt-16 xl:mt-8 lg:mt-8">
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <div class="report-box">
                        <div class="box p-5">
                            <div class="flex">
                                <h2 class="font-sans text-lg text-creditor-light-blue font-semibold">Total Confirmed Accounts</h2>
                                <!-- <div class="ml-auto mt-1">
                                    <p class="font-sans text-sm text-white font-medium">View More</p>
                                </div> -->
                            </div>
                            <div class="flex">
                                <div class="text-4xl font-bold text-white mt-8">28</div>
                                <div class="ml-auto mt-auto">
                                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/confirmed-accounts-green.png')}}" class="w-16">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <div class="report-box ">
                        <div class="box p-5">
                            <div class="flex">
                                <h2 class="font-sans text-lg text-creditor-light-blue font-semibold">Total Non-Confirmed Account</h2>
                                <!-- <div class="ml-auto mt-1">
                                    <p class="font-sans text-sm text-white font-medium">View More</p>
                                </div> -->
                            </div>
                            <div class="flex">
                                <div class="text-4xl font-bold text-white mt-8">13</div>
                                <div class="ml-auto mt-auto">
                                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/non-confirmed-account.png')}}" class="w-16">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <div class="report-box ">
                        <div class="box p-5">
                            <div class="flex">
                                <h2 class="font-sans text-lg text-creditor-light-blue font-semibold">Total Proof of Death Images</h2>
                                <!-- <div class="ml-auto mt-1">
                                    <p class="font-sans text-sm text-white font-medium">View More</p>
                                </div> -->
                            </div>
                            <div class="flex">
                                <div class="text-4xl font-bold text-white mt-8">55</div>
                                <div class="ml-auto mt-auto">
                                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/proof-of-death.png')}}" class="w-12">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: General Report -->
        <!-- BEGIN:Imported Statistics -->
        <div class="col-span-12 lg:col-span-12 mt-8">
            <div class="intro-y block xl:mt-0 lg:mt-0 mt-10 sm:flex xl:flex xl:flex-row lg:flex lg:flex-row flex flex-col-reverse items-center h-10">
                <h2 class="text-xl font-light-blue  font-sans font-medium  mr-5">
                    Instructions
                </h2>
                <button class="button xl:ml-auto lg:ml-auto font-light text-lg tracking-wider mt-4 font-sans w-auto rounded-xs p-3 mr-2 mb-2 flex items-center justify-evenly border text-white"> 
                   
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/detailed-report.png')}}" class="w-5 mr-4" alt="">
                     Detailed Report </button>
            </div>
            <div class="intro-y p-5 pl-0 xl:mt-4 lg:mt-4  sm:mt-1">
                <div class="flex">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/refresh-blue.png')}}" class="w-4 h-4 mr-4 mt-1" alt="">
                    <p class=" text-white font-sans text-base font-light mb-4 tracking-wider">

                        Click on &nbsp;<span class="font-bold">Populate Data </span> &nbsp;to Refresh yet to Data Transfer</p>

                </div>
                <div class="flex">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/data-transfer-blue.png')}}" class="w-4 h-4 mr-4 mt-1" alt="">
                    <p class=" text-white font-sans text-base font-light mb-4 tracking-wider">
                        Click on &nbsp;<span class="font-bold">Data Transfer </span>&nbsp;to Initiate the Process of uploading queued TDR Data to your System
                    </p>
                </div>
                <div class="flex">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/confirmed-accounts-blue.png')}}" class="w-4 h-4 mr-4 mt-1" alt="">
                    <p class=" text-white font-sans text-base font-light mb-4 tracking-wider">
                        <span class="font-bold">Total Confirmed Accounts</span>&nbsp; - is the Number of Departed Accounts which has Proof Attached
                    </p>

                </div>
                <div class="flex">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_7/non-confirmed-account-blue.png')}}" class="w-4 h-4 mr-4 mt-1" alt="">
                    <p class=" text-white font-sans text-base font-light mb-4 tracking-wider">
                        <span class="font-bold">Total Non-Confirmed Account </span>&nbsp;- is the Number of Departed accounts which has no proof Attached
                    </p>
                </div>


            </div>
        </div>
        <!-- END: Imported Statistics -->





    </div>

</div>
</div>
<!-- END: Content -->
@endsection