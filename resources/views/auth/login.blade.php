<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>

<head>
    <meta charset="utf-8">
    <link href="assets/frontend/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Notifier Login </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login w-full">

<div class="">
    <div class="block xl:grid grid-cols-2 ">
        <!-- BEGIN: Login Info -->
        <div class="xl:flex h-screen flex-col">

            <!-- BEGIN: Login Form -->
            <div class="flex justify-between mb-4 xl:mr-10  mt-5">
                <div class="xl:w-3/4 h-12">
                    <a href="#" class="-intro-x flex items-center ">
                        <!-- <img class="w-6" src="assets/frontend/images/logo.svg"> -->
                        <span class="highlighted-text text-4xl ml-3 font-bold md:ml-20"> TDR<span
                                class="font-medium"></span> </span>
                    </a>
                </div>
                <div class="xl:w-1/4 md:w-1/4 h-12">
                    <div class="customer-service xl:mr-0 mr-5 border-light font-normal p-3 rounded-sm"><i
                            class="fa fa-headphones"></i>&nbsp;Customer Service
                    </div>
                </div>
            </div>
            <div class="h-screen w-full flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto p-10 mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0  xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

                    <h2 class="text-2xl xl:text-left">Welcome to the secure Login of
                        <br>
                        <span
                            class="font-semibold mb-10 text-4xl-blue text-4xl xl:text-left">The Estate Registry (TER)</span>
                    </h2>
                    <p class="mt-3">If you have recently suffered the loss of a loved one, we want to offer you <br> our
                        sincere condolences. We hope during this time of bereavement our<br> service helps make the duty
                        of notifying the creditors a little easier for
                        you. </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="intro-x mt-8 p-5">
                            @if(session('status'))
                            <p style="margin-bottom: 10px;color: green;font-weight: 600;">
                                Your email has been verified successfully. Please login.
                            </p>
                            @endif
                            <div class="relative">
                                <input
                                    class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900"
                                    id="email" type="text" name="email" required value="{{ old('email') }}" autocomplete="email">
                                <label for="email"
                                       class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Email
                                    Address</label>
                                @error('email')
                                <div style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4 relative" x-data="{ show: true }">
                                <span class="px-1 text-sm text-gray-600"></span>
                                <div class="relative">
                                    <input placeholder="" :type="show ? 'password' : 'text'"
                                           class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pl-4 pb-2 focus focus:pt-6 focus:pl-2 focus:border-left-blue-900  focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900"
                                           id="password" type="password" name="password" required autocomplete="current-password">
                                    <label for="password"
                                           class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Password</label>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                        <svg class="h-md text-eye-gray" fill="none" @click="show = !show"
                                             :class="{'hidden': !show, 'block':show }"
                                             xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                  d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path>
                                        </svg>
                                        <svg class="h-md text-eye-gray" fill="none" @click="show = !show"
                                             :class="{'block': !show, 'hidden':show }"
                                             xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                  d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                            <div class="recaptcha">
                                <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                                <br/>
                            </div>
                            <div class="flex mb-4">
                                <div class="w-3/4 mt-3 h-12">
                                    <a href="{{ route('register') }}">
                                        {{ __('Create an account') }}
                                    </a>
                                </div>
                                <div class="w-1/4 h-12">
                                    <button type="submit"
                                        class="button ml--36 button--lg w-full rounded-sm xl:w-32 text-white bg-theme-dark-blue xl:mr-3">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="w-full xl:h-screen flex py-5 xl:py-0 my-10 xl:my-0 img-space">
            <div class="xl:my-auto md:my-auto mt-20">
                <img class="xl:h-screen object-cover xl:w-full md:h-screen md:w-full"
                     src="assets/frontend/images/tdr/login-img.jpg">
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
    <div class="bg-theme-light-blue p-10 ">
        <p class="leading-loose tracking-normal sub-text-lg">If you are unable or rather not complete The Estate
            Registry service online, please call our free telephone service on <a class="highlighted-text font-bold">+1
                866-504-4754</a>
            <br> We should be able to take your details over the telephone, so please have all of the required documents
            and information available when you call.
            <br> If you would like to provide feedback on The Estate Registry service, please e-mail us at <a
                class="highlighted-text font-bold">feedback@estate-registry.com.au</a></p>
    </div>
    <div class="  bg-theme-dark-blue pl-5 pl-10 pr-10 pt-10">
        <div class="footer-menus mb-10 flex flex-col md:xl:flex-row lg:flex-row xl:flex-row justify-between">
            <div class="text-white text-lg">Create Account</div>
            <div class="text-white text-lg">Notifier Login</div>
            <div class="text-white text-lg">About Us</div>
            <div class="text-white text-lg">Bereavement Support</div>
            <div class="text-white text-lg">Customer Service</div>
            <div class="text-white text-lg">Terms of Service</div>
            <div class="text-white text-lg">Privacy Statement</div>
        </div>
        <div class="flex flex-col xl:flex-row lg:flex-row mb-4 xl:h-0 lg:h-0">
            <div class="xl:w-3/4 h-12">
                <p class="text-xl tracking-wide text-white">This site is hosted and operated by The Estate Registry, a
                    wholly owned<br>
                    <span class="font-bold">subsidiary of Phillips & Cohen Associates (Australia), Ltd.</span></p>
            </div>
            <div class="xl:w-1/4 h-12 ">
                <img class="object-contain xl:mt-0 lg:mt-0 md:mt-0" src="assets/frontend/images/tdr/footer-img.png">
            </div>
        </div>
        <div class="h-20"></div>
        <div class="flex mt-5 flex-col xl:flex-row lg:flex-row pb-1">
            <div class="xl:w-3/4 xl:h-12  lg:w-3/4 gl:h-12 md:w-3/4 md:h-12 ">
                <p class="text-sm tracking-wide text-white">© Copyright 2020 . All Rights Reserved.
                </p>
            </div>
            <div
                class="mt-5 xl:w-1/4 xl:h-12 xl:mt-0 lg:w-3/4 lg:h-12 lg:mt-0 md:w-3/4 md:h-12 md:mt-0 flex justify-between">
                <i class="text-white text-2xl fab fa-facebook"></i>
                <i class="text-white text-2xl fab fa-twitter"></i>
                <i class="text-white text-2xl fab fa-youtube"></i>
                <i class="text-white text-2xl fab fa-linkedin"></i>
                <i class="text-white text-2xl fab fa-instagram"></i>
                <i class="text-white text-2xl fab fa-blogger-b"></i>

            </div>
        </div>
    </div>

</div>
<!-- BEGIN: JS Assets-->
<script src="{{asset('assets/frontend/js/app.js')}}"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<!-- END: JS Assets-->


<!-- BEGIN: CUSTOMIZED SCRIPTS -->

<!-- BEGIN: FLOATING LABEL -->
<script>
    var toggleInputContainer = function (input) {
        if (input.value != "") {
            input.classList.add('filled');
        } else {
            input.classList.remove('filled');
        }
    }

    var labels = document.querySelectorAll('.label');
    for (var i = 0; i < labels.length; i++) {
        labels[i].addEventListener('click', function () {
            this.previousElementSibling.focus();
        });
    }

    window.addEventListener("load", function () {
        var inputs = document.getElementsByClassName("input");
        for (var i = 0; i < inputs.length; i++) {
            console.log('looped');
            inputs[i].addEventListener('keyup', function () {
                toggleInputContainer(this);
            });
            toggleInputContainer(inputs[i]);
        }
    });
</script>
<!-- END: FLOTING LABEL -->


<!-- BEGIN: RECAPTCHA -->
<script type="text/javascript">
    var onloadCallback = function () {
        console.log("grecaptcha is ready!");
    };
</script>
<!-- END: RECAPTCHA -->
<!-- END: CUSTOMIZED SCRIPT -->
</body>

</html>
