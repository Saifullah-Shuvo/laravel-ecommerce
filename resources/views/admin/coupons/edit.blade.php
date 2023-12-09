@extends('admin.layouts.app')

@section('title')
    Edit Coupons
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Edit Coupons</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Edit Coupons</li>
            </ol>
        </div>
    </div>
    <form action="{{ route('coupon.update',['id' => $coupon->id]) }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Coupon Code</label>
                            <input type="text" name="code" class="form-control" value="{{ $coupon->code }}">
                            @error('code')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Discount Type</label>

                            <select class="form-select" name="discount_type" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="percentage" {{ $coupon->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                <option value="fixed" {{ $coupon->discount_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Discount Value</label>
                            <input type="number" name="discount_value" class="form-control" value="{{ $coupon->discount_value }}">
                            @error('discount_value')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Expiry Date</label>
                            <input type="text" name="show_expiry_date" class="form-control" value="{{ $coupon->expiry_date }}" placeholder="Enter Date">
                            <p>Update new date: </p>
                            <input type="date" name="expiry_date" class="form-control">
                            @error('expiry_date')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
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
                                <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Published</option>
                                <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>Unpublished</option>
                            </select>
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
@endsection





