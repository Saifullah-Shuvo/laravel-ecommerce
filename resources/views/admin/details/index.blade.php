@extends('admin.layouts.app')

@section('title')
    All Details
@endsection

@section('panel')
    {{-- @dd($details); --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">All Details</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">All Details</li>
            </ol>
        </div>
    </div>
    @foreach($details as $data)
    <form action="{{ route('details.update',['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data" id="image-upload">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Address</label>
                            <input type="text" name="adderess" class="form-control" id="product-title-input" value="{{ $data->adderess }}">
                            @error('adderess')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Main Email</label>
                            <input type="email" name="main_email" class="form-control" id="product-title-input" value="{{ $data->main_email }}">
                            @error('main_email')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Alternative Email</label>
                            <input type="email" name="alternative_email" class="form-control" id="product-title-input" value="{{ $data->alternative_email }}">
                            @error('alternative_email')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Main Phone</label>
                            <input type="number" name="main_phone" class="form-control" id="product-title-input" value="{{ $data->main_phone }}">
                            @error('main_phone')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Alternate Phone</label>
                            <input type="number" name="alternative_phone" class="form-control" id="product-title-input" value="{{ $data->alternative_phone }}">
                            @error('alternative_phone')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="product-title-input" value="{{ $data->facebook }}">
                            @error('facebook')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Tweeter</label>
                            <input type="text" name="tweeter" class="form-control" id="product-title-input" value="{{ $data->tweeter }}">
                            @error('tweeter')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Linked In</label>
                            <input type="text" name="linkedIn" class="form-control" id="product-title-input" value="{{ $data->linkedIn }}">
                            @error('linkedIn')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Google Plus</label>
                            <input type="text" name="google_plus" class="form-control" id="product-title-input" value="{{ $data->google_plus }}">
                            @error('google_plus')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div>
                            <label>Short Details</label>

                            <div id="ckeditor-classic">
                                <div>
                                    <textarea name="short_details" class="form-control" id="exampleFormControlTextarea5" rows="5"
                                    placeholder="Enter Review Text">{{ $data->short_details }}</textarea>
                                </div>
                                @error('short_details')
                                    <div class="error mt-1"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="text-start mb-3">
                    <button type="submit" class="btn btn-success w-lg ml-3">Update</button>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </form>
    @endforeach
@endsection





