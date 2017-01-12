@extends('frontend')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', " | $titleTag")

@section('head')
    @include('partials._head-frontend')
@stop

@section('nav')
    @include('partials._nav-frontend')
@stop

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{ asset('images/'.$post->image) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        {{--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>--}}
                        <span class="meta">Posted on {{ date('F nS, Y - g:iA' ,strtotime($post->created_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p>{{strip_tags($post->body)}}</p>
                </div>
            </div>



    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">

                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                        </div>

                    </div>

                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', "Name:") }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-12">
                    {{ Form::label('comment', "Comment:") }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                    {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
        </div>
    </article>
@stop

