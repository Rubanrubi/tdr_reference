<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>

<head>
    <meta charset="utf-8">
    <link href="{{asset('assets/frontend/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Verify your email </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login w-full">

<div>
    <div class="block xl:grid grid-cols-2 ">
        <!-- BEGIN: Login Info -->
        <div class="xl:flex h-screen flex-col">

            <!-- BEGIN: Login Form -->
            <div class="flex justify-between mb-4 xl:mr-10  mt-5">
                <div class="xl:w-3/4 h-12">
                    <a href="#" class="-intro-x flex items-center ">
                        <!-- <img class="w-6" src="assets/frontend/images/logo.svg"> -->
                        <span class="highlighted-text text-4xl ml-3 font-bold md:ml-20"> TDR<span class="font-medium"></span> </span>
                    </a>
                </div>
                <div class="xl:w-1/4 md:w-1/4 h-12">
                    <div class="customer-service xl:mr-0 mr-5 border-light font-normal p-3 rounded-sm"><i class="fa fa-headphones"></i>&nbsp;Customer Service</div>
                </div>
            </div>
            <div class="h-full w-full flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto p-10 mx-auto xl:mt-32 xl:ml-32 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0  xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="text-2xl xl:text-left">
                        A verification link has been sent to your email. <br>Please verify to proceed with the registration process.
                    </h2>
                    <p class="mt-3">If you didn't receive the email.</p>
                    <form class="xl:w-auto" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button style="margin-top: 10px;float: right;" type="submit" class="button xl:ml--10 mt-16 button--lg w-full rounded-sm xl:w-32 text-white bg-theme-dark-blue xl:mr-3">Resend Email</button>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="w-full xl:h-screen flex py-5 xl:py-0 my-10 xl:my-0 img-space">
            <div class="xl:my-auto md:my-auto mt-20">
                <img class="xl:h-screen object-cover xl:w-full md:h-screen md:w-full" src="{{asset('assets/frontend/images/tdr/login-img.jpg')}}">
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
    @include('notifier/includes/footer')

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
