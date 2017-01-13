@extends('admin.main')

@section('title', "| Edit Tag")

@section('head')
    @include('partials._head')
@endsection

@section('nav')
    @include('partials._nav')
@stop

@section('content')
	
	{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"]) }}
		
		{{ Form::label('name', "Title:") }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}

		{{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}
	{{ Form::close() }}

@endsection