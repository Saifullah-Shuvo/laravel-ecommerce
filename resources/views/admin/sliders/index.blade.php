@extends('admin.layouts.app')

@section('title')
    Sliders All
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Sliders List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Sliders List</li>
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
                                    <a href="{{route('slider.add')}}" 
                                    class="btn btn-success" id="addproduct-btn"><i 
                                    class="ri-add-line align-bottom me-1"></i> Add New</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList" placeholder="Search Slider...">
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
                                            All <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ count($sliders) }}</span>
                                        </a>
                                    </li>
                                </ul>
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
                        
                                                <th scope="col">No</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($sliders as $key => $slider)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td><img src="{{ asset('admins/sliderimage/' . $slider->image) }}" alt=""
                                                        class="rounded avatar-xs shadow"></td>
                                                    <td>{{ $slider->description }}</td>
                                                    <td>
                                                        @if ($slider->status == 1)
                                                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                                                        @else
                                                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $slider->created_at->format('Y-m-d h:i:s') }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            {{-- <div class="dropdown-menu">
                        
                                                                <a class="dropdown-item text-info edit" href="">
                                                                        <i class="ri-pencil-fill"></i> Edit</a>
                                                                <a class="dropdown-item text-danger" id="delete"
                                                                    href="{{ route('category.delete', ['id' => $category->id]) }}"
                                                                    onclick=""><i class="ri-close-circle-fill"></i> Delete</a>
                                                            </div> --}}
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
