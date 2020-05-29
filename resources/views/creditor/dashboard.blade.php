@extends('creditor.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 ">

                        <div class="grid grid-cols-12 gap-6 ">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <h2 class="font-sans text-lg text-creditor-light-blue font-semibold">Data In Queue</h2>
                                            <div class="ml-auto mt-1">
                                                <p class="font-sans text-sm text-white font-medium"><a href="{{ route('creditor.queue-data') }}">View More</a></p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="text-4xl font-bold text-white mt-8">55</div>
                                            <div class="ml-auto mt-auto">
                                                <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/alert.png')}}" class="w-16">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box ">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <h2 class="font-sans text-lg text-creditor-light-blue font-semibold">Imported Today</h2>
                                            <div class="ml-auto mt-1">
                                                <p class="font-sans text-sm text-white font-medium">View More</p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="text-4xl font-bold text-white mt-8">30</div>
                                            <div class="ml-auto mt-auto">
                                                <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/download-cloud.png')}}" class="w-16">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box ">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <h2 class="font-sans text-lg text-creditor-light-blue font-semibold">Total Imported</h2>
                                            <div class="ml-auto mt-1">
                                                <p class="font-sans text-sm text-white font-medium">View More</p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="text-4xl font-bold text-white mt-8">245</div>
                                            <div class="ml-auto mt-auto">
                                                <img src="{{ asset('assets/dist/images/tdr_creditor/dashboard/file-text.png')}}" class="w-12">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN:Imported Statistics -->
                    <div class="col-span-12 lg:col-span-8 mt-8">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-xl text-white  font-sans font-medium truncate mr-5">
                                Imported Statistics
                            </h2>
                            <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700">
                                <div class="dropdown relative xl:ml-auto mt-5 xl:mt-0">
                                    <button class="dropdown-toggle ml-auto button font-normal border text-white focus:outline-none active:outline-none relative flex items-center text-white"> 2019<i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                                    <div class="dropdown-box mt-10 absolute w-40 top-0 xl:right-0 z-20">
                                        <div class="dropdown-box__content box p-2  h-auto">
                                            <a href="#" class="text-white flex items-center block p-2 transition duration-300 ease-in-out bg-creditor-light-blue hover:bg-gray-200  rounded-md">2017</a>
                                            <a href="#" class="text-white flex items-center block p-2 transition duration-300 ease-in-out bg-creditor-light-blue hover:bg-gray-200  rounded-md">2018</a>
                                            <a href="#" class="text-white flex items-center block p-2 transition duration-300 ease-in-out bg-creditor-light-blue hover:bg-gray-200  rounded-md">2019</a>
                                            <a href="#" class="text-white flex items-center block p-2 transition duration-300 ease-in-out bg-creditor-light-blue hover:bg-gray-200  rounded-md">2020</a>
                                            <a href="#" class="text-white flex items-center block p-2 transition duration-300 ease-in-out bg-creditor-light-blue hover:bg-gray-200  rounded-md">2021</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y box p-5 mt-16 sm:mt-5">

                            <div class="report-chart">
                                <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END: Imported Statistics -->
                    <!-- BEGIN: Weekly Top Seller -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-4 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-sans text-white font-medium truncate mr-5">
                                Notified Account Type
                            </h2>
                            <!-- <a href="#" class="ml-auto text-theme-1 truncate">See all</a> -->
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <canvas class="mt-3" id="report-pie-chart" height="280"></canvas>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-confirmed-theme rounded-xs mr-3"></div>
                                    <span class="truncate text-sm fonts-sans text-white">Total Confirmed Account - 834</span>
                                    <!-- <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">62%</span> -->
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-4 h-4 bg-non-confirmed-theme rounded-xs mr-3"></div>
                                    <span class="truncate text-sm font-sans text-white">Total Non-Confirmed Account - 546</span>
                                    <!-- <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">33%</span> -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Weekly Top Seller -->




                </div>

            </div>
    @endsection