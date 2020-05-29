<!doctype html>
<html class="loading" data-textdirection="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link href="{{ asset('assets/dist/images/logo.svg')}}" rel="shortcut icon">
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/app.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css')}}">
   
    <!-- END: CSS Assets-->
    <style>
        @media (min-width: 1280px) {
            .xl\:mt-20 {
                margin-top: 5rem !important;
            }
        }
    </style>
</head>
<!-- END: Head -->

<body class="login w-full">

    <div class="">
        <div class="block xl:grid grid-cols-1 ">
            <!-- BEGIN: BANNER Info -->
            <div class=" h-auto w-auto registration-bg">

            @include('creditor/includes/Register/navbar')

            @yield('content')

            </div>
       </div>
       @include('creditor/includes/Register/footer')
    </div>

      <!-- BEGIN: JS Assets-->
      <script src="{{asset('assets/frontend/js/jquery-3.5.0.js')}}"></script>
      <script src="{{ asset('assets/dist/js/app.js')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
    <!-- END: JS Assets-->


    <!-- BEGIN: CUSTOMIZED SCRIPTS -->

    <!-- BEGIN: FLOATING LABEL -->
    <script>
        var toggleInputContainer = function(input) {
            if (input.value != "") {
                input.classList.add('filled');
            } else {
                input.classList.remove('filled');
            }
        }

        var labels = document.querySelectorAll('.label');
        for (var i = 0; i < labels.length; i++) {
            labels[i].addEventListener('click', function() {
                this.previousElementSibling.focus();
            });
        }

        window.addEventListener("load", function() {
            var inputs = document.getElementsByClassName("input");
            for (var i = 0; i < inputs.length; i++) {
                console.log('looped');
                inputs[i].addEventListener('keyup', function() {
                    toggleInputContainer(this);
                });
                toggleInputContainer(inputs[i]);
            }
        });
    </script>
    <!-- END: FLOTING LABEL -->

    <!-- BEGIN: LANGUAGE TRANSLATOR -->
    <script type="text/javascript ">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT
            }, 'google_translate_element');
        }

        function triggerHtmlEvent(element, eventName) {
            var event;
            if (document.createEvent) {
                event = document.createEvent('HTMLEvents');
                event.initEvent(eventName, true, true);
                element.dispatchEvent(event);
            } else {
                event = document.createEventObject();
                event.eventType = eventName;
                element.fireEvent('on' + event.eventType, event);
            }
        }

        jQuery('.lang-select').click(function() {
            var theLang = jQuery(this).attr('data-lang');
            jQuery('.goog-te-combo').val(theLang);

            //alert(jQuery(this).attr('href'));
            window.location = jQuery(this).attr('href');
            location.reload();

        });
    </script>
    <script type="text/javascript " src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit "></script>
    <!-- END: LANGUAGE TRANSLATOR -->

    <!-- END: CUSTOMIZED SCRIPT -->
</body>

</html>
   