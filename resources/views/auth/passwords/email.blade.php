@extends('frontend')

@section('title', '| Forgot my Password')

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
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>

				<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
					
					{!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', null, ['class' => 'form-control']) }}

					{{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing']) }}

					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>

@endsection