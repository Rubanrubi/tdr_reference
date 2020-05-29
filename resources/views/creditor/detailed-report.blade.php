@extends('creditor.layouts.app')

@section('title')
    Search
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

<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 ">
            <div class="intro-y xl:flex xl:flex-row lg:flex lg:flex-row items-center h-10 xl:mb-0 lg:mb-0 mb-16 mt-2">
                <h2 class="text-xl text-white font-medium font-sans mr-5">
                    Detailed Report <span class="font-heading-blue">(Yearly Report - Jan 2017 to Sept 2020)</span>
                </h2>
                <h2 class="text-xl text-white ml-auto font-normal font-sans mr-5">
                    36 Reports
                </h2>
            </div>
        </div>
        <!-- END: General Report -->

        <!-- <div class="col-span-12 lg:col-span-12 mt-8"> -->
        <div class="intro-y rounded-lg box col-span-12 px-5 py-5 mt-4 sm:py-3 lg:col-span-4">
            <div class="flex flex-wrap justify-between">
                <div class="tex-sm font-sans font-light-blue">ID: 034567890</div>
                <div class="text-xs font-sans font-light-blue">Today, 04:22pm</div>
            </div>
            <h2 class="text-xl text-white font-semibold font-sans truncate mr-5 mt-2">
                Kevin Spacey
            </h2>
            <div class="text-base font-light-blue font-sans">1320000004781645</div>
            <div class="flex flex-wrap mt-3">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/card.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2">Credit card, Debit Card</div>
            </div>
            <div class="flex flex-wrap mt-3">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/calendar_blue.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2">04/11/1952 - 30/04/2020</div>
            </div>
            <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap  flex flex-row mt-2">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/location.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2">Haymarket House, 5th Floor, 28-29 Haymarket, <br> <span>London - SW1Y 4SP, UK</span></div>
            </div>
            <div class="flex flex-wrap justify-between mt-4">
                <div class="text-xs mt-2 text-white font-sans font-light">Quality level of verification - <span class="font-sans font-bold text-green">B</span> </div>
                <div class="">
                    <button class="button button--sm w-20 rounded-xs font-sans mb-2 border bg-white highlighted-white  xl:mt-0 lg:mt-0 mt-4">View</button>
                </div>
            </div>
        </div>
        <!-- BEGIN: SECOND CARD -->
        <div class="intro-y rounded-lg box col-span-12 mt-4 px-5 py-5 sm:py-3 lg:col-span-4">

            <div class="flex flex-wrap justify-between">
                <div class="tex-sm font-sans font-light-blue">ID: 115678901</div>
                <div class="text-xs font-sans font-light-blue">Yesterday, 02:22am</div>
            </div>
            <h2 class="text-xl text-white font-semibold font-sans truncate mr-5 mt-2">
                Sahabzade Irfan Ali Khan
            </h2>
            <div class="text-base font-light-blue font-sans">1320000004781645</div>
            <div class="flex flex-wrap mt-3">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/card.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2"> Debit Card</div>
            </div>
            <div class="flex flex-wrap mt-3">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/calendar_blue.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2">07/01/1967 - 22/03/2020</div>
            </div>

            <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap  flex flex-row mt-2">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/location.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2">Haymarket House, 5th Floor, 28-29 Haymarket, <br> <span>London - SW1Y 4SP, UK</span></div>
            </div>
            <div class="flex flex-wrap justify-between mt-4">
                <div class="text-xs mt-2 text-white font-light font-sans">Quality level of verification - <span class="font-sans font-bold text-green">A</span> </div>
                <div class="">
                    <button class="button button--sm w-20 rounded-xs font-sans mb-2 border bg-white highlighted-white  xl:mt-0 lg:mt-0 mt-4">View</button>
                </div>
            </div>
        </div>
        <!-- END: SECOND CARD -->

        <!-- BEGIN: THIRD CARD -->
        <div class="intro-y rounded-lg box col-span-12 mt-4 px-5 py-5 sm:py-3 lg:col-span-4">

            <div class="flex flex-wrap justify-between">
                <div class="tex-sm font-sans font-light-blue">ID: 253658709</div>
                <div class="text-xs font-sans font-light-blue">22/04/2020, 11:22pm</div>
            </div>
            <h2 class="text-xl text-white font-semibold font-sans truncate mr-5 mt-2">
                Heath Andrew Ledger
            </h2>
            <div class="text-base font-light-blue font-sans">1320000004781645</div>
            <div class="flex flex-wrap mt-3">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/card.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2"> Credit Card</div>
            </div>
            <div class="flex flex-wrap mt-3">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/calendar_blue.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2">04/11/1952 - 30/04/2020</div>
            </div>
            <div class="xl:flex xl:flex-wrap lg:flex lg:flex-wrap  flex flex-row mt-2">
                <div class="tex-sm font-sans text-white">
                    <img src="{{ asset('assets/dist/images/tdr_creditor/screen_9/location.png')}}" class="w-3 mt-1">
                </div>
                <div class="text-sm font-sans text-white font-light ml-2">8419 Bergenline Ave, North Bergen, NJ 07047,
                    <br> <span>United States</span></div>
            </div>
            <div class="flex flex-wrap justify-between mt-4">
                <div class="text-xs mt-2 text-white font-light font-sans">Quality level of verification - <span class="font-sans font-bold text-green">B</span> </div>
                <div class="">
                    <button class="button button--sm w-20 rounded-xs font-sans mb-2 border bg-white highlighted-white xl:mt-0 lg:mt-0 mt-4">View</button>
                </div>
            </div>
        </div>
        <!-- END: THIRD CARD -->

    </div>

</div>

<div class="flex flex-row mt-8 xl:ml-auto">
    <button class="button xl:w-32 h-12 mr-6 mt-auto ml-auto font-sans text-lg font-medium md:tracking-wide  rounded-xs mr-2 mb-2 flex items-center justify-evenly bg-pale-blue highlighted-text"> 
                   <img src="{{ asset('assets/dist/images/tdr_creditor/print.png')}}" class="w-5 mr-2" alt=""> 
                    Print </button>
    <button class="button h-12  w-auto  font-light text-lg   md:tracking-wide mt-4 font-sans xl:w-40 rounded-xs p-2 mr-2 mb-2 flex items-center justify-evenly border text-white"> 
                   <img src="{{ asset('assets/dist/images/tdr_creditor/download.png')}}" class="w-5 mr-3" alt="">
                    Excel Export </button>

</div>
@endsection