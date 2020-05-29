
<div class="col-span-12 lg:col-span-4">

    <div class="intro-y card-border-radius box pt-6 pl-8 pb-5 ">
        <h2 class="font-sans font-semibold highlighted-text  text-xl  mr-8">
            Please Input the Following Information:
        </h2>
        <div>
            <div>
                <span class="{{ ($step > 1) ? 'border-circle-filled text-white  bg-theme-dark-blue ' : 'border-gray-600 ' }} rounded-full w-12 h-12 border-solid border-2 text-center mt-5 inline-block pt-3">1</span>
                <span class="pl-4 text-base step-head-gray font-sans font-semibold">
                    Notifier Information
                </span>
            </div>
            <div class="{{ ($step > 1) ? 'stepLine-filled' : 'stepLine' }}" ></div>
            <div>
                <span class="{{ ($step > 2) ? 'border-circle-filled text-white  bg-theme-dark-blue' : 'border-gray-400' }} {{ ($step == 2) ? 'border-circle-proccessing -mt-2' : '' }} rounded-full w-12 h-12 border-solid border-2 text-center  inline-block   pt-3">2</span>
                <span class="pl-4 text-base step-head-gray font-sans font-semibold">The Departed</span>
            </div>
            <div class="{{ ($step > 2) ? 'stepLine-filled' : 'stepLine' }}"></div>
            <div>
                <span class="{{ ($step > 3) ? 'border-circle-filled text-white  bg-theme-dark-blue' : 'border-gray-400' }} {{ ($step == 3) ? 'border-circle-proccessing -mt-2' : '' }} rounded-full w-12 h-12 border-solid border-2 text-center  inline-block  pt-3">3</span>
                <span class="pl-4 text-base step-head-gray font-sans font-semibold">
                    Upload Death Certificate or
                </span>
                <br> <span class="ml-16 mb-5">Other Proof of Passing</span></span>
            </div>
            <div class="{{ ($step > 3) ? 'stepLine-filled -mt-8' : 'stepLine -mt-4' }} "></div>
            <div>
                <span class="{{ ($step > 4) ? 'border-circle-filled text-white  bg-theme-dark-blue' : 'border-gray-400' }}  {{$step==4 ? '-mt-2 border-circle-proccessing':''}} rounded-full w-12 h-12 border-solid border-2 text-center  inline-block pt-3">4</span>
                <span class="pl-4 text-base step-head-gray font-sans font-semibold">Input Creditors</span>
            </div>

        </div>
    </div>
</div>

