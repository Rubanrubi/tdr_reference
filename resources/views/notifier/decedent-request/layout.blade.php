<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <!-- <link href="dist/images/logo.svg" rel="shortcut icon"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/toggle-switch.css')}}" />

    @section('custom-styles')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">

@include('notifier/includes/header_new')

<!-- BEGIN: Content -->
<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: Create Estate Account  -->
            <div class="col-span-12 mt-8">
                <h2 class="text-lg font-medium truncate mr-5">
                    Create Estate Account
                </h2>
            </div>
            <!-- END:Create Estate Account -->
            <!-- BEGIN: Step -->

        @include('notifier/decedent-request/left-menu')
        <!-- END: Step -->
            <!-- BEGIN: Notifier Information -->
            @yield('content')
            <!-- END:  Notifier Information -->

        </div>

    </div>

</div>

@include('notifier/includes/footer-only')

<!-- END: Content -->

<!-- BEGIN: JS Assets-->
<script src="{{asset('assets/frontend/js/jquery-3.5.0.js')}}"></script>
@if(!request()->is('notifier/decedent-request/step-three*'))
    <script src="{{asset('assets/frontend/js/app.js')}}"></script>
@endif
<script src="{{asset('assets/frontend/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript ">

    function includeHTML() {
        var t, e, n, i, s;
        for (t = document.getElementsByTagName("*"),
                 e = 0; e < t.length; e++)
            if (n = t[e],
                i = n.getAttribute("include-html"))
                return s = new XMLHttpRequest,
                    s.onreadystatechange = function() {
                        4 == this.readyState && (200 == this.status && (n.innerHTML = this.responseText),
                        404 == this.status && (n.innerHTML = "Page not found."),
                            n.removeAttribute("include-html"),
                            includeHTML())
                    },
                    s.open("GET", i, !0),
                    void s.send()
    }

    includeHTML()

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
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

@yield('custom-scripts')
<!-- END: JS Assets-->

</body>

</html>
