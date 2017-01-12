@extends('frontend')
@section('title', '| Contact')

{{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
@section('head')
    @include('partials._head-frontend')
@stop

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{asset('frontend/about-bg.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <hr class="small">
                        <span class="subheading">Have questions? I have answers (maybe).</span>
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
        {{--<div class="col-md-12">--}}
            {{--<h1>Contact Me</h1>--}}
            {{--<hr>--}}
            {{--<form id="form" action="{{ url('contact') }}" method="POST">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="form-group">--}}
                    {{--<label name="email">Email:</label>--}}
                    {{--<input id="email" name="email" class="form-control">--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label name="subject">Subject:</label>--}}
                    {{--<input id="subject" name="subject" class="form-control">--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label name="message">Message:</label>--}}
                    {{--<textarea id="message" name="message" class="form-control"></textarea>--}}
                {{--</div>--}}

                {{--<div class="g-recaptcha" data-sitekey="6LcSRREUAAAAAGdBTbHqVlxGw4lLGDQatAvTQ03H"></div>--}}
                {{--{!! Recaptcha::render() !!}--}}

                {{--<input type="submit" value="Send Message" class="btn btn-success btn-h1-spacing">--}}
            {{--</form>--}}
        {{--</div>--}}
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
            <form name="sentMessage" id="contactForm" action="{{ url('contact') }}" method="POST" novalidate>
                {{ csrf_field() }}

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Email Address</label>
                        <input name="email" type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label name="subject">Subject:</label>
                        <input  id="subject" name="subject" type="text" class="form-control" placeholder="subject"  required data-validation-required-message="Please enter your subject.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Message</label>
                        <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                {{--<div class="g-recaptcha" data-sitekey="6LcSRREUAAAAAGdBTbHqVlxGw4lLGDQatAvTQ03H"></div>--}}
                {{--{!! Recaptcha::render() !!}--}}
                {{--<br>--}}
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
    {{--<script>--}}
        {{--$('#form').submit(function(event){--}}
            {{--var verified = grecaptcha.getResponse();--}}
            {{--if(verified.length === 0 ){--}}
                {{--event.preventDefault();--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
{{--@stop--}}
