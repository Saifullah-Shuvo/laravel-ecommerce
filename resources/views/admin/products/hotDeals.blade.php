@extends('admin.layouts.app')

@section('title')
    Hot Deals 
@endsection

@section('panel')
    {{-- @dd($products) --}}
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Hot Deals</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Hot Deals</li>
            </ol>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-12 col-lg-8">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('product.add') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> Add Product</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList"
                                            placeholder="Search Hot Deal Products...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all"
                                            role="tab">
                                            All <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $hotDeals->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result
                                        <button type="button" class="btn btn-link link-danger p-0 ms-3 shadow-none"
                                            data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->

                    <div class="card-body">

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div class="table-responsive table-card">
                                    <table class="table table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="cardtableCheck">
                                                        <label class="form-check-label" for="cardtableCheck"></label>
                                                    </div>
                                                </th>
                                                <th scope="col">Product Code</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Thambnail</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Discount Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($hotDeals as $product)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="cardtableCheck01">
                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="#" class="fw-semibold">{{ $product->code }}</a></td>
                                                    <td>{{ $product->name }}</td>
                                                    <td><img src=" {{ asset('admins/productimage/' . $product->thambnail) }}"
                                                            alt="" class="rounded avatar-xs shadow"></td>
                                                    <td>{{ $product->created_at->format('Y-m-d h:i:s') }}</td>
                                                    <td>{{ $product->category->category_name }}</td>
                                                    <td>{{ $product->selling_price }}</td>
                                                    <td>{{ $product->discount_price }}</td>
                                                    @if ($product->status == 1)
                                                        <td><span class="badge bg-success">Published</span></td>
                                                    @else
                                                        <td><span class="badge bg-danger">Unpublished</span></td>
                                                    @endif
                                                    <td data-column-id="action" class="gridjs-td">
                                                        <span>
                                                            <div class="dropdown"><button
                                                                    class="btn btn-soft-secondary btn-sm dropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false"><i
                                                                        class="ri-more-fill"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    style="">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('product.edit', ['id' => $product->id]) }}"><i
                                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit</a></li>
                                                                    <li><a class="dropdown-item edit-list" id="delete"
                                                                            data-edit-id="1"
                                                                            href="{{ route('product.delete', ['id' => $product->id]) }}"><i
                                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                            Delete</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    {{-- <li><a class="dropdown-item remove-list"
                                                                            href="#" data-id="1"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#removeItemModal"><i
                                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                            Delete</a></li> --}}
                                                                </ul>
                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end tab pane -->

                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
