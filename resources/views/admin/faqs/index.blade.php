@extends('admin.layouts.app')

@section('title')
    FAQ All
@endsection

@section('panel')
    @php
    use Illuminate\Support\Str;
    @endphp
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">FAQ List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">FAQ List</li>
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
                                    <a href="{{route('faq.add')}}"
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
                                            All <span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $faqs->count() }}</span>
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
                                                <th scope="col">Question</th>
                                                <th scope="col">Answer</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($faqs as $key => $faq)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td> {{ Str::limit($faq->question, $limit = 25, $end = '...') }} </td>
                                                    <td> {{ Str::limit($faq->answer, $limit = 50, $end = '...') }} </td>
                                                    <td>{{ $faq->created_at->format('Y-m-d h:i:s') }}</td>
                                                    <td>
                                                        @if ($faq->status == 1)
                                                        <span class="badge rounded-pill bg-success-subtle text-success">ENABLED</span>
                                                        @else
                                                        <span class="badge rounded-pill bg-danger-subtle text-danger">DISABLED</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">

                                                                <a class="dropdown-item text-info edit" href="{{ route('faq.edit', ['id' => $faq->id]) }}">
                                                                        <i class="ri-pencil-fill"></i> Edit</a>
                                                                    
                                                                @if ($faq->status == 1)
                                                                <a class="dropdown-item text-danger"
                                                                    href="{{ route('faq.status.disable', ['id' => $faq->id]) }}"><i
                                                                        class="bx bx-rotate-right"></i> Disable</a>
                                                                @else
                                                                    <a class="dropdown-item text-success"
                                                                        href="{{ route('faq.status.enable', ['id' => $faq->id]) }}"><i
                                                                            class="bx bx-rotate-right"></i> Enable</a>
                                                                @endif

                                                                <a class="dropdown-item text-danger" id="delete"
                                                                    href="{{ route('faq.delete', ['id' => $faq->id]) }}"
                                                                    onclick=""><i class="ri-close-circle-fill"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <h3 class="text-center">No FAQ data found! </h3>
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
