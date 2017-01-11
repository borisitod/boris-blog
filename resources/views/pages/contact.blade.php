@extends('main')
@section('title', '| Contact')

{{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            <form id="form" action="{{ url('contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control"></textarea>
                </div>

                {{--<div class="g-recaptcha" data-sitekey="6LcSRREUAAAAAGdBTbHqVlxGw4lLGDQatAvTQ03H"></div>--}}
                {!! Recaptcha::render() !!}composer require filp/whoops

                <input type="submit" value="Send Message" class="btn btn-success btn-h1-spacing">
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
