@extends('creditor.layouts.app')

@section('title')
    Departed
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
#tail_search {
    width: 0px;
    height: 0px;
    border: 10px solid;
    border-color: transparent #124683 transparent transparent;
    position: absolute;
    top: 15.1rem;
    left: -20px;
}
}

.content {
border-radius: 16px 16px 0px 0px;
min-height: 100vh;
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

.border-b {
border-bottom: 2px solid #465B74;
}

.border-light-grey {
border: 0px solid transparent;
}
</style>

@section('content')

<div class="grid grid-cols-12 xl:gap-12 mt-5 mb-16">
    <div class="intro-y col-span-12 lg:col-span-7">
        <!-- BEGIN: THE DEPARTED -->
        <div class="intro-y box  p-6">
            <div class="flex flex-col sm:flex-row xl:items-center  ">
                <h2 class="font-semibold font-heading-blue font-sans text-xl  mr-5">
                    The Departed
                </h2>
            </div>
            <div class="text-sm text-pale-white font-sans mt-4">Name of the Departed*</div>
            <div class="text-base font-sans font-semibold text-white">Kevin Spacey</div>
            <div class="xl:flex lg:flex xl:mb-20 lg:mb-20 mb-4 mt-4 ">
                <div class="xl:w-1/2  xl:h-12">
                    <div class="text-sm font-sans text-pale-white ">Present Address</div>
                    <div class="text-base font-semibold font-sans text-white">Haymarket House, 5th Floor, <br>28-29 Haymarket, London - <br>SW1Y 4SP, UK.</div>

                </div>
                <div class="xl:w-1/2  xl:h-12 xl:ml-16 lg:ml-16 xl:mt-0 lg:mt-0 mt-4">
                    <div class="text-sm font-sans text-pale-white ">Previous Address</div>
                    <div class="text-base font-semibold font-sans text-white">8419 Bergenline Ave, North
                        <br>Bergen, NJ 07047,
                        <br>United States</div>
                </div>
            </div>
            <div class="border-b"></div>

            <div class="xl:flex lg:flex justify-between mt-8  border-b">
                <div>
                    <div class="text-sm font-sans text-pale-white ">Date of Birth</div>
                    <div class="text-base font-semibold font-sans text-white">04/11/1952</div>
                </div>
                <div class="mb-8 xl:mr-16 lg:mr-16 mt-4 xl:mt-0 lg:mt-0">
                    <div class="text-sm font-sans text-pale-white mr-equal ">Date of death</div>
                    <div class="text-base font-semibold font-sans text-white">30/04/2020</div>
                </div>
            </div>
            <div class="text-sm text-pale-white font-sans mt-4">Cause of Death</div>
            <div class="text-base font-sans font-semibold text-white">Death Certificates </div>
            <div class="xl:flex lg:flex justify-between mt-6">
                <div>
                    <div class="text-sm font-sans text-pale-white ">Certificates</div>
                    <div class="text-base font-semibold font-sans text-white">Death Certificates</div>
                </div>
                <div class="mb-8 mr-36 mt-4 xl:mt-0 lg:mt-0">
                    <div class="text-sm font-sans text-pale-white ">Certificate Number</div>
                    <div class="text-base font-semibold font-sans text-white">25366</div>
                </div>
            </div>
        </div>

        <!-- END: THE DEPARTED -->
        <!-- BEGIN: NOTIFIER INFORMATION -->
        <div class="intro-y box p-6 mt-12">
            <div class="flex flex-col sm:flex-row xl:items-center  ">
                <h2 class="font-semibold font-heading-blue font-sans text-xl  mr-5">
                    Notifier Information
                </h2>
            </div>
            <div class="xl:flex justify-between mt-4 ">
                <div>
                    <div class="text-sm font-sans text-pale-white ">Full Name</div>
                    <div class="text-base font-semibold font-sans text-white">Heather Unruh</div>
                </div>

                <div class="xl:mr-16 lg:mr-16 mt-4 xl:mt-0 lg:mt-0">
                    <div class="text-sm font-sans text-pale-white ">Address</div>
                    <div class="text-base font-semibold font-sans text-white">8419 Bergenline Ave, North
                        <br>Bergen, NJ 07047,
                        <br>United States</div>
                </div>
            </div>
            <div class="xl:-mt-8 lg:-mt-8 mt-4">
                <div class="text-sm font-sans text-pale-white ">Email</div>
                <div class="text-base font-semibold font-sans text-white">heatherunruh@gmail.com</div>
            </div>
            <div class="xl:flex justify-between mt-6 mb-8 border-b ">
                <div>
                    <div class="text-sm font-sans text-pale-white ">Phone Number</div>
                    <div class="text-base font-semibold font-sans text-white">+61 95400 79244</div>
                </div>
                <div class="mb-4 mt-4 xl:mt-0 lg:mt-0 mr-22 ">
                    <div class="text-sm font-sans text-pale-white  ">Relationship to the departed</div>
                    <div class="text-base font-semibold font-sans text-white">Wife</div>
                </div>
            </div>
            <div class="text-sm text-pale-white font-sans mt-4">Are you the person dealing with the estate?</div>
            <div class="text-base font-sans font-semibold text-white ">No</div>

            <div class="xl:flex justify-between mt-6 border-b ">
                <div>
                    <div class="text-sm font-sans text-pale-white ">Phone Number</div>
                    <div class="text-base font-semibold font-sans text-white">+61 95400 79244</div>
                </div>
                <div class="mb-8 mr-36  xl:mt-0 lg:mt-0 mt-4">
                    <div class="text-sm font-sans text-pale-white ">Name of Executive</div>
                    <div class="text-base font-semibold font-sans text-white">Shanahan Mark</div>
                </div>
            </div>
            <div class="text-sm text-pale-white font-sans mt-8 ">Are you willing for the Creditor to verify your identity and address?</div>
            <div class="text-base font-sans font-semibold text-white  mb-4">Yes</div>
            <div class="xl:flex justify-between mt-6 border-b mb-4 mt-4">
                <div>
                    <div class="text-sm font-sans text-pale-white ">What form of ID? </div>
                    <div class="text-base font-semibold font-sans text-white">Driving Licence</div>
                </div>
                <div class="mb-8 xl:mr-20 lg:mr-20 xl:mt-0 lg:mt-0 mt-4">
                    <div class="text-sm font-sans text-pale-white ">ID No.</div>
                    <div class="text-base font-semibold font-sans text-white">Shana7567890334M6791</div>
                </div>
            </div>

            <div class="text-sm text-pale-white font-sans mt-8">Has probate been applied for?</div>
            <div class="text-base font-sans font-semibold text-white mb-8 ">No</div>
            <div class="border-b"></div>
            <div class="text-sm text-pale-white font-sans mt-4">Are you willing to be contacted by the subscribing Creditor?</div>
            <div class="text-base font-sans font-semibold text-white ">No</div>

            <div class="text-sm text-pale-white font-sans mt-4">How do you prefer to be contacted?</div>
            <div class="text-base font-sans font-semibold text-white mb-4">Email, Phone</div>

        </div>

        <!-- END: NOTIFIER INFORMATION -->
    </div>

    <div class="intro-y col-span-12 lg:col-span-5">
        <!-- BEGIN: CREDITORS ACCOUNT -->
        <div class="intro-y box xl:mt-0 lg:mt-0 mt-6 ">
            <div class="flex flex-col sm:flex-row xl:items-center p-5 ">
                <h2 class="font-semibold font-heading-blue font-sans text-xl  mr-5">
                    Creditors Account
                </h2>
            </div>

            <div class="flex flex-wrap pb-5">
                <div>
                    <div class="w-32 xl:m-5 lg:m-5 mt-2 ml-5 mb-5  h-32 border border-tdr-blue xl:mt-2 xl:flex flex-col bg-box-light-blue  rounded-md overflow-hidden">
                        <div class="xl:mt-8 lg:mt-8 mt-0">
                            <img alt="" class="object-scale-down" width="100%" src="{{ asset('assets/dist/images/tdr/step_4/anz_bank.png')}}">
                        </div>
                    </div>
                </div>
                <div class="mt-1 xl:pl-0 pl-5">
                    <div class="text-sm font-sans text-pale-white ">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-white">Credit card, Debit Card</div>
                    <div class="text-sm font-sans text-pale-white mt-2">Asset type or service</div>
                    <div class="text-base font-semibold font-sans text-white">Credit card, Debit Card</div>
                    <div class="mt-2 text-base text-green font-sans font-semibold">Confirmed Account</div>
                </div>
            </div>






        </div>
        <!-- END: CREDITORS ACCOUNT -->

        <!-- BEGIN: DEATH CERTIFICATE -->
        <div class="intro-y box mt-5">
            <!-- <div class="xl:flex xl:flex-col sm:flex-row items-center p-5 ">
                <h2 class="font-semibold font-heading-blue font-sans text-xl  xl:mr-5">
                    Death Certificate or Other Proof of Passing
                </h2>
                <a href="#" class="download-csv  xl:ml-auto">
                    <img class="xl:ml-auto lg:ml-auto xl:mt-0 lg:mt-0 mt-4 w-4 " src="dist/images/tdr_creditor/download.png">
                </a>
            </div> -->
            <div class="flex flex-col sm:flex-row items-center p-5 ">
                <h2 class="font-semibold font-heading-blue font-sans text-xl  ">
                    Death Certificate or Other Proof of Passing
                </h2>
                <a href="#" class="download-csv ml-32">
                    <img class="ml-auto w-8 " src="{{ asset('assets/dist/images/tdr_creditor/download.png')}}">
                </a>
            </div>
            <div class="pl-5 pr-5 pb-5 pt-0">
                <!-- <label class="text-base font-sans font-bold mb-5">Upload Documents</label> -->
                <form class="mt-3 rounded-md dropzone items-center border-light-grey ">
                    <!-- <img class="ml-auto mr-auto w-20" src="dist/images/tdr/step-3/upload.png"> -->

                    <div class="flex flex-wrap justify-around items-center">
                        <div><img class="ml-auto mr-auto w-20" src="{{ asset('assets/dist/images/tdr/step-3/upload.png')}}"></div>
                        <div><img class="ml-auto mr-auto w-20" src="{{ asset('assets/dist/images/tdr/step-3/upload.png')}}"></div>
                    </div>
                </form>
                <div class="text-lg tracking-wide mt-2 text-white font-sans font-medium">Quality level of verification - <span class="font-sans font-bold text-green">B</span> </div>

            </div>
        </div>
        <!-- END: DEATH CERTIFICATE -->
        <div class="flex flex-row mt-8 xl:ml-auto">
            <button class="button xl:w-32 h-12 mt-auto xl:ml-32 font-sans text-lg font-semibold lg:tracking-wide  md:tracking-wide rounded-xs mr-2 mb-2 flex items-center justify-evenly bg-pale-blue highlighted-text"> 
                           <img src="{{ asset('assets/dist/images/tdr_creditor/print.png')}}" class="w-5 mr-2" alt=""> 
                            Print </button>
            <button class="button h-12 xl:ml-auto w-auto lg:ml-auto font-light text-lg lg:tracking-wide  md:tracking-wide mt-4 font-sans xl:w-40 rounded-xs p-2 mr-2 mb-2 flex items-center justify-evenly border text-white"> 
                           <img src="{{ asset('assets/dist/images/tdr_creditor/download.png')}}" class="w-5 mr-3" alt="">
                            Excel Export </button>

        </div>
    </div>
</div>
@endsection