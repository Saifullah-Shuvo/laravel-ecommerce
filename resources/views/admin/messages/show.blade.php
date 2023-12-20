@extends('admin.layouts.app')

@section('title')
    Message Details
@endsection

@section('panel')
    {{-- @dd($details); --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Message Details</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Message</li>
            </ol>
        </div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" id="image-upload">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Name</label>
                            <input type="text" name="name" class="form-control" id="product-title-input" value="{{ $message->name }}">
                            @error('name')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Email</label>
                            <input type="email" name="email" class="form-control" id="product-title-input" value="{{ $message->email }}">
                            @error('email')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Subject</label>
                            <input type="text" name="subject" class="form-control" id="product-title-input" value="{{ $message->subject }}">
                            @error('subject')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>

                        <div>
                            <label>Message</label>

                            <div id="ckeditor-classic">
                                <div>
                                    <textarea name="message" class="form-control" id="exampleFormControlTextarea5" rows="5"
                                    placeholder="Enter Review Text">{{ $message->message }}</textarea>
                                </div>
                                @error('message')
                                    <div class="error mt-1"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                {{-- <div class="text-start mb-3">
                    <button type="submit" class="btn btn-success w-lg ml-3">Update</button>
                </div> --}}
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </form>
@endsection





