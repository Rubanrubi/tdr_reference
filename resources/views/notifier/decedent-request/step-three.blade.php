@extends('notifier.decedent-request.layout')

@section('title')
    Step three
@endsection

@php
    $input_class = "input border border-gray-400 appearance-none rounded-sm w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900";
@endphp

@section('content')
    <div class="col-span-12 sm:col-span-12 lg:col-span-8">

        <div class="intro-y box p-6 card-border-radius">
            <h2 class="font-semibold highlighted-text font-sans text-xl  mr-5">
                3. Uploading Death Certificate or Estate Documents
            </h2>
            <div class="mt-5">
                <p class="text-base text-base-grey font-sans">Please scan/take a picture with your mobile phone and save image of your proof of death certificate and then upload it to our system through your mobile device, laptop or desktop computer by clicking on the “Upload Document”
                    button below. The preference is for you to provide the death certificate and at least one other form of proof (If possible) such as a funeral home verification certificate. If you do not have it at this time, you can exit
                    the system and your information will be saved automatically. You can come back to www.estate-registry.com.au once you have the additional information. </p>
            </div>

            <div class="mt-3">
                <p class="text-base text-light-grey-note font-sans text-grey">*Please select at least one document to upload. You may upload up to five documents totaling 15 megabytes. Accepted document formats are JPG (in black and white) and PDF.</p>
            </div>
            <div class="mt-10">
                <label class="text-base font-sans font-bold mb-5">Upload Documents</label>
                <form method="post" action="{{route('file.upload')}}" enctype="multipart/form-data" class="mt-3 dropzone border-light-grey ">
                    @csrf
                    <input type="hidden" name="request_id" value="{{$data->id}}">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                    <div class="dz-message" data-dz-message>


                        <div class="text-xl font-medium"> Drop files here or click to upload.</div>
                        <!-- <div class="text-gray-600"> Drop files here or click to upload. -->
                        <span class="font-sans text-sm text-light-grey-note">you can add one or more documents</div>
                    <!-- </div> -->
                </form>
            </div>
            <div class="mt-4">
                <p class="text-base text-light-grey-note font-sans">
                    If you have trouble scanning, saving and uploading your document you can fax the document using
                    <br> <span class="highlighted-text text-base font-bold font-sans">+1 (915) 500-6999</span>
                </p>
            </div>

            <form method="post" action="{{route('decedent.request.stepthree')}}">
                <div class="flex mt-10 mb-6">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$data->id}}">
                    <input name="request_stage" type="hidden" value="3" id="request_stage">
                    <div id="dynamic"></div>
                    <div class="xl:w-2/4">

                    </div>
                    <div class="xl:w-1/4">
                        <a href="{{url('/')}}/notifier/decedent-request/step-two?data={{$data->id}}" class="button rounded-none float-right pl-3 pr-3 w-24 mr-1 mb-2 bg-gray-200 text-gray-600">Previous</a>
                    </div>
                    <div class="xl:w-1/4">
                        <button type="submit" class="button rounded-none w-24 ml-3 pl-3 pr-3 mb-2 bg-theme-dark-blue text-white">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script src="{{asset('assets/frontend/js/create-estate-registry-step-two.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        Dropzone.autoDiscover = false;
        $(document).ready(function() {
            var response = <?php echo json_encode($documentData); ?>;
            var url = window.location.origin;
            $(".dropzone").dropzone({
                addRemoveLinks: true,
                maxFilesize: 15,
                acceptedFiles: ".jpeg,.jpg,.png,.pdf",
                init: function () {
                    myDropzone = this;
                    $.each(response, function (key, value) {
                        console.log(value)
                        var path = url+"/uploads/"+value.document;
                        var mockFile = {name: value.document, size: value.size};
                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, path);
                        myDropzone.emit("complete", mockFile);
                    });
                },
                success: function(file) {
                    this.removeFile(file);
                    var args = Array.prototype.slice.call(arguments);
                    console.log(args);
                    var name = args[1].image;
                    var size = args[0].size;
                    if(Array.isArray(args[1])){
                        var toastHTML = args[1].join();
                        toastr["error"](toastHTML);
                    }else {
                        var path = url + "/uploads/" + name;
                        myDropzone = this;
                        var mockFile = {name: name, size: size};
                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, path);
                        myDropzone.emit("complete", mockFile);
                    }
                },
                error: function (file, response) {
                    this.removeFile(file);
                },
                removedfile: function(file) {
                    if(file.status=='success')
                    {
                        var type = 1;
                    }else
                    {
                        var type = 2;
                    }
                    var name = file.name;
                    if(type==2) {
                        $.ajax({
                            type: 'POST',
                            url: '{{route('file.upload')}}',
                            data: {name: name, type: 2, _token: '{{csrf_token()}}'},
                            sucess: function (data) {
                                console.log('success: ' + data);
                            }
                        });
                    }
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }
            });
        });
    </script>
@endsection
