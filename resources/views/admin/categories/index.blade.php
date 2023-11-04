@extends('admin.layouts.app')

@section('title')
    Category All
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Category List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
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
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td><img src="{{ asset('admins/categoryimage/' . $category->category_image) }}" alt=""
                                    class="rounded avatar-xs shadow"></td>
                            <td>{{ $category->created_at->format('Y-m-d h:i:s') }}</td>
                            <td>
                                @if ($category->status == 1)
                                    <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                                @else
                                    <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                                @endif
                            </td>
                            <td>
                                @if ($category->is_featured == 1)
                                    <span class="badge bg-success">YES</span>
                                @else
                                    <span class="badge bg-warning">NO</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item text-info edit" data-id = "{{ $category->id }}"
                                        data-bs-toggle="modal" data-bs-target="#category_edit" href="">
                                                <i class="ri-pencil-fill"></i> Edit</a>

                                        @if ($category->status == 1)
                                            <a class="dropdown-item text-danger"
                                                href="{{ route('category.status.disable', ['id' => $category->id]) }}"><i
                                                    class="bx bx-rotate-right"></i> Disable</a>
                                        @else
                                            <a class="dropdown-item text-success"
                                                href="{{ route('category.status.enable', ['id' => $category->id]) }}"><i
                                                    class="bx bx-rotate-right"></i> Enable</a>
                                        @endif

                                        @if ($category->is_featured == 1)
                                            <a class="dropdown-item text-warning"
                                                href="{{ route('category.feature.disable', ['id' => $category->id]) }}"><i
                                                    class="bx bx-task"></i> Unfeature</a>
                                        @else
                                            <a class="dropdown-item text-success"
                                                href="{{ route('category.feature.enable', ['id' => $category->id]) }}"><i
                                                    class="bx bx-task"></i> Feature</a>
                                        @endif

                                        <a class="dropdown-item text-danger" id="delete"
                                            href="{{ route('category.delete', ['id' => $category->id]) }}"
                                            onclick=""><i class="ri-close-circle-fill"></i> Delete</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <h3 class="text-center">No categories data found! </h3>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

    {{-- Category Insert Modal --}}
    <div class="modal fade edit" id="category_add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalgridLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name">
                                </div>
                                @error('category_name')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div><!--end col-->
                            <br>
                            <div class="col-xxl-12">
                                <div>
                                    <label for="category_image" class="form-label">Category Image</label> <br>
                                    <input type="file" id="category_image" name="category_image">
                                </div>
                                @error('category_image')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Category Edit Modal  --}}
    <div class="modal fade edit" id="category_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalgridLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="e_category_name">
                                    <input type="hidden" name="id" class="form-control" id="e_category_id">
                                </div>
                                @error('category_name')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div><!--end col-->
                            <br>
                            <div class="col-xxl-12">
                                <div>
                                    <label for="category_image" class="form-label">Category Image</label> <br>
                                    <input type="file" id="category_image" name="category_image">
                                </div>
                                @error('category_image')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div><!--end col-->

                            <img id="preview"/>

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '.edit', function() {
                let cat_id = $(this).data('id');
                let url="{{route('category.edit',':id')}}"
                $.get(url.replace(':id',cat_id), function(data) {
                    $("#preview").attr('src',data.image_path)
                    $('#e_category_name').val(data.category_name);
                    $('#e_category_id').val(data.id);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed: " + textStatus, errorThrown);
                    // Handle the error, e.g., display an error message.
                });
            });
        });
    </script>


    <script>
        function myFunction() {
            // onclick="return myFunction();"
            if (!confirm("Are You Sure to delete this?"))
                event.preventDefault();
        }
    </script>

    {{-- <script>
        $(document).ready(function() {
            "use strict";

            $('.editBtn').on('click', function() {
                let data = $(this).data();
                let category = data.category;
                let modal = $('#category_edit');
                modal.find('input[name="category_name"]').val(category.category_name);
                modal.find('.modalImage').attr('scr', data.image);
                modal.find('form').attr('action', data.action);
                modal.modal('show');
            });

            $('.addBtn').on('click', function() {
                let data = $(this).data();
                let modal = $('#category_edit');

                modal.find('input[name="category_name"]').val('');
                modal.find('.modalImage').attr('scr', '');
                modal.find('form').attr('action', data.action);
                modal.modal('show');
            });
        });
    </script> --}}

@endpush
