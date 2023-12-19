@extends('admin.layouts.app')

@section('title')
    FAQ All
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Subscribers List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Subscribers</li>
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

                                                <th scope="col">No</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">IP</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Remove</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($subscribers as $key => $data)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td> {{ $data->email }} </td>
                                                    <td> {{ $data->ip_address }} </td>
                                                    <td>{{ $data->created_at->format('Y-m-d h:i:s') }}</td>
                                                    <td>
                                                            <a class="dropdown-item text-danger" id="delete"
                                                                href="{{ route('subscriber.delete',['id'=>$data->id]) }}"
                                                                onclick=""><i class="ri-close-circle-fill"></i> Remove</a>                                                       
                                                    </td>
                                                </tr>
                                            @empty
                                                <h3 class="text-center">No Subscribers data found! </h3>
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
