@extends('notifier.layout.layout')

@section('title') Profile @endsection

@section('content')

    <div class="col-span-12">
        <h2 class="text-xl ml-2 highlighted-text font-semibold font-sans truncate mr-5">
            Profile
        </h2>
    </div>
    <!-- BEGIN: ACCOUNT SECTION -->
    <div class="intro-y card-border-radius box col-span-12 px-5 py-5 sm:py-3 lg:col-span-6">
        <h2 class="text-xl highlighted-text font-semibold font-sans truncate mr-5">
            Account
        </h2>
        <div class="intro-y mt-4 ">
            <form method="post" action="{{route('profile-update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class=" px-4 py-4 mb-3 xl:flex items-center ">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' name="profile_picture" id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload">
                                <img class="ml-2 mt-2 mb-2 mr-r w-4" src="{{ asset('assets/frontend/images/tdr/camera.png')}}">
                            </label>
                        </div>
                        <div class="avatar-preview">
                            @if($data->profile_picture=="")
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            @else
                                <div id="imagePreview" style="background-image: url({{asset('uploads/notifier/'.$data->profile_picture)}});"></div>
                            @endif
                        </div>
                    </div>

                    <div class="xl:ml-4 w-full">
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="relative mb-4">
                                <input value="{{$data->name}}" name="name" class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="name" type="text">
                                <label for="name" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text font-sans">Name*</label>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="relative mb-4">
                                <input value="{{$data->email}}" name="email" class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="email" type="email">
                                <label for="email" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text font-sans">Email*</label>
                            </div>
                        </div>
                        <div class="phone-list">
                            <select name="country_code" id="">
                                <optgroup>
                                    <option data-countryCode="DZ" value="213"> +213</option>
                                    <option data-countryCode="AD" value="376"> +376</option>
                                    <option data-countryCode="AO" value="244"> +244</option>
                                    <option data-countryCode="AI" value="1264"> +1264</option>
                                    <option data-countryCode="AG" value="1268"> +1268</option>
                                    <option data-countryCode="AR" value="54"> +54</option>
                                    <option data-countryCode="AM" value="374"> +374</option>
                                    <option data-countryCode="AW" value="297"> +297</option>
                                    <option data-countryCode="AU" value="61" selected> +61</option>
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
                                    <option data-countryCode="BA" value="387">  +387</option>
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
                                    <option data-countryCode="GF" value="594">  +594</option>
                                    <option data-countryCode="PF" value="689">  +689</option>
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
                                    <option data-countryCode="GW" value="245">  +245</option>
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
                                    <option data-countryCode="KP" value="850">  +850</option>
                                    <option data-countryCode="KR" value="82">  +82</option>
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
                                    <option data-countryCode="PG" value="675">  +675</option>
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
                                    <option data-countryCode="ZA" value="27">  +27</option>
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
                                    <option data-countryCode="VA" value="379">  +379</option>
                                    <option data-countryCode="VE" value="58"> +58</option>
                                    <option data-countryCode="VN" value="84"> +84</option>
                                    <option data-countryCode="VG" value="84">  +1284</option>
                                    <option data-countryCode="VI" value="84">  +1340</option>
                                    <option data-countryCode="WF" value="681"> +681</option>
                                    <option data-countryCode="YE" value="969">+969</option>
                                    <option data-countryCode="YE" value="967">+967</option>
                                    <option data-countryCode="ZM" value="260"> +260</option>
                                    <option data-countryCode="ZW" value="263"> +263</option>
                                </optgroup>
                            </select>
                            <input value="{{$data->phone}}" name="phone" type="tel" id="phoneNumber" class="input text-base font-sans w-full border border-gray-400 flex-1" placeholder="Phone number*">

                        </div>
                    </div>
                    <!-- <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">137 Sales</div> -->
                </div>
                <div class="flex mb-4">
                    <button class="button ml-auto font-sans button--lg w-full rounded-sm xl:w-32 text-white bg-theme-dark-blue xl:mr-3">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END: ACCOUNT SECTION -->
    <!-- BEGIN: RESET PASSWORD -->
    <div class="intro-y box px-5 py-5 sm:py-3  card-border-radius col-span-12 h-auto lg:col-span-6">
        <div class="  items-center ">
            <h2 class="text-xl rounded-lg highlighted-text font-semibold font-sans truncate mr-5">
                Reset Password
            </h2>
            <form method="post" action="{{route('password-update')}}">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="intro-x p-4">

                    <div class=" relative" x-data="{ show: true }">
                        <span class="px-1 text-sm text-gray-600"></span>
                        <div class="relative ">
                            <input required name="old_password" placeholder="" :type="show ? 'password' : 'text'" class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pl-4 pb-2 focus focus:pt-6 focus:pl-2 focus:border-left-blue-900  focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900"
                                   id="old_password" type="password">
                            <label for="old_password" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Old Password</label>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"> </path>
                                </svg>
                                <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path>
                                </svg>
                            </div>
                        </div>

                    </div>
                    <div class=" relative" x-data="{ show: true }">
                        <span class="px-1 text-sm text-gray-600"></span>
                        <div class="relative ">
                            <input required name="password" placeholder="" :type="show ? 'password' : 'text'" class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pl-4 pb-2 focus focus:pt-6 focus:pl-2 focus:border-left-blue-900  focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900"
                                   id="current_password" type="password">
                            <label for="current_password" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Current Password</label>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"> </path>
                                </svg>
                                <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="relative" x-data="{ show: true }">
                        <span class="px-1 text-sm text-gray-600"></span>
                        <div class="relative">
                            <input required name="password_confirmation" placeholder="" :type="show ? 'password' : 'text'" class="input border border-gray-400 appearance-none rounded w-full px-3 new_password  pt-5 pl-4 pb-2 focus focus:pt-6 focus:pl-2 focus:border-left-blue-900  focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900"
                                   id="new_password" type="password">
                            <label for="new_password" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">New Password</label>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"> </path>
                                </svg>
                                <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6">
                        <button class="button ml-auto font-sans button--lg w-full rounded-sm xl:w-32 text-white bg-theme-dark-blue xl:mr-3">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END: RESET PASSWORD -->

@endsection

@section('custom-scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
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
        @if(Session::has('success'))
            var toastHTML = '{{Session::get('success')}}';
            toastr["success"](toastHTML);
        @endif
        @if(Session::has('error'))
            var toastHTML = '{{Session::get('error')}}';
            toastr["error"](toastHTML);
        @endif

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
@endsection
