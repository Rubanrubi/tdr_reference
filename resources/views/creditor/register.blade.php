@extends('creditor.layouts.Register.app')

@section('title')
    Creditor Register
@endsection
<style>
    /* div#address .validation {
    position: absolute !important;
   
    color: red !important;
    font-size: 15px;
} */
#hidden_div {
    display: none;
}
span.select2.select2-container.select2-container--default{
    width: 100% !important;
}
</style>
@section('content')

               <form method="POST" action="{{url('/')}}/creditor/register">
                @csrf
                <div id="creditor_information" class="h-260 xl:h-screen p-4 lg:h-screen xl:mb-0 w-full py-5 xl:py-0 xl:my-0">
                    <div class="intro-y box xl:mx-16 lg:mx-16 mx-auto rounded-xl pr-4 pl-4 xl:px-5 pt-5 xl:pb-4 mt-12   bg-white xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">

                                <!-- BEGIN: STEPS -->
                                <div class="col-span-12 lg:col-span-5 xl:ml-5">
                                    <h2 class="text-2xxl text-grey-39 xl:text-left font-sans">Welcome to
                                        <br>
                                        <span class="font-bold font-sans mb-10 text-4xl-blue text-4xl xl:text-left"> 
                                            The Decedent Registry!</span> </h2>
                                    <div class="border-b-61"></div>
                                    <div class="intro-y card-border-radius border-color-bc mt-8 xl:mt-20 w-auto w-21rem pt-4 pb-5 pl-7">
                                        <h2 class="font-sans font-semibold highlighted-text text-lg mr-2">
                                            Pre-on-board Creditor Member <br> Registration
                                        </h2>
                                        <div class="mt-4">
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 border-circle-filled  border-2 text-center font-bold highlighted-text inline-block mt-5 pt-2em">1</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Creditor Information</span>
                                            </div>
                                            <div class="stepLine"></div>
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 border-solid border-2 text-center font-bold highlighted-text inline-block pt-2em">2</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">User Information</span>
                                            </div>
                                            <div class="stepLine"></div>
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 highlighted-text border-solid border-2 font-bold text-center inline-block pt-2em">3</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Customization</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- END: STEPS -->

                                <!-- BEGIN: CREDITOR INFORMATION -->
                                <div class="col-span-12 sm:col-span-12 lg:col-span-7 xl:-ml-12 mt-2 pb-5">
                                    <div class="intro-y xl:ml-4 ml-2 pb-5 pr-5">
                                        <p class="font-sans text-base text-light-grey">We are pleased to have you & your organization as part of the TDR creditor member network,<br> please provide the following information so we can create a user account for you and<br> customize our deceased notification
                                            service to your needs & requirements.</p>
                                        <p class="font-sans text-base mt-4 text-light-grey">If at any point you have questions and need to speak to a client services representative, <br>please <span class="highlighted-text font-bold underline-blue">Contact Us</span> and a TDR representative will be happy
                                            to assist you.</p>
                                    </div>
                                    <div class="intro-y pt-4 px-5 xl:pl-5 pl-2 xl:-ml-16">
                                        <h2 class="font-bold highlighted-text font-sans text-lg  mr-5">
                                            1. Creditor Information
                                        </h2>
                                        <p class="font-sans text-base text-base-grey mt-2">Please fill in the following information on your organization.</p>
                                        <div class=" grid grid-cols-12 gap-4 row-gap-5 mt-5 ml-1">
                                      
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative mb-2 xl:mr-2 lg:mr-2">
                                                    <input name="name" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="creditor_name" type="text">
                                                    <label for="creditor_name" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">Creditor Name*</label>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative mb-2">
                                                    <input name="address" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="address" type="text">
                                                    <label for="address" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">Address*</label>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative mb-2 xl:mr-2 lg:mr-2">
                                                    <input name="division_or_brand" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="division_or_branch" type="text">
                                                    <label for="division_or_branch" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">Division or Branch</label>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative mb-2">
                                                    <input name="suite" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="suite" type="text">
                                                    <label for="address" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">Suite</label>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative xl:mr-2 lg:mr-2">
                                                    <input name="location" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="city_state_zip" type="text">
                                                    <label for="city_state_zip" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 text-light-grey-note text-base font-normal mt-2 cursor-text">City, State, Zip*</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <button class="button rounded-xs w-24 ml-auto pl-3 mt-4 pr-3 mb-2 bg-theme-dark-blue text-white" onclick="return register_validation(1);">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- BEGIN: CREDITOR INFORMATION -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BEGIN: CARD -->
                <div id="user_information" class="h-270 xl:h-screen p-4 lg:h-screen xl:mb-12 w-full py-5 xl:py-0 xl:my-0" style="display: none;">
                    <div class="intro-y box xl:mx-16 lg:mx-16 mx-auto rounded-xl pr-4 pl-4 xl:px-5 pt-5 xl:pb-4 mt-12   bg-white xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">

                                <!-- BEGIN: STEPS -->
                                <div class="col-span-12 lg:col-span-5 xl:ml-5">
                                    <h2 class="text-2xxl text-grey-39 xl:text-left font-sans">Welcome to
                                        <br>
                                        <span class="font-bold font-sans mb-10 text-4xl-blue text-4xl xl:text-left"> 
                                            The Decedent Registry!</span> </h2>
                                    <div class="border-b-61"></div>
                                    <div class="intro-y card-border-radius border-color-bc mt-8 xl:mt-20 w-auto w-21rem pt-4 pb-5 pl-7">
                                        <h2 class="font-sans font-semibold highlighted-text text-lg mr-2">
                                            Pre-on-board Creditor Member <br> Registration
                                        </h2>
                                        <div class="mt-4">
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 border-circle-filled bg-theme-dark-blue border-2 text-center font-bold text-white inline-block mt-5 pt-2em">1</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Creditor Information</span>
                                            </div>
                                            <div class="stepLine-filled"></div>
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 border-circle-filled border-2 text-center font-bold highlighted-text inline-block pt-2em">2</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">User Information</span>
                                            </div>
                                            <div class="stepLine"></div>
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 highlighted-text border-solid border-2 font-bold text-center inline-block pt-2em">3</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Customization</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: STEPS -->
                                <!-- BEGIN: USER INFORMATION -->
                                <div class="col-span-12 sm:col-span-12 lg:col-span-7 xl:-ml-12 mt-2 pb-5">
                                    <div class="intro-y xl:ml-4 ml-2 pb-5 pr-5">
                                        <p class="font-sans text-base text-light-grey">We are pleased to have you & your organization as part of the TDR creditor member network,<br> please provide the following information so we can create a user account for you and<br> customize our deceased notification
                                            service to your needs & requirements.</p>
                                        <p class="font-sans text-base mt-4 text-light-grey">If at any point you have questions and need to speak to a client services representative, <br>please <span class="highlighted-text font-bold underline-blue">Contact Us</span> and a TDR representative will be happy
                                            to assist you.</p>
                                    </div>
                                    <div class="intro-y pt-4 px-5 xl:pl-5 pl-2 xl:-ml-16">
                                        <h2 class="font-bold highlighted-text font-sans text-lg  mr-5">
                                            2. User Information
                                        </h2>
                                        <p class="font-sans text-base text-base-grey mt-2">We recommend your organization register two TDR users, but it is not necessary. </p>
                                        <div class=" grid grid-cols-12 gap-4 row-gap-5 mt-5 ml-1">

                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative mb-2 xl:mr-2 lg:mr-2">
                                                    <input name="users[0][name]"  class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="users_name" type="text">
                                                    <label for="user_name" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">User Name*</label>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative ">
                                                    <input name="users[0][title]" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="user_title" type="text">
                                                    <label for="user_title" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">User Title*</label>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative xl:mr-2 lg:mr-2">
                                                    <input name="users[0][phone]" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="user_phone_number" type="number">
                                                    <label for="user_phone_number" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">User Phone Number*</label>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="relative">
                                                    <input name="users[0][email]" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="user_email_add" type="email">
                                                    <label for="user_email_add" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">User Email Address*</label>
                                                </div>
                                            </div>


                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <label class="mb-2 text-light-grey-note font-sans">User Type*</label>
                                                <div class="relative xl:mr-2 lg:mr-2">
                                                 <select data-hide-search="true" name="users[0][user_type]" id="user_type" class="select2 w-full 3">
                                                     @foreach($user_types as $user_type)
                                                    <option value="{{$user_type->id}}" @if($user_type->is_primary == 1) selected @endif>{{$user_type->user_type}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="addrow" class=" mb-5 intro-y col-span-12">
                                            <div class="rowadded">
                                                <div>
                                                    <h4 class="mt-8 text-lg font-sans font-semibold text-base-grey" id="more_fields" onclick="add_fields();"> Add Additional User</h4>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        

                                        <div class="flex flex-row mt-8 ">
                                            <button type="button" class="button rounded-none ml-auto float-right pl-3 pr-3 w-24 mr-1 mb-2 font-medium text-gray-600" style="background-color: #e9f1f6!important" onclick="return register_validation(4)">Previous</button>
                                            <button class="button rounded-none w-24 ml-3 pl-3 pr-3 mb-2 bg-theme-dark-blue text-white" onclick="return register_validation(2)">Next</button>

                                        </div>
                                    </div>
                                </div>
                                <!-- END:  USER INFORMATION -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: CARD -->

                <div id="customization" class="h-260 xl:h-screen p-4 lg:h-screen xl:mb-12 w-full py-5 xl:py-0 xl:my-0" style="display: none;">
                    <div class="intro-y box xl:mx-16 lg:mx-16 mx-auto rounded-xl pr-4 pl-4 xl:px-5 pt-5 xl:pb-4 mt-12   bg-white xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">

                                <!-- BEGIN: STEPS -->
                                <div class="col-span-12 lg:col-span-5 xl:ml-5">
                                    <h2 class="text-2xxl text-grey-39 xl:text-left font-sans">Welcome to
                                        <br>
                                        <span class="font-bold font-sans mb-10 text-4xl-blue text-4xl xl:text-left"> 
                                            The Decedent Registry!</span> </h2>
                                    <div class="border-b-61"></div>
                                    <div class="intro-y card-border-radius border-color-bc mt-8 xl:mt-20 w-auto w-21rem pt-4 pb-5 pl-7">
                                        <h2 class="font-sans font-semibold highlighted-text text-lg mr-2">
                                            Pre-on-board Creditor Member <br> Registration
                                        </h2>
                                        <div class="mt-4">
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 border-circle-filled bg-theme-dark-blue border-2 text-center font-bold text-white inline-block mt-5 pt-2em">1</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Creditor Information</span>
                                            </div>
                                            <div class="stepLine-filled"></div>
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 border-circle-filled bg-theme-dark-blue text-white border-2 text-center font-bold inline-block pt-2em">2</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">User Information</span>
                                            </div>
                                            <div class="stepLine-filled"></div>
                                            <div class="-mt-2">
                                                <span class="rounded-full w-9 h-9 highlighted-text border-circle-filled border-2 font-bold text-center inline-block pt-2em">3</span>
                                                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Customization</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: STEPS -->
                                <!-- BEGIN: CUSTOMIZATION -->
                                <div class="col-span-12 sm:col-span-12 lg:col-span-7 xl:-ml-12 mt-2 pb-5">
                                    <div class="intro-y xl:ml-4 ml-2 pb-5 pr-5">
                                        <p class="font-sans text-base text-light-grey">We are pleased to have you & your organization as part of the TDR creditor member network,<br> please provide the following information so we can create a user account for you and<br> customize our deceased notification
                                            service to your needs & requirements.</p>

                                        <p class="font-sans text-base mt-4 text-light-grey">If at any point you have questions and need to speak to a client services representative, <br>please <span class="highlighted-text font-bold underline-blue">Contact Us</span> and a TDR representative will be happy
                                            to assist you.</p>
                                    </div>
                                    <div class="intro-y pt-4 px-5 xl:pl-5 pl-2 xl:-ml-16">
                                        <h2 class="font-bold highlighted-text font-sans text-lg  mr-5">
                                            3. Customization
                                        </h2>
                                        <p class="font-sans text-base text-base-grey mt-2">The following Questions are geared towards providing your organization with deceased reporting service suited to your company policies and preferences. </p>

                                        <div class="intro-y mt-5">
                                            <h4 class="text-base-grey font-sans font-semibold text-xl">1. Confirmed Accounts*</h4>
                                            <p class="text-eye-gray font-sans text-base mt-4">What information needs to be retrieved so that an account qualifies as a verified confirmed deceased Account?
                                            </p>
                                            <div class="flex flex-wrap mt-4">
                                                <div class="flex items-center text-gray-700 mr-8">
                                                    <input type="checkbox" name="confirmed_accounts" value="1" class="input border mr-4 filled" id="death_certificate" onclick="showDiv('hidden_div', this)">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="death_certificate">Death Certificate</label>
                                                </div>
                                                <div class="flex items-center text-gray-700 mr-2">
                                                    <input type="checkbox" name="confirmed_accounts" value="2" class="input border mr-4 filled" id="other" onclick="showDiv('hidden_div', this)">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="other">Other</label>
                                                </div>
                                            </div>
                                            <p class="text-eye-gray font-sans text-base mt-4">A. if other, Please provide details in the box below such as the type of proof required and it is in lieu of the death certificate or in addition to:
                                            </p>
                                            <div class="intro-y col-span-12 sm:col-span-12" id="hidden_div">
                                                <div class="relative mb-2 mt-4 xl:mr-2 lg:mr-2">
                                                    <input name ="is_other" class="input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none" id="is_other" type="text">
                                                    <label for="other_explanation" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text">Other Explanation</label>
                                                </div>
                                            </div>
                                            <h4 class="text-base-grey font-sans font-semibold mt-8 text-xl">2. Data Transfer*</h4>
                                            <p class="text-eye-gray font-sans text-base mt-4">Would you prefer data being transferred between TDR's central data be organization's Account Management System to be completely manually by your Administrator using our
                                            </p>
                                            <div class="flex flex-wrap mt-4">
                                                <div class="flex items-center text-gray-700 mr-8">
                                                    <input type="checkbox" name="data_transfer" value="1" class="input border mr-4 filled" id="web_portal">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="web_portal">Web-Portal via SFTP</label>
                                                </div>
                                                <div class="flex items-center text-gray-700 mr-2">
                                                    <input type="checkbox" name="data_transfer" value="2" class="input border mr-4 filled" id="api">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="api">Automatically via API </label>
                                                </div>
                                            </div>
                                            <h4 class="text-base-grey font-sans font-semibold mt-8 text-xl">3. Data Sharing*</h4>
                                            <p class="text-eye-gray font-sans text-base mt-4">In an effort to create the most complete central data base of deceased accounts, we are asking the creditors to contribute their deceased data and in return will benefit from the data shared by all other creditors
                                                in the TDR network. Is your organization willing to participate in this reciprocal network member relationship? </p>
                                            <div class="flex flex-wrap mt-4">
                                                <div class="flex items-center text-gray-700 mr-8">
                                                    <input type="checkbox" name="data_sharing" value="1" class="input border mr-4 filled" id="yes">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="yes">Yes</label>
                                                </div>
                                                <div class="flex items-center text-gray-700 mr-2">
                                                    <input type="checkbox" name="data_sharing" value="2" class="input border mr-4 filled" id="no">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="No">No </label>
                                                </div>
                                            </div>
                                            <h4 class="text-base-grey font-sans font-semibold mt-8 text-xl">4. White Label Web-Portal*</h4>
                                            <p class="text-eye-gray font-sans text-base mt-4">TDR offers the creditors the ability to "White Label" the TDR website, giving your customers the appearance, the deceased registry is compassionately being provided by your organization. Would you be interested
                                                in our Whitel Label program?</p>
                                            <div class="flex flex-wrap mt-4">
                                                <div class="flex items-center text-gray-700 mr-8">
                                                    <input type="checkbox" name="white_label_webportal" value="1" class="input border mr-4 filled" id="yes_white_label">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="yes_white_label">Yes</label>
                                                </div>
                                                <div class="flex items-center text-gray-700 mr-2">
                                                    <input type="checkbox" name="white_label_webportal" value="2" class="input border mr-4 filled" id="no_white_label">
                                                    <label class="cursor-pointer font-sans select-none text-base-grey font-semibold text-xl" for="no_white_label">No </label>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="flex flex-row mt-8 ">
                                            <button type="button" class="button rounded-none ml-auto float-right pl-3 pr-3 w-24 mr-1 mb-2 font-medium text-gray-600" style="background-color: #e9f1f6!important" onclick="return register_validation(5)">Previous</button>
                                            <button type="submit" class="button rounded-none w-24 ml-3 pl-3 pr-3 mb-2 bg-theme-dark-blue text-white" onclick="return register_validation(3)">Submit</button>

                                        </div>
                                    </div>
                                </div>
                                <!-- END:  CUSTOMIZATION -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        
@endsection

<script>  

var userCount = 0;

    function add_fields()
    {
        userCount++;
        var d = document.getElementById("addrow");
        d.innerHTML += "<br><div class='grid grid-cols-12 gap-4 row-gap-5 mt-5 ml-1'><div class='intro-y col-span-12 sm:col-span-6'><div class='relative mb-2 xl:mr-2 lg:mr-2'><input name='users["+ userCount +"][name]' class='input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none' id='users_name' type='text'><label for='user_name' class='label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text'>User Name*</label></div></div><div class='intro-y col-span-12 sm:col-span-6'><div class='relative'><input name='users["+ userCount +"][title]' class='input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none' id='user_title' type='text'><label for='user_title' class='label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text'>User Title*</label></div></div><div class='intro-y col-span-12 sm:col-span-6'><div class='relative xl:mr-2 lg:mr-2'><input name='users["+ userCount +"][phone]' class='input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none' id='user_phone_number' type='number'><label for='user_phone_number' class='label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text'>User Phone Number*</label></div></div><div class='intro-y col-span-12 sm:col-span-6'><div class='relative'><input name='users["+ userCount +"][email]' class='input border border-cd appearance-none rounded-xs w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none' id='user_email_add' type='email'><label for='user_email_add' class='label font-sans absolute mb-0 -mt-2 pt-4 pl-3  text-light-grey-note text-base mt-2 cursor-text'>User Email Address*</label></div></div><div class='intro-y col-span-12 sm:col-span-6'><label class='mb-2 text-light-grey-note font-sans'>User Type*</label><div class='relative xl:mr-2 lg:mr-2'><select data-hide-search='true' name='users["+ userCount +"][user_type]' id='user_type' style='width:100%!important;' class='select2 w-full 3'> <?php foreach ($user_types as $user_type): ?><option value='@php echo $user_type->id @endphp' @if($user_type->is_primary == 1)  selected  @endif> @php echo $user_type->user_type; @endphp</option><?php endforeach; ?></select></div></div></div>";
        var rowCount = $('#addrow .rowadded').length;
        $('#user_information').css('margin-bottom','+=14rem');
    }


</script>

<script src="{{asset('assets/js/creditor/register_validation.js')}}"></script>
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
  

