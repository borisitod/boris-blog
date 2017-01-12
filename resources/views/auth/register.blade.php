@extends('frontend')

@section('title', '| Register')

@section('head')
    @include('partials._head-frontend')
@stop

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{asset('images/home-bg.jpg')}})">
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
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class'=>'form-control']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class'=>'form-control']) }}

                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class'=>'form-control']) }}

                {{ Form::label('password_confirmation', 'Confirm Password:') }}
                {{ Form::password('password_confirmation', ['class'=>'form-control']) }}

                {{ Form::submit('Register',['class'=>'btn btn-primary btn-block form-spacing-top'])}}
            {!! Form::close() !!}
        </div>
    </div>

@stop