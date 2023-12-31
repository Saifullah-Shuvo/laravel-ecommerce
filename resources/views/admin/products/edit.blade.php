@extends('admin.layouts.app')
{{-- @dd($product) --}}
@section('title')
    Edit Products
@endsection

@push('style')
    <!-- dropzone css -->
    <link rel="stylesheet" href="{{asset('admins')}}/assets/libs/dropzone/dropzone.css" type="text/css" />

    <!-- Filepond css -->
    <link rel="stylesheet" href="{{asset('admins')}}/assets/libs/filepond/filepond.min.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('admins')}}/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
@endpush

@section('panel')
    {{-- @dd($product->product_images()); --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Edit Products</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Edit Products</li>
            </ol>
        </div>
    </div>
    <form action="{{ route('product.update',['id' => $product->id]) }}" method="POST" enctype="multipart/form-data" id="image-upload" class="dropzone">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Product Title</label>
                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                            <input type="text" class="form-control d-none" id="product-id-input">
                            <input type="text" name="name" class="form-control" id="product-title-input" value="{{ $product->name }}" placeholder="Enter product title">
                            <div class="invalid-feedback">
                                @error('name')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label>Product Description</label>

                            <div id="ckeditor-classic">
                                <div>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea5" rows="5" placeholder="Enter product description">{{ $product->description }}</textarea>
                                </div>
                                @error('name')
                                    <div class="error mt-1"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Gallery</h5>
                    </div>
                    <div class="card-body">

                                {{-- Product thumbnail image  --}}
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Product Image</h5>
                            <p class="text-muted">Add Product thumbnail Image.</p>
                            <div class="col-xxl-12">
                                <div>
                                    <input name="thambnail" class="form-control" type="file" id="formFileMultiple">
                                    <br>
                                    <p class="text-muted">Thumbnail Image Preview</p>
                                    <img class="rounded shadow" alt="Thambnai Image" width="300" src={{ asset('admins/productimage/'.$product->thambnail) }}>
                                </div>
                                @error('thambnail')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div><!--end col-->
                        </div>

                                {{-- Product Multiple image  --}}
                        <div>
                            <h5 class="fs-14 mb-1">Product Gallery</h5>
                            <p class="text-muted">Add Product other Images. <b>[Drag n Drop or Add Multiple Images Here]</b> </p>

                            <div class="form-group">
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                <br>
                                <p class="text-muted">Mutlitple Images Preview</p>

                                @forelse($product->product_images as $image)
                                <img class="rounded shadow" alt="" width="200" src={{ asset('admins/productimage/multiImage/'.$image->image_path) }}>
                                @empty
                                <p>No images available for this product.</p>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                    General Info
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Product Unit</label>
                                            <input type="text" name="unit" class="form-control" id="manufacturer-name-input" placeholder="Put product unit" value="{{ $product->unit }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-brand-input">Product Code</label>
                                            <input type="text" name="code" class="form-control" id="manufacturer-brand-input" placeholder="Put product code" value="{{ $product->code }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="stocks-input">Stocks</label>
                                            <input type="text" name="stock_quantity" class="form-control" id="stocks-input" placeholder="Stocks" value="{{ $product->stock_quantity }}">
                                            <div class="invalid-feedback">Please Enter a product stocks.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Purchase Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">$</span>
                                                <input type="text" name="purchase_price" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" value="{{ $product->purchase_price }}">
                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Selling Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">$</span>
                                                <input type="text" name="selling_price" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" value="{{ $product->selling_price }}">
                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Discount</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="product-discount-addon">%</span>
                                                <input type="text" name="discount_price" class="form-control" id="product-discount-input" placeholder="discount" aria-label="discount" aria-describedby="product-discount-addon" value="{{ $product->discount_price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end tab-pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>

                            <select class="form-select" name="status" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Published</option>
                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Unpublished</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="choices-publish-visibility-input" class="form-label">Hot Deal</label>
                            <select class="form-select" name="hot_deal" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="1" {{ $product->hot_deal == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $product->hot_deal == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="choices-publish-visibility-input" class="form-label">Featured Product</label>
                            <select class="form-select" name="featured" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="1" {{ $product->featured == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $product->featured == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="choices-publish-visibility-input" class="form-label">Popular product</label>
                            <select class="form-select" name="popular_product" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="1" {{ $product->popular_product == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $product->popular_product == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="{{route('category.all')}}" class="float-end text-decoration-underline">Add
                                New</a>Select product category</p>
                        <select class="form-select" id="choices-category-input" name="category_id" data-choices data-choices-search-false>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input class="form-control" name="tags" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text" value="{{ $product->tags }}" />
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>

                {{-- <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Short Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Add short description for product</p>
                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                    </div>
                    <!-- end card body -->
                </div> --}}
                <!-- end card -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </form>
@endsection

@push('script')
    <!-- dropzone min -->
    <script src="{{asset('admins')}}/assets/libs/dropzone/dropzone-min.js"></script>
    <!-- filepond js -->
    <script src="{{asset('admins')}}/assets/libs/filepond/filepond.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
    <script src="{{asset('admins')}}/assets/js/pages/form-file-upload.init.js"></script>
    <script src="{{asset('admins')}}/assets/js/app.js"></script>
@endpush





