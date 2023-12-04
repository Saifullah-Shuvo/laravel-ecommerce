@extends('frontend.layouts.app')

@section('title')
    Blog Details
@endsection

@section('panel')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Blog Details</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span>Blog Details</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- blog-details-area start-->
    <div class="blog-details-area ptb-100">
        <div class="container">
            {{-- @dd($blogDetails); --}}
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details-wrap">
                        <img src="{{asset('admins')}}/blogimages/{{ $blogDetails->image }}" alt="">
                        <h3>{{ $blogDetails->title }}</h3>
                        <ul class="meta">
                            <li>{{ \Carbon\Carbon::parse($blogDetails->created_at)->format('d M Y') }}</li>
                            <li>By {{ $blogDetails->admin->name }}</li>
                        </ul>

                        <p>{{ $blogDetails->description }}</p>

                        <div class="share-wrap">
                            <div class="row">
                                <div class="col-sm-7 ">
                                    <ul class="socil-icon d-flex">
                                        <li>share it on :</li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://plus.google.com/share?url={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="https://www.instagram.com/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-form-area">
                        <div class="comment-main">
                            <h3 class="blog-title"><span>({{ count($blogDetails->comments) }})</span>Comments:</h3>
                            <ol class="comments">
                                <li class="comment even thread-even depth-1">

                                    @foreach ($blogDetails->comments as $data)
                                    <div class="comment-wrap">
                                        <div class="comment-theme">
                                            <div class="comment-image">
                                                <img src="{{asset('frontend')}}/assets/images/comment/1.png" alt="Jhon">
                                            </div>
                                        </div>
                                        <div class="comment-main-area">
                                            <div class="comment-wrapper">
                                                <div class="sewl-comments-meta">
                                                    <h4>{{ $data->name }} </h4>
                                                    <span>
                                                        {{ $data->created_at->format('d M Y \a\t g:ia') }}
                                                    </span>
                                                </div>
                                                <div class="comment-area">
                                                    <p>{{ $data->comment }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </li>
                            </ol>
                        </div>
                        <div id="respond" class="sewl-comment-form comment-respond form-style">
                            @auth
                            <h3 id="reply-title" class="blog-title">Leave a <span>comment</span></h3>
                            <form novalidate="" action="{{ route('home.blog.comment') }}" method="post" id="commentform" class="comment-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sewl-form-inputs no-padding-left">
                                            <div class="row">
                                                <div class="col-sm-6 col-12">
                                                    <input type="text" name="name" tabindex="2" value="{{ Auth::user()->name }}" required>
                                                    <input type="hidden" name="blog_id" value="{{$blogDetails->id}}">
                                                </div>
                                                @error('name')
                                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                                @enderror
                                                <div class="col-sm-6 col-12">
                                                    <input type="email" name="email" tabindex="3" value="{{ Auth::user()->email }}" required>
                                                </div>
                                                @error('email')
                                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="sewl-form-textarea no-padding-right">
                                            <textarea id="comment" name="comment" tabindex="4" rows="3" cols="30" placeholder="Write Your Comments..." required></textarea>
                                        </div>
                                        @error('comment')
                                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-submit">
                                            <input name="submit" id="submit" value="Send" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <br> <br>
                            <h3 id="reply-title" class="blog-title text-danger">Need to login first to put a <span>comment.</span></h3>
                            <h5> Click <a class="text-info" href="{{ url('/login') }}" target="_self">here</a> to login!</h5>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories">
                            <h4 class="widget-title">Categories</h4>
                            <ul>
                                @foreach($categories as $data)
                                <li><a href="{{ route('home.blog.category',['id'=>$data->id]) }}">{{ $data->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget_recent_entries recent_post">
                            <h4 class="widget-title">Recent Posts</h4>
                            <ul>
                                @foreach($latestBlogs as $data)
                                <li>
                                    <div class="post-img">
                                        <img height="100" width="100" src="{{asset('admins')}}/blogimages/{{ $data->image }}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="{{ route('home.blog.details',['id'=>$data->id]) }}"> {{ $data->title }} </a>
                                        <p>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-details-area end -->

@endsection
