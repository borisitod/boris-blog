@extends('frontend')

@section('title', '| Blog')

@section('head')
    @include('partials._head-frontend')
@stop

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('frontend/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Welcome to My Blog!</h1>
                        <hr class="small">
                        <span class="subheading">Thank you so much for visiting. This is my first website built with Laravel. Please read my popular post!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('nav')
    @include('partials._nav-frontend')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{url('blog/'.$post->slug)}}">
                        <h2 class="{{url('blog/'.$post->slug)}}">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{substr(strip_tags($post->body), 0, 300)}}{{strlen(strip_tags($post->body)) > 300 ? "..." : ""}}
                        </h3>
                    </a>
                    {{--<p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>--}}
                    <p class="post-meta">Posted on {{date('M j, Y', strtotime($post->created_at))}}</p>
                </div>
                <hr>
        @endforeach
        <!-- Pager -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop

{{--@section('content')--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<h1>Blog</h1>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--@foreach($posts as $post)--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<h2>{{$post->title}}</h2>--}}
            {{--<h5>Published: {{date('M j, Y', strtotime($post->created_at)) }}</h5>--}}
            {{--<p>{{substr(strip_tags($post->body), 0 , 255)}} {{strlen(strip_tags($post->body))>250 ? "..." : "" }}</p>--}}
            {{--<a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Read More</a>--}}
            {{--<hr>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="text-center">--}}
                {{--{!! $posts->links() !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@stop--}}