@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Email Templates Management</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Email Templates</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Template
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <form class="row infovalidate" method="post" action="{{route('admin.email-template.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="col s12">
                                <div class="input-field col s12">
                                    <input name="type" id="type" type="text" required class="validate" value="{{$data->type}}" disabled>
                                    <label for="type" class="active">Type</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="subject" type="text" name="subject" required class="validate" value="{{$data->subject}}">
                                    <label for="subject">Subject</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="editor" name="message" required class="validate">{{$data->body}}
                                </textarea>
                                <label for="subject">Message</label>
                            </div>
                        </div>

                        <div class="col s12 display-flex justify-content-end mt-3">
                            <button type="submit" class="btn indigo">
                                Save changes</button>
                            <a href="{{route('admin.email-template.list')}}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            @endsection

@section('script')
    <script src="{{ asset('js/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
        @if($errors->any())
            var toastHTML = '{{$errors->first()}}';
            M.toast({html: toastHTML});
        @endif
        @if (session('success'))
            var toastHTML = "{{session('success')}}";
            M.toast({html: toastHTML});
        @endif
    </script>
@endsection
s
