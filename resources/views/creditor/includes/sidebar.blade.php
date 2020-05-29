    <!-- BEGIN: Content -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto text-white text-4xl"> TDR
                <img alt="" class="w-6" src="dist/images/logo.svg">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2 w-8 h-8 text-white transform -rotate-90"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>                </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden" style="display: none;">
            <li>
                <a href="#" class="menu menu--active">
                    <div class="menu__icon">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>                        -->
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/data.png')}}" class=" w-6">
                    </div>
                    <div class="menu__title"> Data </div>
                </a>
            </li>

            <li>
                <a href="#" class="menu">
                    <div class="menu__icon">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> -->
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/report.png')}}" class=" w-6">
                    </div>
                    <div class="menu__title"> Report</div>
                </a>
            </li>
            <li>
                <a href="{{ route('creditor.search') }}" class="menu">
                    <div class="menu__icon">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>                        -->
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/search.png')}}" class=" w-6">
                    </div>

                    <div class="menu__title"> Search </div>
                </a>
            </li>
            <li>
                <a href="side-menu-point-of-sale.html" class="menu">
                    <div class="menu__icon">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> -->
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/support.png')}}" class=" w-6">
                    </div>
                    <div class="menu__title"> Support </div>
                </a>
            </li>
            <li>
                <a href="{{ route('creditor.member') }}" class="menu">
                    <div class="menu__icon">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> -->
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/member.png')}}" class=" w-6">
                    </div>
                    <div class="menu__title"> Member </div>
                </a>
            </li>
        </ul>
    </div>

    <!-- BEGIN: Simple Menu -->
    <nav class="side-nav side-nav--simple">
        <a href="#" class="intro-x flex items-center pl-5 pt-4">
            <!-- <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg"> -->
        </a>
        <!-- <div class="side-nav__devider my-6"></div> -->
        <ul class="-mt-4">
            <li class="mb-8">
                <a href="#" class="side-menu side-menu--active flex flex-wrap">
                    <div class="side-menu__icon">
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/data.png')}}" class="w--1-3 mt-2 ml-6px">
                    </div>
                    <!-- <div class="side-menu__title"> Dashboard </div> -->
                    <div class="text-xs mb-1 ml-2px "> Data</div>
                </a>

            </li>

            <li class="mb-8">
                <a href="#" class="side-menu side-menu--inactive flex flex-wrap">
                    <div class="side-menu__icon">
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/report.png')}}" class="w--1-3 mt-2 ml-6px">
                    </div>
                    <div class="text-xs mb-1  ml-15rem"> Report</div>
                </a>
            </li>
            <li class="mb-8">
                <a href="{{ route('creditor.search') }}" class="side-menu side-menu--inactive flex flex-wrap">
                    <div class="side-menu__icon">
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/search.png')}}" class="w--1-3 ml-1 mt-2">
                    </div>
                    <div class="text-xs mb-1 ml-15rem"> Search</div>
                </a>
            </li>
            <li class="mb-8">
                <a href="#" class="side-menu side-menu--inactive flex flex-wrap">
                    <div class="side-menu__icon">
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/support.png')}}" class="w--1-3 ml-35rem mt-2">
                    </div>
                    <div class="text-xs mb-1 -ml-30rem "> Support</div>
                </a>
            </li>
            <li class="mb-8">
                <a href="{{ route('creditor.member') }}" class="side-menu side-menu--inactive flex flex-wrap">
                    <div class="side-menu__icon">
                        <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/member.png')}}" class="w-6 ml-1  mt-2">
                    </div>
                    <div class="text-xs mb-1 -ml--35rem"> Member</div>
                </a>
            </li>
            <!-- <li class="side-nav__devider my-6"></li> -->

        </ul>
    </nav>
    <!-- END: Simple Menu -->