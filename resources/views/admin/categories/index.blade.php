@extends('admin.layouts.app')

@section('title')
    Category All
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Category List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecom</a></li>
                <li class="breadcrumb-item active">Category List</li>
            </ol>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="mt-3 mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-md btn-outline-secondary custom-toggle mb-3 float-right"
                    data-bs-toggle="button">
                    <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Add New</span>
                </button>
            </div>

            <div class="table-responsive table-card">
                <table class="table table-nowrap table-striped-columns mb-0">
                    <thead class="table-light">
                        <tr>

                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Is Featured</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>1</td>
                            <td>William Elmore</td>
                            <td><img src="assets/images/users/avatar-3.jpg" alt=""
                                    class="rounded avatar-xxs shadow"></td>
                            <td>07 Oct, 2021</td>
                            <td>
                                <span class="badge rounded-pill bg-success-subtle text-success">Enabled</span>
                                <span class="badge rounded-pill bg-danger-subtle text-danger">Disabled</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Yes</span>
                                <span class="badge bg-warning">No</span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Disabled</a>
                                        <a class="dropdown-item" href="#">Unfeatured</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>

                            <td>1</td>
                            <td>William Elmore</td>
                            <td><img src="assets/images/users/avatar-3.jpg" alt=""
                                    class="rounded avatar-xxs shadow"></td>
                            <td>07 Oct, 2021</td>
                            <td>
                                <span class="badge rounded-pill bg-success-subtle text-success">Enabled</span>
                                <span class="badge rounded-pill bg-danger-subtle text-danger">Disabled</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Yes</span>
                                <span class="badge bg-warning">No</span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Disabled</a>
                                        <a class="dropdown-item" href="#">Unfeatured</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
@endsection
