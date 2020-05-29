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
    <link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css')}}"/>
   
    <!-- END: CSS Assets-->
    <style>
        @media (min-width: 1280px) {
            .fas.fa-chevron-down {
                margin-top: 10px!important;
            }
            .tooltiptail {
                display: block;
                border-color: transparent #124683 transparent transparent;
                border-style: solid;
                border-width: 20px;
                width: 0px;
                height: 0px;
            }
            #toolTip {
                background-color: #ffffff;
                margin-left: 2rem;
                position: relative;
                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                box-shadow: 0px 0px 8px -1px black;
                -moz-box-shadow: 0px 0px 8px -1px black;
                -webkit-box-shadow: 0px 0px 8px -1px black;
            }
            #tail1 {
                width: 0px;
                height: 0px;
                border: 10px solid;
                border-color: transparent #124683 transparent transparent;
                position: absolute;
                top: 2rem;
                left: -20px;
            }
        }
        
        @media (min-width: 1024px) {
            .fas.fa-chevron-down {
                margin-top: 10px!important;
            }
            .tooltiptail {
                display: block;
                border-color: transparent #124683 transparent transparent;
                border-style: solid;
                border-width: 20px;
                width: 0px;
                height: 0px;
            }
            #toolTip {
                background-color: #ffffff;
                margin-left: 2rem;
                position: relative;
                border-radius: 4px;<script src="dist/js/app.js"></script>
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                box-shadow: 0px 0px 8px -1px black;
                -moz-box-shadow: 0px 0px 8px -1px black;
                -webkit-box-shadow: 0px 0px 8px -1px black;
            }
            #tail1 {
                width: 0px;
                height: 0px;
                border: 10px solid;
                border-color: transparent #124683 transparent transparent;
                position: absolute;
                top: 2rem;
                left: -20px;
            }
        }
    </style>
    </head>
<!-- END: Head -->

 <body class="app">

 @include('creditor/includes/navbar')

  <div class="flex">

    @include('creditor/includes/sidebar')

        <div id="toolTip">
            <div id="tail1"></div>
        </div>
    <div class="content ">

    @yield('content')

    </div>

  </div>

  @include('creditor/includes/footer')

   <!-- BEGIN: JS Assets-->

   <script src="{{ asset('assets/dist/js/app.js')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- END: JS Assets-->

    <!-- BEGIN: CUSTOMIZED SCRIPT -->
    <script>
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
    </script>
    <!-- END: CUSTOMIZING SCRIPT -->

</body>

</html>
