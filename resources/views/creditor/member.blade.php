@extends('creditor.layouts.app')

@section('title')
    Member
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
    #tail_member {
        width: 0px;
        height: 0px;
        border: 10px solid;
        border-color: transparent #124683 transparent transparent;
        position: absolute;
        top: 28.5rem;
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

.input {
    background-color: transparent;
    height: 3.5rem;
    border-radius: .15rem;
}

.input:focus {
    outline: 0;
    border-left: 1px solid #fff !important;
}

.w-14 {
    width: 3.5rem;
}

.select2-container .select2-selection.select2-selection--single {
    height: 55px !important;
    border-color: #fff;
    background: transparent;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #fff!important;
    font-weight: 200;
    padding-left: 5rem;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: #fff transparent transparent;
}

.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
    border-color: transparent transparent #fff;
    border-width: 0 4px 5px;
}

span.select2.select2-container.select2-container--default.select2-container--below.select2-container--focus.select2-container--open {
    width: 100% !important;
}
</style>


@section('content')

            <div class="grid grid-cols-12">

                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 ">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 ">
                        <div class="intro-y xl:flex xl:flex-row lg:flex lg:flex-row items-center h-10 mt-2">
                            <h2 class="text-lg tracking-wider text-white font-normal font-sans mr-5">
                                Member Profile
                            </h2>

                        </div>

                        <div class="grid grid-cols-12 xl:gap-5 row-gap-1 mb-20 mt-0 xl:mt-0 lg:mt-0">

                            <div class="intro-y rounded-lg box col-span-12 px-5 xl:mr-4 lg:mr-4 mr-0 py-8 mt-4 sm:py-4 lg:col-span-6">
                                <div class="font-sans text-lg font-medium text-creditor-light-blue">
                                    Creditor Information
                                </div>

                                <div class="flex flex-wrap mt-4 ">
                                    <div>
                                        <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/search.png')}}" class="w-16 mr-5 mt-1">
                                    </div>
                                    <div class="mt-3">

                                        <div class="font-sans font-semibold text-white text-lg xl:mt-0 lg:mt-0 mt-4">
                                            ANZ Banking Group
                                        </div>
                                        <div class="text-base font-sans text-white font-light text-pale-white xl:mt-0 lg:mt-0 mt-4">Banking Sector</div>
                                    </div>
                                </div>

                                <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap  flex flex-row mt-6">
                                    <div class="tex-sm font-sans text-white">
                                        <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/location.png')}}" class="w-4 mr-4 mt-1">
                                    </div>
                                    <div class="text-base font-sans text-white font-light text-pale-white">12, Gregory Terrace, Allice Springs, NT 0870</div>
                                </div>
                            </div>

                            <div class="intro-y rounded-lg box col-span-12 px-5 xl:ml-4 lg:ml-4 ml-0 py-5 mt-4 sm:py-3 lg:col-span-6">
                                <div class="flex flex-wrap mt-1 justify-between">
                                    <div>
                                        <div class="font-sans text-lg font-medium text-creditor-light-blue">
                                            User Information
                                        </div>
                                    </div>
                                    <div>
                                        <div class="ml-auto ">
                                            <button class="button button--sm w-20 rounded-xs p-3 text-creditor-light-blue  font-light font-sans  mr-2 mb-2 flex items-center justify-evenly border text-white"> 
                                           <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/edit.png')}}" class="w-4 mr-2" alt="">
                                             Edit </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="font-sans font-semibold text-white text-lg">
                                    Liam Hemsworth
                                </div>
                                <div class="text-base font-sans font-light text-pale-white ">Primary Contact</div>

                                <div class="flex flex-wrap mt-3">
                                    <div class="flex mr-8">
                                        <div>
                                            <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/user-designation.png')}}" class="w-5 h-5 mt-1">
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-pale-white font-light  ml-4">Branch Manager</div>
                                        </div>
                                    </div>
                                    <div class="flex xl:mt-0 lg:mt-0 mt-4">
                                        <div class="text-base font-sans text-white">
                                            <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/phone.png')}}" class="w-5 h-5 mt-1">
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-pale-white font-light  ml-3">+61 (02) 9876 5432</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap  flex flex-row xl:mt-4 lg:mt-4 mt-6">
                                    <div class="text-sm font-sans text-white">
                                        <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/mail.png')}}" class="w-5 mr-4 mt-1">
                                    </div>
                                    <div class="text-base font-sans text-white truncate font-light text-pale-white ml-1 pb-2">liamhemsworth@anzbanking.com</div>
                                </div>

                            </div>

                            <div class="col-span-12 mt-4">
                                <div class="intro-y xl:flex xl:flex-row lg:flex lg:flex-row items-center ">
                                    <h2 class="text-lg  tracking-wider text-white font-normal font-sans mr-5">
                                        Sub User Management
                                    </h2>
                                    <div class="ml-auto xl:mt-0 lg:mt-0 mt-2">
                                        <button class="button button--sm w-auto rounded-xs p-3 text-white text-sm font-light font-sans  mr-2 mb-2 flex items-center justify-evenly border "> 
                                       <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/add_user.png')}}" class="w-4 mr-2" alt="">
                                         Add User </button>
                                    </div>
                                </div>
                            </div>

                            <div class="intro-y rounded-lg box col-span-12 px-5 mt-4 xl:mt-0 lg:mt-0 xl:mr-4 lg:mr-4 mr-0 py-5  sm:py-3 lg:col-span-6">
                                <div class="flex flex-wrap mt-1 justify-between">
                                    <div>
                                        <div class="font-sans text-lg font-medium text-creditor-light-blue">
                                            User Information
                                        </div>
                                    </div>
                                    <div>
                                        <div class="ml-auto xl:mt-0 lg:mt-0 mt-2">
                                            <button class="button button--sm w-20 rounded-xs p-3 text-creditor-light-blue  font-light font-sans  mr-2 mb-2 flex items-center justify-evenly border text-white"> 
                                           <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/edit.png')}}" class="w-4 mr-2" alt="">
                                             Edit </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="font-sans font-semibold text-white text-lg">
                                    Liam Hemsworth
                                </div>
                                <div class="text-base font-sans font-light text-pale-white ">Primary Contact</div>

                                <div class="flex flex-wrap mt-3">
                                    <div class="flex mr-8">
                                        <div>
                                            <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/user-designation.png')}}" class="w-5 h-5 mt-1">
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-pale-white font-light  ml-4">Branch Manager</div>
                                        </div>
                                    </div>
                                    <div class="flex xl:mt-0 lg:mt-0 mt-4">
                                        <div class="text-base font-sans text-white">
                                            <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/phone.png')}}" class="w-5 h-5 mt-1">
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-pale-white font-light  ml-3">+61 (02) 9876 5432</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap  flex flex-row xl:mt-4 lg:mt-4 mt-6">
                                    <div class="text-sm font-sans text-white">
                                        <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/mail.png')}}" class="w-5 mr-4 mt-1">
                                    </div>
                                    <div class="text-base font-sans text-white truncate font-light text-pale-white ml-1 pb-2">liamhemsworth@anzbanking.com</div>
                                </div>
                            </div>


                            <div class="intro-y rounded-lg box col-span-12 px-5 py-5 xl:ml-4 lg:ml-4 ml-0 xl:mt-0 lg:mt-0 mt-4 sm:py-3 lg:col-span-6">
                                <div class="flex flex-wrap mt-1 justify-between">
                                    <div>
                                        <div class="font-sans text-lg font-medium text-creditor-light-blue">
                                            User Information
                                        </div>
                                    </div>
                                    <div>
                                        <div class="ml-auto ">
                                            <button class="button button--sm w-20 rounded-xs p-3 text-creditor-light-blue  font-light font-sans  mr-2 mb-2 flex items-center justify-evenly border text-white"> 
                                           <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/edit.png')}}" class="w-4 mr-2" alt="">
                                             Edit </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="font-sans font-semibold text-white text-lg">
                                    Liam Hemsworth
                                </div>
                                <div class="text-base font-sans font-light text-pale-white ">Primary Contact</div>

                                <div class="flex flex-wrap mt-3">
                                    <div class="flex mr-8">
                                        <div>
                                            <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/user-designation.png')}}" class="w-5 h-5 mt-1">
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-pale-white font-light  ml-4">Branch Manager</div>
                                        </div>
                                    </div>
                                    <div class="flex xl:mt-0 lg:mt-0 mt-4">
                                        <div class="text-base font-sans text-white">
                                            <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/phone.png')}}" class="w-5 h-5 mt-1">
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-pale-white font-light  ml-3">+61 (02) 9876 5432</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap  flex flex-row xl:mt-4 lg:mt-4 mt-6">
                                    <div class="text-sm font-sans text-white">
                                        <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/mail.png')}}" class="w-5 mr-4 mt-1">
                                    </div>
                                    <div class="text-base font-sans text-white truncate font-light text-pale-white pb-2 ml-1">liamhemsworth@anzbanking.com</div>
                                </div>
                            </div>


                            <div class="col-span-12 mt-4">
                                <div class="intro-y xl:flex xl:flex-row lg:flex lg:flex-row items-center ">
                                    <h2 class="text-lg  tracking-wider text-white font-normal font-sans mr-5">
                                        TDR Membership Information
                                    </h2>

                                </div>
                            </div>


                            <div class="intro-y rounded-lg box col-span-12 px-5 py-5 mt-4 xl:mt-0 lg:mt-0 xl:mr-4 lg:mr-4 mr-0 lg:h-50 xl:h-50 sm:py-3 lg:col-span-6">
                                <div class="flex flex-wrap mt-3 justify-between">
                                    <div>
                                        <div class="font-sans text-lg font-medium text-white">
                                            <span class="text-creditor-light-blue"> Membership ID </span> 234098567109120
                                        </div>
                                        <div class="font-sans font-semibold text-white text-lg">
                                            Plan: Tier 3
                                        </div>
                                    </div>
                                    <div>
                                        <div class="ml-auto mt-4 xl:mt-0 lg:mt-0 ">
                                            <button class="button button--sm w-20 rounded-xs p-3 text-pale-white  font-light font-sans  mr-2 mb-2 flex items-center justify-evenly border text-white"> 
                                           <img src="{{ asset('assets/dist/images/tdr_creditor/screen_14/edit.png')}}" class="w-4 mr-2" alt="">
                                             Edit </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap mt-6">
                                    <div class="flex mr-8">
                                        <div class="text-base font-sans font-normal text-pale-white ">
                                            Since:
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-white font-light  ml-2"> 15th Sep 2020</div>
                                        </div>
                                    </div>
                                    <div class="flex mr-8">
                                        <div class="text-base font-sans font-normal text-pale-white ">
                                            Renewal:
                                        </div>
                                        <div>
                                            <div class="text-base font-sans text-white font-light  ml-2"> 15th Sep 2021</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap mb-4 flex flex-row mt-8">
                                    <div class="font-sans text-lg font-medium text-white">
                                        <span class="text-creditor-light-blue"> Your Subscription Ends In  </span> 333 Days
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endsection