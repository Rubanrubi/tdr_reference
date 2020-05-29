<div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-5">
        <div class="top-bar-boxed flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="-intro-x hidden md:flex">
                <!-- <img alt="logo" class="w-6" src="dist/images/logo.svg"> -->
                <span class="text-white text-4xl font-sans font-semibold ml-3"> TDR </span>
            </a>
            <!-- END: Logo -->
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <!-- <p class="font-sans text-2xl text-white font-normal">
                    <span class="text-creditor-light-blue">Welcome</span> Liam!</p> -->
            </div>
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <!-- <p class="text-creditor-light-blue text-sm font-sans">Your Subscription Ends In <span class="text-white">333 Days</span></p> -->
            </div>
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="ct-topbar">
                    <div class="container">
                        <ul class="list-unstyled list-inline ct-topbar__list">
                            <li class="ct-language flex justify-between">
                                <img src="{{ asset('assets/dist/images/tdr/flags/english.svg')}}" class="w-8 ml-4 font-sans img-mb" alt="USA"> &nbsp; &nbsp;
                                <span class="mt-1">English </span>
                                <i class="fas fa-chevron-down mt-2"></i>
                                <ul class="list-unstyled ct-language__dropdown">
                                    <li class="">
                                        <a href="#googtrans(en|en)" class="lang-en lang-select p-1 pr-2 w-8 flex justify-between font-sans" data-lang="en"><img src="{{ asset('assets/dist/images/tdr/flags/english.svg')}}" class="h-4 mt-img" alt="USA"> &nbsp;&nbsp;&nbsp;English</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#googtrans(en|es)" class="lang-es lang-select" data-lang="es"><img src="https://www.solodev.com/assets/google-translate/flag-mexico.png" alt="MEXICO"></a>
                                    </li> -->
                                    <li class="flex justify-between">
                                        <a href="#googtrans(en|fr)" class="lang-es lang-select w-8 p-1  pr-2 font-sans " data-lang="fr"><img src="{{ asset('assets/dist/images/tdr/flags/french.jpg')}}" class="h-4 mt-img" alt="FRANCE">&nbsp;&nbsp;&nbsp;French</a>
                                    </li>
                                    <li class="flex justify-between">
                                        <a href="#googtrans(en|zh-CN)" class=" lang-es lang-select p-1  pr-2 font-sans w-8" data-lang="zh-CN"><img src="{{ asset('assets/dist/images/tdr/flags/chinese.png')}}" class="h-4 mt-img" alt="CHINA">&nbsp;&nbsp;&nbsp;Chinese</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#googtrans(en|ja)" class="lang-es lang-select" data-lang="ja"><img src="https://www.solodev.com/assets/google-translate/flag-japan.png" alt="JAPAN"></a>
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <a class="notification notification--light sm:hidden" href="">
                    <i data-feather="search" class="notification__icon"></i> 
                    <img src="dist/images/tdr/header/search.png" class="search-mobile">
                </a> -->

            </div>
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown relative mr-4 sm:mr-6 ">
                <!-- <div class="dropdown-toggle notification notification--light notification--bullet cursor-pointer ">
                    <i data-feather="bell " class="notification__icon "></i>
                </div> -->
                <img src="{{ asset('assets/dist/images/tdr/header/notification.png')}} " class="w-4 ">
                <div class="notification-content dropdown-box mt-8 absolute top-0 right-0 z-10 -mr-10 sm:mr-0 ">
                    <div class="notification-content__box dropdown-box__content box ">
                        <div class="notification-content__title ">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit mr-1 ">
                                <img alt=" " class="rounded-full " src="{{ asset('assets/dist/images/tdr_creditor/headphones.png')}} ">
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
                                <img alt=" " class="rounded-full " src="{{ asset('assets/dist/images/profile-12.jpg')}} ">
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
                                <img alt=" " class="rounded-full " src="{{ asset('assets/dist/images/profile-11.jpg')}}">
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
                                <img alt=" " class="rounded-full " src="{{ asset('assets/dist/images/profile-11.jpg')}} ">
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
                                <img alt=" " class="rounded-full " src="{{ asset('assets/dist/images/profile-6.jpg')}} ">
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
                    <img alt=" " src="{{ asset('assets/dist/images/tdr_creditor/headphones.png')}}" class="w-4">
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
                                <img src="{{ asset('assets/dist/images/tdr/header/profile.png')}} " class="w-4 h-4 mr-2 "> Profile </a>
                            <!-- <a href=" " class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md "> <i data-feather="edit " class="w-4 h-4 mr-2 "></i> Add Account </a> -->
                            <a href=" " class="flex items-center font-sans block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md ">
                                <img src="{{ asset('assets/dist/images/tdr/header/reset_password.png')}} " class="w-4 mr-2 "> Reset Password </a>
                            <a href=" " class="flex items-center font-sans block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md ">
                                <img src="{{ asset('assets/dist/images/tdr/header/support.png')}} " class="w-4 h-4 mr-2 "> Support </a>
                        </div>
                        <div class="p-2 border-t border-theme-40 ">
                            <a href="{{ route('creditor.logout') }}" class="flex items-center font-sans block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md ">
                                <img src="{{ asset('assets/dist/images/tdr/header/logout.png')}} " class="w-4 mr-2 "> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>

    </div>

    <div class="grid grid-cols-12 gap-6 mb-6">
        <div class="col-span-12 sm:col-span-12 xl:col-span-1 intro-y"></div>
        <div class="col-span-12 sm:col-span-12 xl:col-span-11 intro-y">
            <div class="flex flex-wrap">
                <div class="text-white  xl:mr-auto lg:mr-auto">
                    <div class="-intro-x breadcrumb ">
                        <p class="font-sans text-3xl text-white font-normal">
                            <span class="text-creditor-light-blue">Welcome</span> Liam!</p>
                    </div>
                </div>
                <div class="text-white mt-3 xl:ml-auto lg:ml-auto">
                    <div class="intro-x relative mr-3 sm:mr-6">
                        <p class="text-creditor-light-blue text-base font-sans">Your Subscription Ends In <span class="text-white font-bold">333 Days</span></p>
                    </div>
                </div>
            </div>
        </div>


    </div>
