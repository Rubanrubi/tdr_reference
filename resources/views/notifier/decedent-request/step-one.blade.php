@extends('notifier.decedent-request.layout')

@section('title')
    Step one
@endsection

@section('custom-styles')
    <style>
        input#phoneNumber {
            border-radius: 0px 6px 6px 1px;
            height: 51px;
            width: 81%;
            margin: -5px !important;
        }

        .phone-list select {
            display: inline-block;
            height: 51px;
            padding-left: 10px;
            width: 20%;
            border: 1px solid #cbd5e0;
            border-radius: 5px 0px 0px 5px;
            padding-top: 5px;
            padding-bottom: 2px;
        }

        /*.switch-label:after {
            content: attr(data-off);
            left: 11px;
            color: #fff !important;
            text-shadow: 0 1px rgba(0, 0, 0, 0.2);
            opacity: 0;
        }

        .switch-label:after {
            content: attr(data-on);
            left: 11px;
            color: #fff !important;
            text-shadow: 0 1px rgba(0, 0, 0, 0.2);
            opacity: 0;
        }*/
    </style>
@endsection

@section('content')

@php
    $input_class = "input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900";
@endphp

<!-- BEGIN: Notifier Information -->
<div class="col-span-12 sm:col-span-12 lg:col-span-8">

    <div class="intro-y box p-5 ">
        <form method="POST" action="{{route('decedent.request.stepone')}}">
            @csrf
            <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                1. Notifier Information
            </h2>
            <input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}">
            @php
              $draft_id = isset($data->id)?$data->id:"";
            @endphp
            <input type="hidden" id="draft_id" value="{{$draft_id}}">
            <input type="hidden" id="id" name="id" value="{{$draft_id}}">
            @php
                $probate_applied = 1;
                if(old('probate_applied')){
                    $probate_applied = old('probate_applied');
                }elseif (isset($data->probate_applied)){
                    $probate_applied = $data->probate_applied;
                }
            @endphp
            <input type="hidden" name="probate_applied" id="probate_applied" value="{{$probate_applied}}">
            @php
                $person_dealing_with_estate = 1;
                if(old('person_dealing_with_estate')){
                    $person_dealing_with_estate = old('person_dealing_with_estate');
                }elseif (isset($data->person_dealing_with_estate)){
                    $person_dealing_with_estate = $data->person_dealing_with_estate;
                }
            @endphp
            <input type="hidden" name="person_dealing_with_estate" id="person_dealing_with_estate" value="{{$person_dealing_with_estate}}">
            @php
                $is_verify_identity = 1;
                if(old('is_verify_identity')){
                    $is_verify_identity = old('is_verify_identity');
                }elseif (isset($data->is_verify_identity)){
                    $is_verify_identity = $data->is_verify_identity;
                }
            @endphp
            <input type="hidden" id="is_verify_identity" name="is_verify_identity" value="{{$is_verify_identity}}">
            @php
                $available_for_contact = 1;
                if(old('available_for_contact')){
                    $available_for_contact = old('available_for_contact');
                }elseif (isset($data->available_for_contact)){
                    $available_for_contact = $data->available_for_contact;
                }
            @endphp
            <input type="hidden" name="available_for_contact" id="available_for_contact" value="{{$available_for_contact}}">
            @php
                $email_available_for_contact = 0;
                if(old('available_for_contact')){
                    $email_available_for_contact = old('email_available_for_contact');
                }elseif (isset($data->email_available_for_contact)){
                    $email_available_for_contact = $data->email_available_for_contact;
                }
            @endphp
            <input type="hidden" name="email_available_for_contact" id="email_available_for_contact" value="{{$email_available_for_contact}}">
            @php
                $phone_number_available_for_contact = 0;
                if(old('phone_number_available_for_contact')){
                    $phone_number_available_for_contact = old('phone_number_available_for_contact');
                }elseif (isset($data->phone_number_available_for_contact)){
                    $phone_number_available_for_contact = $data->phone_number_available_for_contact;
                }
            @endphp
            <input type="hidden" name="phone_number_available_for_contact" id="phone_number_available_for_contact" value="{{$phone_number_available_for_contact}}">
            @php
                $mail_available_for_contact = 0;
                if(old('mail_available_for_contact')){
                    $mail_available_for_contact = old('mail_available_for_contact');
                }elseif (isset($data->mail_available_for_contact)){
                    $mail_available_for_contact = $data->mail_available_for_contact;
                }
            @endphp
            <input type="hidden" name="mail_available_for_contact" id="mail_available_for_contact" value="{{$mail_available_for_contact}}">
            <input name="request_stage" type="hidden" value="1" id="request_stage">

            <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                @php
                    $name = Auth::user()->name;
                    if(old('name')){
                        $name = old('name');
                    }elseif (isset($data->name)){
                        $name = $data->name;
                    }
                @endphp
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="relative">
                        <input required value="{{$name}}" class="{{$input_class}}"  id="name" autocomplete="new-name" name="name" type="text">
                        <label for="name" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Name</label>
                    </div>
                </div>
                @php
                    $address = "";
                    if(old('address')){
                        $address = old('address');
                    }elseif (isset($data->address)){
                        $address = $data->address;
                    }
                @endphp
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="relative">
                        <input required value="{{$address}}" class="{{$input_class}}" id="address" noDraft="true" autocomplete="new-address" name="address" placeholder="&nbsp;" type="text">
                        <label for="address" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Address</label>
                    </div>
                </div>
                @php
                    $email = Auth::user()->email;
                    if(old('email')){
                        $email = old('email');
                    }elseif (isset($data->email)){
                        $email = $data->email;
                    }
                @endphp
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="relative">
                        <input required value="{{$email}}" class="{{$input_class}}" id="email" autocomplete="new-email" name="email" type="email">
                        <label for="email" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">
                            Email Address
                        </label>
                    </div>
                </div>

                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="phone-list">
                        <select name="country_code" id="countryCode" style="cursor: pointer;">
                            <optgroup>
                                <option data-countryCode="DZ" value="213">+213</option>
                                <option data-countryCode="AD" value="376">+376</option>
                                <option data-countryCode="AO" value="244">+244</option>
                                <option data-countryCode="AI" value="1264">+1264</option>
                                <option data-countryCode="AG" value="1268">+1268</option>
                                <option data-countryCode="AR" value="54">+54</option>
                                <option data-countryCode="AM" value="374">+374</option>
                                <option data-countryCode="AW" value="297">+297</option>
                                <option data-countryCode="AU" selected value="61">+61</option>
                                <option data-countryCode="AT" value="43">+43</option>
                                <option data-countryCode="AZ" value="994">+994</option>
                                <option data-countryCode="BS" value="1242">+1242</option>
                                <option data-countryCode="BH" value="973">+973</option>
                                <option data-countryCode="BD" value="880">+880</option>
                                <option data-countryCode="BB" value="1246">+1246</option>
                                <option data-countryCode="BY" value="375">+375</option>
                                <option data-countryCode="BE" value="32">+32</option>
                                <option data-countryCode="BZ" value="501">+501</option>
                                <option data-countryCode="BJ" value="229">+229</option>
                                <option data-countryCode="BM" value="1441">+1441</option>
                                <option data-countryCode="BT" value="975">+975</option>
                                <option data-countryCode="BO" value="591">+591</option>
                                <option data-countryCode="BA" value="387">+387</option>
                                <option data-countryCode="BW" value="267">+267</option>
                                <option data-countryCode="BR" value="55">+55</option>
                                <option data-countryCode="BN" value="673">+673</option>
                                <option data-countryCode="BG" value="359">+359</option>
                                <option data-countryCode="BF" value="226"> +226</option>
                                <option data-countryCode="BI" value="257">+257</option>
                                <option data-countryCode="KH" value="855"> +855</option>
                                <option data-countryCode="CM" value="237"> +237</option>
                                <option data-countryCode="CA" value="1"> +1</option>
                                <option data-countryCode="CV" value="238"> +238</option>
                                <option data-countryCode="KY" value="1345"> +1345</option>
                                <option data-countryCode="CF" value="236"> +236</option>
                                <option data-countryCode="CL" value="56"> +56</option>
                                <option data-countryCode="CN" value="86"> +86</option>
                                <option data-countryCode="CO" value="57"> +57</option>
                                <option data-countryCode="KM" value="269"> +269</option>
                                <option data-countryCode="CG" value="242"> +242</option>
                                <option data-countryCode="CK" value="682"> +682</option>
                                <option data-countryCode="CR" value="506"> +506</option>
                                <option data-countryCode="HR" value="385"> +385</option>
                                <option data-countryCode="CU" value="53"> +53</option>
                                <option data-countryCode="CY" value="90392"> +90392</option>
                                <option data-countryCode="CY" value="357"> +357</option>
                                <option data-countryCode="CZ" value="42"> +42</option>
                                <option data-countryCode="DK" value="45"> +45</option>
                                <option data-countryCode="DJ" value="253"> +253</option>
                                <option data-countryCode="DM" value="1809"> +1809</option>
                                <option data-countryCode="DO" value="1809"> +1809</option>
                                <option data-countryCode="EC" value="593"> +593</option>
                                <option data-countryCode="EG" value="20"> +20</option>
                                <option data-countryCode="SV" value="503">+503</option>
                                <option data-countryCode="GQ" value="240"> +240</option>
                                <option data-countryCode="ER" value="291"> +291</option>
                                <option data-countryCode="EE" value="372"> +372</option>
                                <option data-countryCode="ET" value="251"> +251</option>
                                <option data-countryCode="FK" value="500">+500</option>
                                <option data-countryCode="FO" value="298"> +298</option>
                                <option data-countryCode="FJ" value="679"> +679</option>
                                <option data-countryCode="FI" value="358"> +358</option>
                                <option data-countryCode="FR" value="33"> +33</option>
                                <option data-countryCode="GF" value="594"> +594</option>
                                <option data-countryCode="PF" value="689"> +689</option>
                                <option data-countryCode="GA" value="241"> +241</option>
                                <option data-countryCode="GM" value="220"> +220</option>
                                <option data-countryCode="GE" value="7880"> +7880</option>
                                <option data-countryCode="DE" value="49"> +49</option>
                                <option data-countryCode="GH" value="233"> +233</option>
                                <option data-countryCode="GI" value="350"> +350</option>
                                <option data-countryCode="GR" value="30"> +30</option>
                                <option data-countryCode="GL" value="299"> +299</option>
                                <option data-countryCode="GD" value="1473"> +1473</option>
                                <option data-countryCode="GP" value="590"> +590</option>
                                <option data-countryCode="GU" value="671"> +671</option>
                                <option data-countryCode="GT" value="502"> +502</option>
                                <option data-countryCode="GN" value="224"> +224</option>
                                <option data-countryCode="GW" value="245"> +245</option>
                                <option data-countryCode="GY" value="592"> +592</option>
                                <option data-countryCode="HT" value="509"> +509</option>
                                <option data-countryCode="HN" value="504"> +504</option>
                                <option data-countryCode="HK" value="852"> +852</option>
                                <option data-countryCode="HU" value="36"> +36</option>
                                <option data-countryCode="IS" value="354"> +354</option>
                                <option data-countryCode="IN" value="91"> +91</option>
                                <option data-countryCode="ID" value="62"> +62</option>
                                <option data-countryCode="IR" value="98"> +98</option>
                                <option data-countryCode="IQ" value="964"> +964</option>
                                <option data-countryCode="IE" value="353"> +353</option>
                                <option data-countryCode="IL" value="972"> +972</option>
                                <option data-countryCode="IT" value="39"> +39</option>
                                <option data-countryCode="JM" value="1876"> +1876</option>
                                <option data-countryCode="JP" value="81"> +81</option>
                                <option data-countryCode="JO" value="962"> +962</option>
                                <option data-countryCode="KZ" value="7"> +7</option>
                                <option data-countryCode="KE" value="254"> +254</option>
                                <option data-countryCode="KI" value="686"> +686</option>
                                <option data-countryCode="KP" value="850"> +850</option>
                                <option data-countryCode="KR" value="82"> +82</option>
                                <option data-countryCode="KW" value="965"> +965</option>
                                <option data-countryCode="KG" value="996"> +996</option>
                                <option data-countryCode="LA" value="856"> +856</option>
                                <option data-countryCode="LV" value="371"> +371</option>
                                <option data-countryCode="LB" value="961"> +961</option>
                                <option data-countryCode="LS" value="266"> +266</option>
                                <option data-countryCode="LR" value="231"> +231</option>
                                <option data-countryCode="LY" value="218"> +218</option>
                                <option data-countryCode="LI" value="417"> +417</option>
                                <option data-countryCode="LT" value="370"> +370</option>
                                <option data-countryCode="LU" value="352"> +352</option>
                                <option data-countryCode="MO" value="853"> +853</option>
                                <option data-countryCode="MK" value="389"> +389</option>
                                <option data-countryCode="MG" value="261"> +261</option>
                                <option data-countryCode="MW" value="265"> +265</option>
                                <option data-countryCode="MY" value="60"> +60</option>
                                <option data-countryCode="MV" value="960"> +960</option>
                                <option data-countryCode="ML" value="223"> +223</option>
                                <option data-countryCode="MT" value="356"> +356</option>
                                <option data-countryCode="MH" value="692"> +692</option>
                                <option data-countryCode="MQ" value="596"> +596</option>
                                <option data-countryCode="MR" value="222"> +222</option>
                                <option data-countryCode="YT" value="269"> +269</option>
                                <option data-countryCode="MX" value="52"> +52</option>
                                <option data-countryCode="FM" value="691"> +691</option>
                                <option data-countryCode="MD" value="373"> +373</option>
                                <option data-countryCode="MC" value="377"> +377</option>
                                <option data-countryCode="MN" value="976"> +976</option>
                                <option data-countryCode="MS" value="1664"> +1664</option>
                                <option data-countryCode="MA" value="212"> +212</option>
                                <option data-countryCode="MZ" value="258"> +258</option>
                                <option data-countryCode="MN" value="95"> +95</option>
                                <option data-countryCode="NA" value="264"> +264</option>
                                <option data-countryCode="NR" value="674"> +674</option>
                                <option data-countryCode="NP" value="977"> +977</option>
                                <option data-countryCode="NL" value="31"> +31</option>
                                <option data-countryCode="NC" value="687"> +687</option>
                                <option data-countryCode="NZ" value="64"> +64</option>
                                <option data-countryCode="NI" value="505"> +505</option>
                                <option data-countryCode="NE" value="227"> +227</option>
                                <option data-countryCode="NG" value="234"> +234</option>
                                <option data-countryCode="NU" value="683"> +683</option>
                                <option data-countryCode="NF" value="672"> +672</option>
                                <option data-countryCode="NP" value="670"> +670</option>
                                <option data-countryCode="NO" value="47"> +47</option>
                                <option data-countryCode="OM" value="968"> +968</option>
                                <option data-countryCode="PW" value="680"> +680</option>
                                <option data-countryCode="PA" value="507"> +507</option>
                                <option data-countryCode="PG" value="675"> +675</option>
                                <option data-countryCode="PY" value="595"> +595</option>
                                <option data-countryCode="PE" value="51"> +51</option>
                                <option data-countryCode="PH" value="63"> +63</option>
                                <option data-countryCode="PL" value="48"> +48</option>
                                <option data-countryCode="PT" value="351"> +351</option>
                                <option data-countryCode="PR" value="1787"> +1787</option>
                                <option data-countryCode="QA" value="974"> +974</option>
                                <option data-countryCode="RE" value="262"> +262</option>
                                <option data-countryCode="RO" value="40"> +40</option>
                                <option data-countryCode="RU" value="7"> +7</option>
                                <option data-countryCode="RW" value="250"> +250</option>
                                <option data-countryCode="SM" value="378">+378</option>
                                <option data-countryCode="ST" value="239">+239</option>
                                <option data-countryCode="SA" value="966"> +966</option>
                                <option data-countryCode="SN" value="221"> +221</option>
                                <option data-countryCode="CS" value="381"> +381</option>
                                <option data-countryCode="SC" value="248"> +248</option>
                                <option data-countryCode="SL" value="232"> +232</option>
                                <option data-countryCode="SG" value="65"> +65</option>
                                <option data-countryCode="SK" value="421"> +421</option>
                                <option data-countryCode="SI" value="386"> +386</option>
                                <option data-countryCode="SB" value="677"> +677</option>
                                <option data-countryCode="SO" value="252"> +252</option>
                                <option data-countryCode="ZA" value="27"> +27</option>
                                <option data-countryCode="ES" value="34"> +34</option>
                                <option data-countryCode="LK" value="94">+94</option>
                                <option data-countryCode="SH" value="290">+290</option>
                                <option data-countryCode="KN" value="1869"> +1869</option>
                                <option data-countryCode="SC" value="1758"> +1758</option>
                                <option data-countryCode="SD" value="249"> +249</option>
                                <option data-countryCode="SR" value="597"> +597</option>
                                <option data-countryCode="SZ" value="268"> +268</option>
                                <option data-countryCode="SE" value="46"> +46</option>
                                <option data-countryCode="CH" value="41"> +41</option>
                                <option data-countryCode="SI" value="963"> +963</option>
                                <option data-countryCode="TW" value="886"> +886</option>
                                <option data-countryCode="TJ" value="7"> +7</option>
                                <option data-countryCode="TH" value="66"> +66</option>
                                <option data-countryCode="TG" value="228"> +228</option>
                                <option data-countryCode="TO" value="676"> +676</option>
                                <option data-countryCode="TT" value="1868"> +1868</option>
                                <option data-countryCode="TN" value="216"> +216</option>
                                <option data-countryCode="TR" value="90"> +90</option>
                                <option data-countryCode="TM" value="7"> +7</option>
                                <option data-countryCode="TM" value="993"> +993</option>
                                <option data-countryCode="TC" value="1649"> +1649</option>
                                <option data-countryCode="TV" value="688"> +688</option>
                                <option data-countryCode="UG" value="256"> +256</option>
                                <!-- <option data-countryCode="GB" value="44">UK +44</option> -->
                                <option data-countryCode="UA" value="380"> +380</option>
                                <option data-countryCode="AE" value="971"> +971</option>
                                <option data-countryCode="UY" value="598"> +598</option>
                                <!-- <option data-countryCode="US" value="1">USA +1</option> -->
                                <option data-countryCode="UZ" value="7"> +7</option>
                                <option data-countryCode="VU" value="678"> +678</option>
                                <option data-countryCode="VA" value="379"> +379</option>
                                <option data-countryCode="VE" value="58"> +58</option>
                                <option data-countryCode="VN" value="84"> +84</option>
                                <option data-countryCode="VG" value="84"> +1284</option>
                                <option data-countryCode="VI" value="84"> +1340</option>
                                <option data-countryCode="WF" value="681"> +681</option>
                                <option data-countryCode="YE" value="969">+969</option>
                                <option data-countryCode="YE" value="967">+967</option>
                                <option data-countryCode="ZM" value="260"> +260</option>
                                <option data-countryCode="ZW" value="263"> +263</option>
                            </optgroup>
                        </select>
                        @php
                            $phone_number = "";
                            if(old('phone_number')){
                                $phone_number = old('phone_number');
                            }elseif (isset($data->phone_number)){
                                $phone_number = $data->phone_number;
                            }
                        @endphp
                        <input type="text" value="{{$phone_number}}" onkeypress="numericInput();" autocomplete="new-phone_number" name="phone_number" id="phoneNumber" class="font-sans text-base border-gray-400 input w-full border flex-1" placeholder="Phone number">
                    </div>
                </div>
                @php
                    $relationship = "";
                    if(old('relationship')){
                        $relationship = old('relationship');
                    }elseif (isset($data->relationship)){
                        $relationship = $data->relationship;
                    }
                @endphp
                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="relative">
                        <input required value="{{$relationship}}" class="{{$input_class}}" autocomplete="new-relationship" id="relationship" name="relationship" type="text">
                        <label for="relationship" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">
                            Relationship to the deceased*
                        </label>
                    </div>
                </div>

                <div class="intro-y col-span-12 sm:col-span-12">
                    <div class="intro-y inline-block w-54">
                        <div class="mb-2 font-sans sm:text-lg md:text-md font-semibold">
                            Are you the person dealing with the estate?*
                        </div>
                    </div>

                    <div class="intro-y inline-block w-54 toggle-block1">
                        <div class="can-toggle">
                            <input onclick="toggleCheckbox('person_dealing_with_estate',true,'person_dealing_with_estate')" @if($person_dealing_with_estate==0) checked @endif class="switch-input" type="checkbox" id="estate_person" />
                            <label for="estate_person">
                                <div class="can-toggle__switch" data-unchecked="YES" data-checked="NO"></div>
                            </label>
                        </div>
                    </div>

                </div>


                <div class="intro-y col-span-12 sm:col-span-6 is_not_estate_person person_dealing_with_estate">
                    <div class="phone-list">

                        <select name="person_dealing_country_code" id="" style="cursor: pointer;">

                            <optgroup>
                                <option data-countryCode="DZ" value="213"> +213</option>
                                <option data-countryCode="AD" value="376"> +376</option>
                                <option data-countryCode="AO" value="244"> +244</option>
                                <option data-countryCode="AI" value="1264"> +1264</option>
                                <option data-countryCode="AG" value="1268"> +1268</option>
                                <option data-countryCode="AR" value="54"> +54</option>
                                <option data-countryCode="AM" value="374"> +374</option>
                                <option data-countryCode="AW" value="297"> +297</option>
                                <option data-countryCode="AU" selected value="61"> +61</option>
                                <option data-countryCode="AT" value="43"> +43</option>
                                <option data-countryCode="AZ" value="994"> +994</option>
                                <option data-countryCode="BS" value="1242"> +1242</option>
                                <option data-countryCode="BH" value="973"> +973</option>
                                <option data-countryCode="BD" value="880"> +880</option>
                                <option data-countryCode="BB" value="1246"> +1246</option>
                                <option data-countryCode="BY" value="375"> +375</option>
                                <option data-countryCode="BE" value="32"> +32</option>
                                <option data-countryCode="BZ" value="501"> +501</option>
                                <option data-countryCode="BJ" value="229"> +229</option>
                                <option data-countryCode="BM" value="1441"> +1441</option>
                                <option data-countryCode="BT" value="975"> +975</option>
                                <option data-countryCode="BO" value="591"> +591</option>
                                <option data-countryCode="BA" value="387"> +387</option>
                                <option data-countryCode="BW" value="267"> +267</option>
                                <option data-countryCode="BR" value="55"> +55</option>
                                <option data-countryCode="BN" value="673"> +673</option>
                                <option data-countryCode="BG" value="359"> +359</option>
                                <option data-countryCode="BF" value="226"> +226</option>
                                <option data-countryCode="BI" value="257"> +257</option>
                                <option data-countryCode="KH" value="855"> +855</option>
                                <option data-countryCode="CM" value="237"> +237</option>
                                <option data-countryCode="CA" value="1"> +1</option>
                                <option data-countryCode="CV" value="238"> +238</option>
                                <option data-countryCode="KY" value="1345"> +1345</option>
                                <option data-countryCode="CF" value="236"> +236</option>
                                <option data-countryCode="CL" value="56"> +56</option>
                                <option data-countryCode="CN" value="86"> +86</option>
                                <option data-countryCode="CO" value="57"> +57</option>
                                <option data-countryCode="KM" value="269"> +269</option>
                                <option data-countryCode="CG" value="242"> +242</option>
                                <option data-countryCode="CK" value="682"> +682</option>
                                <option data-countryCode="CR" value="506"> +506</option>
                                <option data-countryCode="HR" value="385"> +385</option>
                                <option data-countryCode="CU" value="53"> +53</option>
                                <option data-countryCode="CY" value="90392"> +90392</option>
                                <option data-countryCode="CY" value="357"> +357</option>
                                <option data-countryCode="CZ" value="42"> +42</option>
                                <option data-countryCode="DK" value="45"> +45</option>
                                <option data-countryCode="DJ" value="253"> +253</option>
                                <option data-countryCode="DM" value="1809"> +1809</option>
                                <option data-countryCode="DO" value="1809"> +1809</option>
                                <option data-countryCode="EC" value="593"> +593</option>
                                <option data-countryCode="EG" value="20"> +20</option>
                                <option data-countryCode="SV" value="503"> +503</option>
                                <option data-countryCode="GQ" value="240"> +240</option>
                                <option data-countryCode="ER" value="291"> +291</option>
                                <option data-countryCode="EE" value="372"> +372</option>
                                <option data-countryCode="ET" value="251"> +251</option>
                                <option data-countryCode="FK" value="500"> +500</option>
                                <option data-countryCode="FO" value="298"> +298</option>
                                <option data-countryCode="FJ" value="679"> +679</option>
                                <option data-countryCode="FI" value="358"> +358</option>
                                <option data-countryCode="FR" value="33"> +33</option>
                                <option data-countryCode="GF" value="594"> +594</option>
                                <option data-countryCode="PF" value="689"> +689</option>
                                <option data-countryCode="GA" value="241"> +241</option>
                                <option data-countryCode="GM" value="220"> +220</option>
                                <option data-countryCode="GE" value="7880"> +7880</option>
                                <option data-countryCode="DE" value="49"> +49</option>
                                <option data-countryCode="GH" value="233"> +233</option>
                                <option data-countryCode="GI" value="350"> +350</option>
                                <option data-countryCode="GR" value="30"> +30</option>
                                <option data-countryCode="GL" value="299"> +299</option>
                                <option data-countryCode="GD" value="1473"> +1473</option>
                                <option data-countryCode="GP" value="590"> +590</option>
                                <option data-countryCode="GU" value="671"> +671</option>
                                <option data-countryCode="GT" value="502"> +502</option>
                                <option data-countryCode="GN" value="224"> +224</option>
                                <option data-countryCode="GW" value="245"> +245</option>
                                <option data-countryCode="GY" value="592"> +592</option>
                                <option data-countryCode="HT" value="509"> +509</option>
                                <option data-countryCode="HN" value="504"> +504</option>
                                <option data-countryCode="HK" value="852"> +852</option>
                                <option data-countryCode="HU" value="36"> +36</option>
                                <option data-countryCode="IS" value="354"> +354</option>
                                <option data-countryCode="IN" value="91"> +91</option>
                                <option data-countryCode="ID" value="62"> +62</option>
                                <option data-countryCode="IR" value="98"> +98</option>
                                <option data-countryCode="IQ" value="964"> +964</option>
                                <option data-countryCode="IE" value="353"> +353</option>
                                <option data-countryCode="IL" value="972"> +972</option>
                                <option data-countryCode="IT" value="39"> +39</option>
                                <option data-countryCode="JM" value="1876"> +1876</option>
                                <option data-countryCode="JP" value="81"> +81</option>
                                <option data-countryCode="JO" value="962"> +962</option>
                                <option data-countryCode="KZ" value="7"> +7</option>
                                <option data-countryCode="KE" value="254"> +254</option>
                                <option data-countryCode="KI" value="686"> +686</option>
                                <option data-countryCode="KP" value="850"> +850</option>
                                <option data-countryCode="KR" value="82"> +82</option>
                                <option data-countryCode="KW" value="965"> +965</option>
                                <option data-countryCode="KG" value="996"> +996</option>
                                <option data-countryCode="LA" value="856"> +856</option>
                                <option data-countryCode="LV" value="371"> +371</option>
                                <option data-countryCode="LB" value="961"> +961</option>
                                <option data-countryCode="LS" value="266"> +266</option>
                                <option data-countryCode="LR" value="231"> +231</option>
                                <option data-countryCode="LY" value="218"> +218</option>
                                <option data-countryCode="LI" value="417"> +417</option>
                                <option data-countryCode="LT" value="370"> +370</option>
                                <option data-countryCode="LU" value="352"> +352</option>
                                <option data-countryCode="MO" value="853"> +853</option>
                                <option data-countryCode="MK" value="389"> +389</option>
                                <option data-countryCode="MG" value="261"> +261</option>
                                <option data-countryCode="MW" value="265"> +265</option>
                                <option data-countryCode="MY" value="60"> +60</option>
                                <option data-countryCode="MV" value="960"> +960</option>
                                <option data-countryCode="ML" value="223"> +223</option>
                                <option data-countryCode="MT" value="356"> +356</option>
                                <option data-countryCode="MH" value="692"> +692</option>
                                <option data-countryCode="MQ" value="596"> +596</option>
                                <option data-countryCode="MR" value="222"> +222</option>
                                <option data-countryCode="YT" value="269"> +269</option>
                                <option data-countryCode="MX" value="52"> +52</option>
                                <option data-countryCode="FM" value="691"> +691</option>
                                <option data-countryCode="MD" value="373"> +373</option>
                                <option data-countryCode="MC" value="377"> +377</option>
                                <option data-countryCode="MN" value="976"> +976</option>
                                <option data-countryCode="MS" value="1664"> +1664</option>
                                <option data-countryCode="MA" value="212"> +212</option>
                                <option data-countryCode="MZ" value="258"> +258</option>
                                <option data-countryCode="MN" value="95"> +95</option>
                                <option data-countryCode="NA" value="264"> +264</option>
                                <option data-countryCode="NR" value="674"> +674</option>
                                <option data-countryCode="NP" value="977"> +977</option>
                                <option data-countryCode="NL" value="31"> +31</option>
                                <option data-countryCode="NC" value="687"> +687</option>
                                <option data-countryCode="NZ" value="64"> +64</option>
                                <option data-countryCode="NI" value="505"> +505</option>
                                <option data-countryCode="NE" value="227"> +227</option>
                                <option data-countryCode="NG" value="234"> +234</option>
                                <option data-countryCode="NU" value="683"> +683</option>
                                <option data-countryCode="NF" value="672"> +672</option>
                                <option data-countryCode="NP" value="670"> +670</option>
                                <option data-countryCode="NO" value="47"> +47</option>
                                <option data-countryCode="OM" value="968"> +968</option>
                                <option data-countryCode="PW" value="680"> +680</option>
                                <option data-countryCode="PA" value="507"> +507</option>
                                <option data-countryCode="PG" value="675"> +675</option>
                                <option data-countryCode="PY" value="595"> +595</option>
                                <option data-countryCode="PE" value="51"> +51</option>
                                <option data-countryCode="PH" value="63"> +63</option>
                                <option data-countryCode="PL" value="48"> +48</option>
                                <option data-countryCode="PT" value="351"> +351</option>
                                <option data-countryCode="PR" value="1787"> +1787</option>
                                <option data-countryCode="QA" value="974"> +974</option>
                                <option data-countryCode="RE" value="262"> +262</option>
                                <option data-countryCode="RO" value="40"> +40</option>
                                <option data-countryCode="RU" value="7"> +7</option>
                                <option data-countryCode="RW" value="250"> +250</option>
                                <option data-countryCode="SM" value="378">+378</option>
                                <option data-countryCode="ST" value="239">+239</option>
                                <option data-countryCode="SA" value="966"> +966</option>
                                <option data-countryCode="SN" value="221"> +221</option>
                                <option data-countryCode="CS" value="381"> +381</option>
                                <option data-countryCode="SC" value="248"> +248</option>
                                <option data-countryCode="SL" value="232"> +232</option>
                                <option data-countryCode="SG" value="65"> +65</option>
                                <option data-countryCode="SK" value="421"> +421</option>
                                <option data-countryCode="SI" value="386"> +386</option>
                                <option data-countryCode="SB" value="677"> +677</option>
                                <option data-countryCode="SO" value="252"> +252</option>
                                <option data-countryCode="ZA" value="27"> +27</option>
                                <option data-countryCode="ES" value="34"> +34</option>
                                <option data-countryCode="LK" value="94">+94</option>
                                <option data-countryCode="SH" value="290">+290</option>
                                <option data-countryCode="KN" value="1869"> +1869</option>
                                <option data-countryCode="SC" value="1758"> +1758</option>
                                <option data-countryCode="SD" value="249"> +249</option>
                                <option data-countryCode="SR" value="597"> +597</option>
                                <option data-countryCode="SZ" value="268"> +268</option>
                                <option data-countryCode="SE" value="46"> +46</option>
                                <option data-countryCode="CH" value="41"> +41</option>
                                <option data-countryCode="SI" value="963"> +963</option>
                                <option data-countryCode="TW" value="886"> +886</option>
                                <option data-countryCode="TJ" value="7"> +7</option>
                                <option data-countryCode="TH" value="66"> +66</option>
                                <option data-countryCode="TG" value="228"> +228</option>
                                <option data-countryCode="TO" value="676"> +676</option>
                                <option data-countryCode="TT" value="1868"> +1868</option>
                                <option data-countryCode="TN" value="216"> +216</option>
                                <option data-countryCode="TR" value="90"> +90</option>
                                <option data-countryCode="TM" value="7"> +7</option>
                                <option data-countryCode="TM" value="993"> +993</option>
                                <option data-countryCode="TC" value="1649"> +1649</option>
                                <option data-countryCode="TV" value="688"> +688</option>
                                <option data-countryCode="UG" value="256"> +256</option>
                                <option data-countryCode="GB" value="44"> +44</option>
                                <option data-countryCode="UA" value="380"> +380</option>
                                <option data-countryCode="AE" value="971"> +971</option>
                                <option data-countryCode="UY" value="598"> +598</option>
                                <option data-countryCode="US" value="1"> +1</option>
                                <option data-countryCode="UZ" value="7"> +7</option>
                                <option data-countryCode="VU" value="678"> +678</option>
                                <option data-countryCode="VA" value="379"> +379</option>
                                <option data-countryCode="VE" value="58"> +58</option>
                                <option data-countryCode="VN" value="84"> +84</option>
                                <option data-countryCode="VG" value="84"> +1284</option>
                                <option data-countryCode="VI" value="84"> +1340</option>
                                <option data-countryCode="WF" value="681"> +681</option>
                                <option data-countryCode="YE" value="969">+969</option>
                                <option data-countryCode="YE" value="967">+967</option>
                                <option data-countryCode="ZM" value="260"> +260</option>
                                <option data-countryCode="ZW" value="263"> +263</option>
                            </optgroup>
                        </select>
                        @php
                            $person_dealing_phone_number = "";
                            if(old('person_dealing_phone_number')){
                                $person_dealing_phone_number = old('person_dealing_phone_number');
                            }elseif (isset($data->person_dealing_phone_number)){
                                $person_dealing_phone_number = $data->person_dealing_phone_number;
                            }
                        @endphp
                        <input type="text" value="{{$person_dealing_phone_number}}" autocomplete="new-phone" onkeypress="numericInput();"  name="person_dealing_phone_number" id="phoneNumber" class="input text-base font-sans w-full border border-gray-400 flex-1" placeholder="phone number">

                    </div>
                </div>
                @php
                    $person_dealing_name = "";
                    if(old('person_dealing_name')){
                        $person_dealing_name = old('person_dealing_name');
                    }elseif (isset($data->person_dealing_name)){
                        $person_dealing_name = $data->person_dealing_name;
                    }
                @endphp
                <div class="intro-y col-span-12 sm:col-span-6 is_not_estate_person person_dealing_with_estate">
                    <div class="relative">
                        <input name="person_dealing_name" value="{{$person_dealing_name}}" class="{{$input_class}}" id="executive" type="text">
                        <label for="executive" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Name of Executive*</label>
                    </div>
                </div>

                <div class="intro-y col-span-12 sm:col-span-12">
                    <div class="intro-y inline-block" style="width: 62%;">
                        <div class="mb-2 font-sans step-head-gray font-semibold sm:text-lg md:text-lg">Is the notifier willing for the bank/TDR to verify their identity and address?*
                        </div>
                    </div>
                    <div class="intro-y inline-block w-54 toggle-block2">
                        <div class="can-toggle">
                            <input @if($is_verify_identity==0) checked @endif onclick="toggleCheckbox('is_verify_identity',true,'identity')" class="switch-input" type="checkbox" id="bank_verify_identity" />
                            <label for="bank_verify_identity">
                                <div class="can-toggle__switch" data-checked="NO" data-unchecked="YES"></div>
                            </label>
                        </div>
                    </div>

                </div>
                <div id="addrow" class="identity intro-y col-span-12">
                    @php $i=0; @endphp
                    @if($identityData!="" && count($identityData)>0)
                        @foreach($identityData as $value)
                            <div class="rowadded{{$i}} @if(count($identityData)>$i+1) mb-5 @endif" >
                                <div class="intro-y inline-block custom-width mr-6 ">
                                    <div class="relative">
                                        <input name="id_type[]" value="{{$value->id_type}}" class="{{$input_class}}" id="formID" type="text">
                                        <label for="formID" class="label font-sans step-head-gray text-base absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter mt-2 cursor-text">What form of ID? *</label>
                                    </div>
                                </div>
                                <div class="intro-y inline-block custom-width mr-6">
                                    <div class="relative">
                                        <input name="id_number[]" value="{{$value->id_number}}" class="{{$input_class}}" id="IDno" type="text">
                                        <label for="IDno" class="label font-sans step-head-gray text-base absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter mt-2 cursor-text">ID No*
                                        </label>
                                    </div>
                                </div>
                                <div id="{{$i}}" @if(count($identityData)!=$i+1) style="display: none" @endif class="intro-y inline-block float-right border mr-5 p-3 rounded">
                                    <span style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="more_fields" onclick="add_fields({{$i}});" >
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            @php $i = $i+1; @endphp
                        @endforeach
                    @else
                        <div class="rowadded0">
                            <div class="intro-y inline-block custom-width mr-6 ">
                                <div class="relative">
                                    <input name="id_type[]" class="{{$input_class}}" id="formID" type="text">
                                    <label for="formID" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">What form of ID? *</label>
                                </div>
                            </div>
                            <div class="intro-y inline-block custom-width mr-6">
                                <div class="relative">
                                    <input name="id_number[]" class="{{$input_class}}" id="IDno" type="text">
                                    <label for="IDno" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">ID No*
                                    </label>
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
                    @endif
                    <div id="dynamicContent{{($i==0)?$i:$i-1}}"></div>
                    <!-- <input type="button" id="more_fields" onclick="add_fields();" value="" /> -->
                </div>
                <div class="intro-y col-span-12 sm:col-span-12">
                    <div class="intro-y inline-block w-54">
                        <div class="mb-2 sm:text-lg md:text-lg font-sans step-head-gray text-lg font-semibold">Has probate been applied for?</div>
                    </div>
                    <div class="intro-y inline-block w-54 toggle-block3">
                        <div class="can-toggle">
                            <input id="is_probate_applied" @if($probate_applied==0) checked @endif class="switch-input" onclick="toggleCheckbox('probate_applied')" type="checkbox" />
                            <label for="is_probate_applied">
                                <div class="can-toggle__switch" data-checked="NO" data-unchecked="YES"></div>
                            </label>
                        </div>
                    </div>

                </div>
                <div class="intro-y col-span-12 sm:col-span-12">
                    <div class="intro-y inline-block w-54">
                        <div class="mb-2 sm:text-lg md:text-lg step-head-gray text-lg font-sans font-semibold ">Is the Notifier willing to be contacted by the Creditor?
                        </div>
                    </div>
                    <div class="intro-y inline-block w-54 toggle-block4">
                        <div class="can-toggle">
                            <input @if($available_for_contact==0) checked @endif onclick="toggleCheckbox('available_for_contact',true,'is_contcated_by_creditor')" class="switch-input" type="checkbox" id="contacted_by_creditor" />
                            <label for="contacted_by_creditor">
                                <div class="can-toggle__switch" data-checked="NO" data-unchecked="YES"></div>
                            </label>
                        </div>
                    </div>

                </div>
                <div class="intro-y col-span-12 sm:col-span-12 is_contcated_by_creditor" id="is_contcated_by_creditor">
                    <div class="intro-y inline-block w-54">
                        <div class="mb-2 sm:text-lg md:text-lg step-head-gray text-lg font-semibold font-sans ">
                            How would you prefer to be contacted?
                        </div>
                    </div>
                    <div class="intro-y inline-block w-54 text-center float-right">
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                <input onclick="toggleCheckbox('email_available_for_contact');" name="avail_for_contact_checkbox[]" @if($email_available_for_contact==1) checked @endif type="checkbox" class="input border mr-2" id="email_for_contact">
                                <label class="cursor-pointer font-sans select-none text-base font-medium ml-1" for="email">Email</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input onclick="toggleCheckbox('phone_number_available_for_contact');" name="avail_for_contact_checkbox[]" @if($phone_number_available_for_contact==1) checked @endif type="checkbox" class="input border mr-2" id="phone_for_contact">
                                <label class="cursor-pointer font-sans select-none text-base font-medium ml-1" for="phone">Phone</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input onclick="toggleCheckbox('mail_available_for_contact');"  name="avail_for_contact_checkbox[]" @if($mail_available_for_contact==1) checked @endif type="checkbox" class="input border mr-2" id="mail">
                                <label class="cursor-pointer font-sans select-none text-base font-medium ml-1" for="mail">Mail</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="intro-y col-span-12 sm:col-span-12" style="margin-top: 5%;">
                    <div class="intro-y inline-block w-54 text-center float-right">
                        <button type="submit" class="button ml--36 button--lg w-full rounded-sm xl:w-32 text-white bg-theme-dark-blue xl:mr-3">Next</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END:  Notifier Information -->
@endsection

@section('custom-scripts')
    <script src="{{asset('assets/frontend/js/create-estate-registry-step-one.js')}}"></script>
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
