@extends('admin.layouts.app')

@section('title')
    Delivered Orders
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Delivered Orders <span style="color: blue">({{count($deliveredorderCount)}})</span> </h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home')}} ">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Delivered Orders</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-8">
            <div>
                <div class="card">

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

                                            @forelse ($deliveredorders as $key => $data)
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
                </div>
                <!-- end card -->
                {{ $deliveredorders->links() }}
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
