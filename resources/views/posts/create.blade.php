@extends('main')

@section('title','| Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(array('route'=>'posts.store')) !!}
                {{Form::label('title','Title:')}}
                {{Form::text('title',null, array('class'=>'form-control',) )}}

                {{Form::label('body','Body:')}}
                {{Form::textarea('body',null, array('class'=>'form-control',) )}}

                {{Form::submit('Create Post',array('class'=>'btn btn-success btn-large btn-block', 'style'=>'margin-top:20px'))}}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
    {!! HTML::script('js/parsley.min.js') !!}
@stop