@extends('creditor.layouts.Register.app')

@section('title')
    Welcome
@endsection

@section('content')

<div class="h-290 xl:h-screen p-4 lg:h-screen xl:mb-56 w-full py-5 xl:py-0 xl:my-0">
    <div class="intro-y box xl:mx-16 lg:mx-16 mx-auto rounded-xl px-5 pt-5 xl:pb-10 mt-12   bg-white xl:shadow-none w-full xl:w-auto">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">

                <!-- BEGIN: Step -->
                <div class="col-span-12 lg:col-span-5 xl:ml-5">

                    <h2 class="text-2xxl text-grey-39 xl:text-left font-sans">Welcome to
                        <br>
                        <span class="font-bold font-sans mb-10 text-4xl-blue text-4xl xl:text-left"> 
                            The Decedent Registry!</span> </h2>
                    <div class="border-b-61"></div>
                    <div class="intro-y card-border-radius border-color-bc mt-8 xl:mt-20 lg:mt-20 w-auto w-21rem pt-4 pb-5 pl-7">
                        <h2 class="font-sans font-semibold highlighted-text text-xl mr-2">
                            Pre-on-board Creditor Member <br> Registration
                        </h2>
                        <div class="mt-4">
                            <div class="-mt-2">
                                <span class="rounded-full w-9 h-9 border-circle-filled bg-theme-dark-blue text-white border-solid border-2 text-center  inline-block mt-5 pt-2em">1</span>
                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Creditor Information</span>
                            </div>
                            <div class="stepLine-filled"></div>
                            <div class="-mt-2">
                                <span class="rounded-full w-9 h-9 border-circle-filled bg-theme-dark-blue text-white border-solid border-2 text-center  inline-block pt-2em">2</span>
                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">User Information</span>
                            </div>
                            <div class="stepLine-filled"></div>
                            <div class="-mt-2">
                                <span class="rounded-full w-9 h-9 border-circle-filled bg-theme-dark-blue text-white border-solid border-2 text-center  inline-block pt-2em">3</span>
                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Customization</span>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END: Step -->
                <!-- BEGIN: Notifier Information -->
                <div class="col-span-12 sm:col-span-12 lg:col-span-7 -ml-12 mt-2 pb-5">
                    <div class="intro-y xl:ml-4 ml-12 pb-5 pr-5">
                        <p class="font-sans text-base text-light-grey">We are pleased to have you & your organization as part of the TDR creditor member network,<br> please provide the following information so we can create a user account for you and<br> customize our deceased notification
                            service to your needs & requirements.</p>

                        <p class="font-sans text-base mt-4 text-light-grey">If at any point you have questions and need to speak to a client services representative, <br>please <span class="highlighted-text font-bold underline-blue">Contact Us</span> and a TDR representative will be happy
                            to assist you.</p>
                    </div>
                    <div class="intro-y py-5 pl-5 ">
                        <!-- <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                            1. Notifier Information
                        </h2> -->
                        <div class="intro-y p-6 xl:text-center mt-5 ml-4">

                            <img class="object-contain ml-auto mr-auto my-8 w-64" src="{{asset('assets/dist/images/tdr_creditor/decedent_registry.png')}}">
                            <h2 class="font-semibold highlighted-text xl:mt-10 font-sans text-2xl  xl:mr-5">
                                You have successfully Registerd to TDR.
                            </h2>
                            <div class="mt-3">
                                <p class="text-lg text-base-grey font-normal font-sans">you will receive a confirmation email and contacted by a TDR represented<br> to complete the on-boarding process and receive your user ID and Password.<br> Thank you for your interest in becoming a TDR Member.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END:  Notifier Information -->


            </div>

        </div>

    </div>
</div>

@endsection