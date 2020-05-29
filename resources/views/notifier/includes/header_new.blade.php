<style>

    .search .search__icon {
        margin-top: .5rem !important;
    }
</style>
<div class="mobile-menu md:hidden">
    <!-- <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">

            <span class="text-white text-lg ml-3"> TER </span>
        </a>
        <a href="javascript:;" id="mobile-menu-toggler">

            <i class="fas fa-bars" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div> -->
    <div class="mobile-menu-bar">
        <a href="" class="flex text-white text-lg ml-3 mr-auto">TDR
            <!-- <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg"> -->
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2 w-8 h-8 text-white transform -rotate-90"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>            </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="#" class="menu {{ request()->is('notifier/completed-estate-account*')? 'menu--active' : '' }}">
                <div class="menu__icon">
                    <img src="{{ request()->is('notifier/completed-estate-account*')? asset('assets/frontend/images/tdr/header/complete_estate_account_active.png') : asset('assets/frontend/images/tdr/header/complete_estate_account.png') }} " class="w-4 ">
                </div>
                <div class="menu__title"> Complete Estate Account </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu {{ request()->is('notifier/decedent-request/step*')? 'menu--active' : '' }}">
                <div class="menu__icon">
                    <img src="{{ request()->is('notifier/decedent-request/step*')? asset('assets/frontend/images/tdr/header/create_estate_account_active.png') : asset('assets/frontend/images/tdr/header/create_estate_account.png') }} " class="w-4 inactive">
                </div>
                <div class="menu__title">Create Estate Account <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="#" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Menu 1 </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Menu 2</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Menu 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu {{ request()->is('notifier/uncompleted-estate-account*')? 'menu--active' : '' }}">
                <div class="menu__icon">
                    <img src="{{ request()->is('notifier/uncompleted-estate-account*')? asset('assets/frontend/images/tdr/header/uncomplete_estate_account_active.png') : asset('assets/frontend/images/tdr/header/uncomplete_estate_account.png') }} " class="w-4 inactive">
                </div>
                <div class="menu__title"> Uncomplete Estate Account </div>
            </a>
        </li>
        <li>
            <a href="#" class="menu {{ request()->is('notifier/support*')? 'menu--active' : '' }}">
                <div class="menu__icon">
                    <img src="{{ request()->is('notifier/support*')? asset('assets/frontend/images/tdr/header/support_active.png') : asset('assets/frontend/images/tdr/header/support.png') }} " class="w-4  inactive">
                </div>
                <div class="menu__title"> Support </div>
            </a>
        </li>
        <li>
            <a href="{{route('profile')}}" class="menu {{ request()->is('notifier/profile*')? 'menu--active' : '' }}">
                <div class="menu__icon">
                    <img src="{{ request()->is('notifier/profile*')? asset('assets/frontend/images/tdr/header/profile_active.png') : asset('assets/frontend/images/tdr/header/profile.png') }} " class="w-4 inactive">
                </div>
                <div class="menu__title"> Profile </div>
            </a>
        </li>

    </ul>
</div>
<!-- END: Mobile Menu -->
<!-- BEGIN: Top Bar -->
<div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
    <div class="top-bar-boxed flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <!-- <img alt="logo" class="w-6" src="dist/images/logo.svg"> -->
            <span class="text-white text-3xl font-medium ml-3"> TDR </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
            <!-- <a href="#" class="">Estate Registry   </a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="" class="breadcrumb--active">Create Estate Account</a> -->
            <div class="search hidden flex sm:block">
                <input type="text" style="border-left: 0px solid #002b5c !important;" class="pl-4 search__input input font-sans placeholder-theme-13" placeholder="Search by Departed Name">
                <!-- <i data-feather="search" class="search__icon"></i> -->
                <img src="{{asset('assets/frontend/images/tdr/header/search.png')}}" class="w-4 search__icon">
            </div>
        </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="ct-topbar">
                <div class="container">
                    <ul class="list-unstyled list-inline ct-topbar__list">
                        <li class="ct-language flex justify-between">
                            <img src="{{asset('assets/frontend/images/tdr/flags/english.svg')}}" class="w-8 ml-4 font-sans img-mb" alt="USA"> &nbsp; &nbsp;English <i class="fas fa-chevron-down"></i>
                            <ul class="list-unstyled ct-language__dropdown">
                                <li class="">
                                    <a href="#googtrans(en|en)" class="lang-en lang-select p-1 pr-2 w-8 flex justify-between font-sans" data-lang="en"><img src="{{asset('assets/frontend/images/tdr/flags/english.svg')}}" class="h-4 mt-img" alt="USA"> &nbsp;&nbsp;&nbsp;English</a>
                                </li>
                                <!-- <li>
                                    <a href="#googtrans(en|es)" class="lang-es lang-select" data-lang="es"><img src="https://www.solodev.com/assets/google-translate/flag-mexico.png" alt="MEXICO"></a>
                                </li> -->
                                <li class="flex justify-between">
                                    <a href="#googtrans(en|fr)" class="lang-es lang-select w-8 p-1  pr-2 font-sans " data-lang="fr"><img src="{{asset('assets/frontend/images/tdr/flags/french.jpg')}}" class="h-4 mt-img" alt="FRANCE">&nbsp;&nbsp;&nbsp;French</a>
                                </li>
                                <li class="flex justify-between">
                                    <a href="#googtrans(en|zh-CN)" class=" lang-es lang-select p-1  pr-2 font-sans w-8" data-lang="zh-CN"><img src="{{asset('assets/frontend/images/tdr/flags/chinese.png')}}" class="h-4 mt-img" alt="CHINA">&nbsp;&nbsp;&nbsp;Chinese</a>
                                </li>
                                <!-- <li>
                                    <a href="#googtrans(en|ja)" class="lang-es lang-select" data-lang="ja"><img src="https://www.solodev.com/assets/google-translate/flag-japan.png" alt="JAPAN"></a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <a class="notification notification--light sm:hidden" href="">
                <!-- <i data-feather="search" class="notification__icon"></i>  -->
                <img src="{{asset('assets/frontend/images/tdr/header/search.png')}}" class="search-mobile">
            </a>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Notifications -->
        <div class="intro-x dropdown relative mr-4 sm:mr-6 ">
            <!-- <div class="dropdown-toggle notification notification--light notification--bullet cursor-pointer ">
                <i data-feather="bell " class="notification__icon "></i>
            </div> -->
            <img src="{{asset('assets/frontend/images/tdr/header/notification.png')}} " class="w-4 ">
            <div class="notification-content dropdown-box mt-8 absolute top-0 right-0 z-10 -mr-10 sm:mr-0 ">
                <div class="notification-content__box dropdown-box__content box ">
                    <div class="notification-content__title ">Notifications</div>
                    <div class="cursor-pointer relative flex items-center ">
                        <div class="w-12 h-12 flex-none image-fit mr-1 ">
                            <img alt=" " class="rounded-full " src="{{asset('assets/frontend/images/profile-10.jpg')}} ">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white "></div>
                        </div>
                        <div class="ml-2 overflow-hidden ">
                            <div class="flex items-center ">
                                <a href="javascript:; " class="font-medium truncate mr-5 ">Tom Cruise</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap ">03:20 PM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 ">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5 ">
                        <div class="w-12 h-12 flex-none image-fit mr-1 ">
                            <img alt=" " class="rounded-full " src="{{asset('assets/frontend/images/profile-12.jpg')}} ">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white "></div>
                        </div>
                        <div class="ml-2 overflow-hidden ">
                            <div class="flex items-center ">
                                <a href="javascript:; " class="font-medium truncate mr-5 ">Leonardo DiCaprio</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap ">01:10 PM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 ">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5 ">
                        <div class="w-12 h-12 flex-none image-fit mr-1 ">
                            <img alt=" " class="rounded-full " src="{{asset('assets/frontend/images/profile-11.jpg')}} ">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white "></div>
                        </div>
                        <div class="ml-2 overflow-hidden ">
                            <div class="flex items-center ">
                                <a href="javascript:; " class="font-medium truncate mr-5 ">Brad Pitt</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap ">03:20 PM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 ">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5 ">
                        <div class="w-12 h-12 flex-none image-fit mr-1 ">
                            <img alt=" " class="rounded-full " src="{{asset('assets/frontend/images/profile-11.jpg')}} ">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white "></div>
                        </div>
                        <div class="ml-2 overflow-hidden ">
                            <div class="flex items-center ">
                                <a href="javascript:; " class="font-medium truncate mr-5 ">Morgan Freeman</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap ">06:05 AM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 ">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5 ">
                        <div class="w-12 h-12 flex-none image-fit mr-1 ">
                            <img alt=" " class="rounded-full " src="{{asset('assets/frontend/images/profile-6.jpg')}} ">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white "></div>
                        </div>
                        <div class="ml-2 overflow-hidden ">
                            <div class="flex items-center ">
                                <a href="javascript:; " class="font-medium truncate mr-5 ">Nicolas Cage</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap ">07:00 PM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8 relative ">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110 ">
                <img alt=" " src="{{asset('assets/frontend/images/profile-10.jpg')}} ">
            </div>
            <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20 ">
                <div class="dropdown-box__content box bg-theme-38 text-white ">
                    <div class="p-4 border-b border-theme-40 ">
                        <div class="font-medium font-sans ">Sean Connery Williams</div>
                        <div class="text-xs font-sans text-theme-41 ">seanconnery@gmail.com</div>
                    </div>
                    <div class="p-2 ">
                        <a href=" " class="flex items-center block p-2 font-sans transition duration-300 ease-in-out hover:bg-theme-1 rounded-md ">
                            <!-- <i data-feather="user " class="w-4 h-4 mr-2 "></i>  -->
                            <img src="{{asset('assets/frontend/images/tdr/header/profile.png')}} " class="w-4 h-4 mr-2 "> Profile </a>
                        <!-- <a href=" " class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md "> <i data-feather="edit " class="w-4 h-4 mr-2 "></i> Add Account </a> -->
                        <a href=" " class="flex items-center font-sans block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md ">
                            <img src="{{asset('assets/frontend/images/tdr/header/reset_password.png')}} " class="w-4 mr-2 "> Reset Password </a>
                        <a href=" " class="flex items-center font-sans block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md ">
                            <img src="{{asset('assets/frontend/images/tdr/header/support.png')}} " class="w-4 h-4 mr-2 "> Support </a>
                    </div>
                    <div class="p-2 border-t border-theme-40 ">
                        <a href="{{route('logout')}}" class="flex items-center font-sans block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md ">
                            <img src="{{asset('assets/frontend/images/tdr/header/logout.png')}} " class="w-4 mr-2 "> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->
<!-- BEGIN: Top Menu -->
<nav class="top-nav ">
    <ul>
        <li>
            <a href="{{route('completed-estate-account')}}" class="top-menu {{ request()->is('notifier/completed-estate-account*')? 'top-menu--active' : '' }} ">
                <div class="top-menu__icon ">
                    <img src="{{ request()->is('notifier/completed-estate-account*')? asset('assets/frontend/images/tdr/header/complete_estate_account_active.png') : asset('assets/frontend/images/tdr/header/complete_estate_account.png') }} " class="w-4 inactive ">
                </div>
                <div class="top-menu__title ">Complete Estate Account </div>
            </a>
        </li>
        <li>
            <a href="{{route('step.one')}}" class="top-menu {{ request()->is('notifier/decedent-request/step*')? 'top-menu--active' : '' }}">
                <div class="top-menu__icon ">
                    <img src="{{ request()->is('notifier/decedent-request/step*')? asset('assets/frontend/images/tdr/header/create_estate_account_active.png') : asset('assets/frontend/images/tdr/header/create_estate_account.png') }} " class="w-4 inactive ">
                </div>
                <div class="top-menu__title "> Create Estate Account
                    <!-- <i data-feather="chevron-down " class="top-menu__sub-icon "></i> -->

                </div>
            </a>
            <!-- <ul class=" ">
                <li>
                    <a href="# " class="top-menu ">
                        <div class="top-menu__icon "> <i data-feather="activity "></i> </div>
                        <div class="top-menu__title "> Side Menu </div>
                    </a>
                </li>
                <li>
                    <a href="# " class="top-menu ">
                        <div class="top-menu__icon "> <i data-feather="activity "></i> </div>
                        <div class="top-menu__title "> Simple Menu </div>
                    </a>
                </li>
                <li>
                    <a href="# " class="top-menu ">
                        <div class="top-menu__icon "> <i data-feather="activity "></i> </div>
                        <div class="top-menu__title "> Top Menu </div>
                    </a>
                </li>
            </ul> -->
        </li>
        <li>
            <a href="{{route('uncompleted-estate-account')}}" class="top-menu {{ request()->is('notifier/uncompleted-estate-account*')? 'top-menu--active' : '' }}">
                <div class="top-menu__icon ">
                    <img src="{{ request()->is('notifier/uncompleted-estate-account*')? asset('assets/frontend/images/tdr/header/uncomplete_estate_account_active.png') : asset('assets/frontend/images/tdr/header/uncomplete_estate_account.png') }} " class="w-4 inactive ">
                </div>
                <div class="top-menu__title "> Uncomplete Estate Account</div>
            </a>

        </li>
        <li>
            <a href="{{route('support')}}" class="top-menu {{ request()->is('notifier/support*')? 'top-menu--active' : '' }}">
                <div class="top-menu__icon ">
                    <img src="{{ request()->is('notifier/support*')? asset('assets/frontend/images/tdr/header/support.png') : asset('assets/frontend/images/tdr/header/support.png') }} " class="w-4 inactive ">
                </div>
                <div class="top-menu__title "> Support </div>
            </a>

        </li>
        <li>
            <a href="{{route('profile')}}" class="top-menu {{ request()->is('notifier/profile*')? 'top-menu--active' : '' }}">
                <div class="top-menu__icon ">
                    <img src="{{ request()->is('notifier/profile*')? asset('assets/frontend/images/tdr/header/profile_active.png') : asset('assets/frontend/images/tdr/header/profile.png') }} " class="w-4 inactive ">
                </div>
                <div class="top-menu__title "> Profile </div>
            </a>

        </li>
    </ul>
</nav>
<!-- END: Top Menu -->
