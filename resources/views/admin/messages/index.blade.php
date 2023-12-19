@extends('admin.layouts.app')

@section('title')
    Message All
@endsection

@section('panel')
@php
use Illuminate\Support\Str;
@endphp
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Messages List</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Messages</li>
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($messages as $key => $data)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td> {{ $data->name }} </td>
                                                    <td> {{ $data->email }} </td>
                                                    <td> {{ Str::limit($data->subject, $limit = 15, $end = '...') }}</td>
                                                    <td> {{ Str::limit($data->message, $limit = 25, $end = '...') }}</td>
                                                    <td>{{ $data->created_at->format('Y-m-d h:i:s') }}</td>
                                                    {{-- <td>
                                                            <a class="dropdown-item text-danger" id="delete"
                                                                href="{{ route('message.delete',['id'=>$data->id]) }}"
                                                                onclick=""><i class="ri-close-circle-fill"></i> Remove</a>                                                       
                                                    </td> --}}
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
                                                                            href="{{ route('message.show',['id'=>$data->id]) }}"><i
                                                                                class="ri-mail-send-line align-bottom me-2 text-muted"></i>
                                                                            Show </a></li>
                                                                    <li><a class="dropdown-item text-danger" id="delete"
                                                                        href="{{ route('message.delete',['id'=>$data->id]) }}"
                                                                        onclick=""><i class="ri-close-circle-fill"></i> Remove</a></li>
                                                                </ul>
                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <h3 class="text-center">No Messages Found! </h3>
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
