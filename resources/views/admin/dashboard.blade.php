@extends('admin.layouts.app')

@section('title')
    Admin Dashboard
@endsection

@section('panel')

@php
    $completedOrders = App\Models\Frontend\Order::where('status', 3)->get();
    $allOrders = App\Models\Frontend\Order::get();
    $users = App\Models\User::get();
    $orders = App\Models\Frontend\Order::latest()->take(5)->get();
    $products = App\Models\Admin\Product::get();
@endphp

<div class="row">
    <!--  -->
    <div class="col">
        <div class="h-100">

            <!-- first row-->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Sales</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ count($completedOrders) }}</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success rounded fs-3">
                                        <i class="bx bx-dollar-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Orders</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ count($allOrders) }}</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info rounded fs-3">
                                        <i class="bx bx-shopping-bag"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Customers</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ count($users) }}</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning rounded fs-3">
                                        <i class="bx bx-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Products</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ count($products) }}</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-danger rounded fs-3">
                                        <i class="bx bx-wallet"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row-->

            <!-- Fourth row-->
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">

                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                                    <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                </button>
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
    
                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Created At</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
    
                                                </tr>
                                            </thead>
                                            <tbody>
    
                                                @forelse ($orders as $key => $data)
                                                    <tr>
                                                        <td> <b>{{ $data->order_id }}</b> </td>
                                                        <td> {{ $data->first_name }} </td>
                                                        <td> <b>{{ $data->total }}</b> </td>
                                                        <td>{{ $data->created_at->format('Y-m-d h:i:s') }}</td>
                                                        <td>
                                                            @if($data->status == 0)
                                                                <span class="badge rounded-pill bg-primary">Pending</span>
                                                            @elseif($data->status == 1)
                                                                <span class="badge rounded-pill bg-secondary">Confirmed</span>
                                                            @elseif($data->status == 2)
                                                                <span class="badge rounded-pill bg-info">Shipped</span>
                                                            @elseif($data->status == 3)
                                                                <span class="badge rounded-pill bg-success">Delivered</span>
                                                            @elseif($data->status == 4)
                                                                <span class="badge rounded-pill bg-danger">Cancelled</span>
                                                            @endif
                                                        </td>
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
                                                                                href="{{ route('admin.order.details',['id'=>$data->id]) }}"><i
                                                                                    class="ri-feedback-line align-bottom me-2 text-muted"></i>
                                                                                Details</a></li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </span>
                                                        </td>
    
                                                    </tr>
                                                @empty
                                                    <h3 class="text-center">No Orders data found! </h3>
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
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div>
            <!-- end row-->

        </div> <!-- end .h-100-->
    </div> <!-- end col -->
</div>

@endsection
