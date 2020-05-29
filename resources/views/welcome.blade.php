
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <link href="{{asset('assets/frontend/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>TER ( The Estate Registry )</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <!-- END: CSS Assets-->
    <script src="{{asset('assets/frontend/js/jquery-3.5.0.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
</head>
<!-- END: Head -->

<body class="login">

<div class="">
    <div class="block xl:grid grid-cols-2 ">
        <!-- BEGIN: Login Info -->
        <div class="xl:flex h-screen flex-col">

            <!-- BEGIN: Login Form -->
            <div class="flex justify-between mb-4 xl:mr-10  mt-5">
                <div class="xl:w-3/4 h-12">
                    <a href="#" class="-intro-x flex items-center ">
                        <span class="highlighted-text text-4xl ml-3 font-bold md:ml-20"> TDR<span class="font-medium"></span> </span>
                    </a>
                </div>
                <div class="xl:w-1/4 md:w-1/4 h-12">
                    <div class="customer-service xl:mr-0 mr-5 border-light font-normal p-3 rounded-sm"><i class="fa fa-headphones"></i>&nbsp;Customer Service</div>
                </div>
            </div>
            <div class="h-screen w-full flex py-5 xl:py-0 my-10 xl:my-0  pr-20  ">
                <div class="my-auto p-10 mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0  xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="text-2xl xl:text-left">Thank you for using
                        <br>
                        <span class="font-semibold mb-10 text-4xl-blue text-4xl xl:text-left">The Estate Registry (TER)</span> </h2>
                    <p class="mt-3 text-base text-left tracking-normal leading-snug">to notify our participating network of creditors of the passing of your client or loved one. In this section of TER, you register as the “Notifier”, register the deceased and provide proof of who you are and the death of the person
                        you are registering.</p>

                    <p class="text-base text-left mt-5 tracking-normal leading-snug"> By clicking on the “ I give my consent” button you’re acknowledging and giving us permission to share the information you are providing with the creditors in the TER network. </p>
                    <button class="button button--lg w-full mt-10 rounded-sm xl:w-5/12 text-white bg-theme-dark-blue xl:mr-3">
                        I Give My Consent
                    </button>
                    <a href="{{route('register')}}" class="button button--lg w-full mt-10 rounded-sm xl:w-5/12 text-white bg-theme-dark-blue xl:mr-3">
                        Register
                    </a>

                </div>
            </div>
            <!-- END: Login Form -->
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="w-full xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0 img-space">
            <div class="xl:my-auto md:my-auto mt-20">
                <img class="xl:h-auto object-cover xl:w-full md:h-screen md:w-full" src="{{asset('assets/frontend/images/tdr/estate-plan.png')}}">
            </div>
        </div>
        <!-- END: Login Form -->
    </div>

    @include('notifier/includes/footer')

</div>
<!-- BEGIN: JS Assets-->
<script src="{{asset('assets/frontend/js/app.js')}}"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!-- END: JS Assets-->


<script>
    // Non sticky
    $(document).ready(function () {
        $.toast('Lets test some HTML stuff... <a href="#">github</a>') ;
    });
    // sticky $.toast({ text : '<strong>Remember!</strong> You can <span class="font-medium text-red-600">always</span> introduce your own × HTML and <span class="font-medium">CSS</span> in the toast.', hideAfter : false })
</script>
</body>

</html>
