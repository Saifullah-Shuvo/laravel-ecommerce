@extends('admin.layouts.app')

@section('title')
    Add Faqs
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Add Faqs</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Add Faqs</li>
            </ol>
        </div>
    </div>
    <form action="{{route('faq.store')}}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Question</label>
                            <input type="text" name="question" class="form-control" id="product-title-input" value="" placeholder="Enter question">
                                @error('question')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                        </div>
                        <div>
                            <label>Answer</label>

                            <div id="ckeditor-classic">
                                <div>
                                    <textarea name="answer" class="form-control" id="exampleFormControlTextarea5" rows="5" placeholder="Enter answer"></textarea>
                                </div>
                                @error('answer')
                                    <div class="error mt-1"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>

                            <select class="form-select" name="status" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="1" selected>Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                <!-- end card -->

                <div class="text-start mb-3">
                    <button type="submit" class="btn btn-success w-lg">Submit</button>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </form>
@endsection





