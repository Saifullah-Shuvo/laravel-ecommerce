@extends('frontend.layouts.app')

@section('title')
Blog Category
@endsection

@section('panel')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Blog Page</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span>Category Blogs</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- blog-area start -->
    <div class="blog-area">
        <div class="container">
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>{{ $category->category_name }} Posts</h2>
                    <img src="{{asset('frontend')}}/assets/images/section-title.png" alt="">
                </div>
            </div>
            <div class="row">

                @forelse($category->blogs as $data)
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="blog-wrap">
                        <div class="blog-image">
                            <a href="{{ route('home.blog.details',['id'=>$data->id]) }}">
                                <img src="{{asset('admins')}}/blogimages/{{ $data->image }}" alt="">
                            </a>
                            <ul>
                                <li>{{ \Carbon\Carbon::parse($data->created_at)->format('d') }}</li>
                                <li>{{ \Carbon\Carbon::parse($data->created_at)->format('M') }}</li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $data->admin->name }} </a></li>
                                    <li class="pull-right"><a href="#"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</a></li>
                                </ul>
                            </div>
                            <h3><a href="{{ route('home.blog.details',['id'=>$data->id]) }}">{{ $data->title }}</a></h3>
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="container">
                    <div class="row justify-content-center">
                      <h5>No Blog Post Found!</h5>
                    </div>
                </div>
                @endforelse

                <div class="col-12">

                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->

@endsection
