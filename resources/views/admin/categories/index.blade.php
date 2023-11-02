@extends('admin.layouts.app')

@section('title')
Category All
@endsection

@section('panel')
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Category List</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">{{config('app.name')}}</a></li>
            <li class="breadcrumb-item active">Category List</li>
        </ol>
    </div>
</div>

<div class="mt-3 mb-3 d-flex justify-content-end">
    <a href="" type="submit" class="btn btn-md btn-outline-secondary custom-toggle mb-3 float-right"
    data-bs-toggle="modal" data-bs-target="#category_add">
        <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Add New</span>
    </a>
</div>

<div class="container">
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
                @forelse ($categories as $key => $category)

                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$category->category_name}}</td>
                    <td><img src="assets/images/users/avatar-3.jpg" alt="" class="rounded avatar-xxs shadow"></td>
                    <td>07 Oct, 2021</td>
                    <td>
                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                    </td>
                    <td>
                        <span class="badge bg-success">YES</span>
                        <span class="badge bg-warning">NO</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-info" href="#"><i class="ri-pencil-fill"></i> Edit</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-rotate-right"></i> Enable</a>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-rotate-right"></i> Disable</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-task"></i> Feature</a>
                                <a class="dropdown-item text-warning" href="#"><i class="bx bx-task"></i> Unfeature</a>
                            </div>
                        </div>
                    </td>

                </tr>
                @empty
                    <h3 class="text-center">No categories data found! </h3>
                @endforelse
                <tr>

                    <td>1</td>
                    <td>William Elmore</td>
                    <td><img src="assets/images/users/avatar-3.jpg" alt="" class="rounded avatar-xxs shadow"></td>
                    <td>07 Oct, 2021</td>
                    <td>
                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                    </td>
                    <td>
                        <span class="badge bg-success">YES</span>
                        <span class="badge bg-warning">NO</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-info" href="#"><i class="ri-pencil-fill"></i> Edit</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-rotate-right"></i> Enable</a>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-rotate-right"></i> Disable</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-task"></i> Feature</a>
                                <a class="dropdown-item text-warning" href="#"><i class="bx bx-task"></i> Unfeature</a>
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>

                    <td>1</td>
                    <td>William Elmore</td>
                    <td><img src="assets/images/users/avatar-3.jpg" alt="" class="rounded avatar-xxs shadow"></td>
                    <td>07 Oct, 2021</td>
                    <td>
                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                    </td>
                    <td>
                        <span class="badge bg-success">YES</span>
                        <span class="badge bg-warning">NO</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-info" href="#"><i class="ri-pencil-fill"></i> Edit</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-rotate-right"></i> Enable</a>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-rotate-right"></i> Disable</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-task"></i> Feature</a>
                                <a class="dropdown-item text-warning" href="#"><i class="bx bx-task"></i> Unfeature</a>
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>

                    <td>1</td>
                    <td>William Elmore</td>
                    <td><img src="assets/images/users/avatar-3.jpg" alt="" class="rounded avatar-xxs shadow"></td>
                    <td>07 Oct, 2021</td>
                    <td>
                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                    </td>
                    <td>
                        <span class="badge bg-success">YES</span>
                        <span class="badge bg-warning">NO</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-info" href="#"><i class="ri-pencil-fill"></i> Edit</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-rotate-right"></i> Enable</a>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-rotate-right"></i> Disable</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-task"></i> Feature</a>
                                <a class="dropdown-item text-warning" href="#"><i class="bx bx-task"></i> Unfeature</a>
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>

                    <td>1</td>
                    <td>William Elmore</td>
                    <td><img src="assets/images/users/avatar-3.jpg" alt="" class="rounded avatar-xxs shadow"></td>
                    <td>07 Oct, 2021</td>
                    <td>
                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                    </td>
                    <td>
                        <span class="badge bg-success">YES</span>
                        <span class="badge bg-warning">NO</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-info" href="#"><i class="ri-pencil-fill"></i> Edit</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-rotate-right"></i> Enable</a>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-rotate-right"></i> Disable</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-task"></i> Feature</a>
                                <a class="dropdown-item text-warning" href="#"><i class="bx bx-task"></i> Unfeature</a>
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>

                    <td>1</td>
                    <td>William Elmore</td>
                    <td><img src="assets/images/users/avatar-3.jpg" alt="" class="rounded avatar-xxs shadow"></td>
                    <td>07 Oct, 2021</td>
                    <td>
                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                    </td>
                    <td>
                        <span class="badge bg-success">YES</span>
                        <span class="badge bg-warning">NO</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-info" href="#"><i class="ri-pencil-fill"></i> Edit</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-rotate-right"></i> Enable</a>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-rotate-right"></i> Disable</a>
                                <a class="dropdown-item text-success" href="#"><i class="bx bx-task"></i> Feature</a>
                                <a class="dropdown-item text-warning" href="#"><i class="bx bx-task"></i> Unfeature</a>
                            </div>
                        </div>
                    </td>

                </tr>

            </tbody>
        </table>

    </div>
</div>
<div class="modal fade" id="category_add" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalgridLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter firstname">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="category_image" class="form-label">Category Image</label> <br>
                                <input type="file" id="category_image" name="category_image">
                            </div>
                        </div><!--end col-->
                        {{-- <div>
                            <!-- Responsive Images -->
                            <img src="assets/images/small/img-2.jpg" class="img-fluid" alt="category image">
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
