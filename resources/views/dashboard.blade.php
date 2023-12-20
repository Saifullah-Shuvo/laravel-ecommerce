@extends('users.layouts.app')

@section('title')
    User Dashboard
@endsection

@section('panel')
    @php
        $user = auth()->user();
        $allOrders = App\Models\Frontend\Order::where('user_id', $user->id)->get();
        $pendingOrders = App\Models\Frontend\Order::where('user_id', $user->id)->where('status', 0)->get();
        $canceledOrders = App\Models\Frontend\Order::where('user_id', $user->id)->where('status', 4)->get();
        $completedOrders = App\Models\Frontend\Order::where('user_id', $user->id)->where('status', 3)->get();
        $orders = App\Models\Frontend\Order::where('user_id', $user->id)->latest()->take(5)->get();
    @endphp
    <!-- First row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card bg-primary text-white mb-3">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Total Order</span>
                            <h3 class="card-title text-white mb-2">{{ count($allOrders) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Canceled Order</span>
                            <h3 class="card-title text-white mb-2">{{ count($canceledOrders) }}</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Completed Order</span>
                            <h3 class="card-title text-white mb-2">{{ count($completedOrders) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card bg-info text-white mb-3">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Pending Order</span>
                            <h3 class="card-title text-white mb-2">{{ count($pendingOrders) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header text-center">Recent Orders</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Order No.</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Amount</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($orders as $key => $data)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $data->order_id }}</strong></td>
                        <td>{{ $data->payment_type }}</td>
                        <td>
                            @if($data->payment_type == 'cash_on_delivery')
                                <span class="badge rounded-pill bg-primary">pending</span>
                            @else
                                <span class="badge rounded-pill bg-success">completed</span>
                            @endif
                        </td>
                        <td>{{ $data->total }}</td>
                        <td>
                            @if($data->status == 0)
                                <span class="badge rounded-pill bg-primary">pending</span>
                            @elseif($data->status == 1)
                                <span class="badge rounded-pill bg-success">confirmed</span>
                            @elseif($data->status == 2)
                                <span class="badge rounded-pill bg-success">shipped</span>
                            @elseif($data->status == 3)
                                <span class="badge rounded-pill bg-success">delivered</span>
                            @elseif($data->status == 4)
                                <span class="badge rounded-pill bg-success">cancelled</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('order.details',['id'=>$data->id]) }}"><i class="bx bx-info-circle me-1"></i>
                                        Show Details</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty 
                    <div class="container">
                        <div class="row justify-content-center">
                            <h5>No Orders Data Found!</h5>
                        </div>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
