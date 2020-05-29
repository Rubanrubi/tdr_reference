@extends('creditor.layouts.Register.app')

@section('title')
    Creditor Login
@endsection

@section('content')

<!-- BEGIN: LOGIN CARD -->
<div class="h-150 xl:h-screen lg:h-screen xl:mb-12 w-full flex py-5 xl:py-0 xl:my-0">
    <div class=" mx-4 intro-y mt-0  box xl:my-auto px-8 py-5 xl:mx-auto xl:ml-16 bg-white xl:shadow-none w-36 sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="text-2xl xl:text-left font-sans font-medium text-4xl-blue text-3xl">We’re Excited to Have you as Part
            <br> of the <span class="font-sans font-extrabold text-4xl-blue text-3xl">TDR Network!</span> </h2>
        <p class="mt-3 text-light-grey text-medium font-normal font-sans">To Benefit from this Secure; Centralized Data Base <span class="highlighted-text font-bold underline">Sign Up</span> Now & Take<br> Advantage of Our Free Trial Offer! If you would like to learn more about<br> your subscription
            options to join the TDR member network, go to the<br> <span class="highlighted-text font-bold underline">Membership</span> page before signing up. <br></p>
        <p class="mt-3 text-light-grey text-medium font-normal font-sans">And, if you are already a member, <span class="highlighted-text font-bold">Welcome back!</span></p>
        <!-- BEGIN: LOGIN FORM -->
        <form method="POST" action="{{ route('creditor.login') }}">
            @csrf
            <div class="intro-x mt-2 p-5">
                <div class="relative">
                    <input type="text" name="username" value="{{ old('username') }}" required  class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="your_id">
                    <label for="email" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 font-sans cursor-text">Your ID</label>
                </div>
                @error('username')
                    <div style="color: red;">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <div class="mb-4 relative" x-data="{ show: true }">
                    <span class="px-1 text-sm text-gray-600"></span>
                    <div class="relative">
                        <input placeholder="" :type="show ? 'password' : 'text'" class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pl-4 pb-2 focus focus:pt-6 focus:pl-2 focus:border-left-blue-900  focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900"
                            id="password" name="password" type="password" autocomplete="current-password" required>
                        <label for="password" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 font-sans cursor-text">Password</label>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"> </path>
                            </svg>
                            <svg class="h-md text-eye-gray" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('password')
                    <div style="color: red;">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
                <div class="intro-x flex text-xs sm:text-sm mt-4">
                    <div class="flex items-center mr-auto">
                        <a href="#" class="font-sans text-light-grey ">Forgot Password?</a>
                    </div>
                </div>
                <div class="recaptcha mt-4 mb-4 ">
                    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                    <br/>
                    <!-- <input type="submit" value="Submit"> -->
                </div>
                <div class="flex flex-wrap mt-16">
                    <a href="{{ route('creditor.register') }}" class="mt-2 font-sans mr-auto text-light-grey text-base">Create an Account</a>
                    <button type="submit" class="button ml-auto button--lg w-full rounded-sm xl:w-32 text-white bg-theme-dark-blue xl:mt-0 mt-4">Login</button>
                </div>
            </div>
        </form>
        <!-- END: LOGIN FORM-->
    </div>
</div>
<!-- END: LOGIN CARD -->

@endsection
