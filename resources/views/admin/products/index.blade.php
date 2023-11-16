@extends('admin.layouts.app')

@section('title')
    Category All
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Products List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Products List</li>
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
                                    <a href="{{route('product.add')}}" 
                                    class="btn btn-success" id="addproduct-btn"><i 
                                    class="ri-add-line align-bottom me-1"></i> Add Product</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList" placeholder="Search Products...">
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
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                            All <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab">
                                            Published <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab">
                                            Draft
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3 shadow-none" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
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
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                                        <label class="form-check-label" for="cardtableCheck"></label>
                                                    </div>
                                                </th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                                        <label class="form-check-label" for="cardtableCheck01"></label>
                                                    </div>
                                                </td>
                                                <td><a href="#" class="fw-semibold">#VL2110</a></td>
                                                <td>William Elmore</td>
                                                <td>07 Oct, 2021</td>
                                                <td>$24.05</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-light">Details</button>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck03">
                                                        <label class="form-check-label" for="cardtableCheck03"></label>
                                                    </div>
                                                </td>
                                                <td><a href="#" class="fw-semibold">#VL2108</a></td>
                                                <td>Whitney Meier</td>
                                                <td>06 Oct, 2021</td>
                                                <td>$21.25</td>
                                                <td><span class="badge bg-danger">Refund</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-light">Details</button>
                                                </td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-published" role="tabpanel">
                                <div class="table-responsive table-card">
                                    <table class="table table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                                        <label class="form-check-label" for="cardtableCheck"></label>
                                                    </div>
                                                </th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck02">
                                                        <label class="form-check-label" for="cardtableCheck02"></label>
                                                    </div>
                                                </td>
                                                <td><a href="#" class="fw-semibold">#VL2109</a></td>
                                                <td>Georgie Winters</td>
                                                <td>07 Oct, 2021</td>
                                                <td>$26.15</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-light">Details</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck03">
                                                        <label class="form-check-label" for="cardtableCheck03"></label>
                                                    </div>
                                                </td>
                                                <td><a href="#" class="fw-semibold">#VL2108</a></td>
                                                <td>Whitney Meier</td>
                                                <td>06 Oct, 2021</td>
                                                <td>$21.25</td>
                                                <td><span class="badge bg-danger">Refund</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-light">Details</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck04">
                                                        <label class="form-check-label" for="cardtableCheck04"></label>
                                                    </div>
                                                </td>
                                                <td><a href="#" class="fw-semibold">#VL2107</a></td>
                                                <td>Justin Maier</td>
                                                <td>05 Oct, 2021</td>
                                                <td>$25.03</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-light">Details</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                <div class="py-4 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                                    </lord-icon>
                                    <h5 class="mt-4">Sorry! No Result Found</h5>
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

