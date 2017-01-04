@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p class="lead">{{$post->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{url('blog/'.$post->slug)}}">{{route('blog.single', $post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{date('M j, Y H:ia',strtotime($post->created_at))}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{date('M j, Y H:ia',strtotime($post->updated_at))}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit','Edit', array($post->id),array('class'=>"btn btn-primary btn-block")) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
                        {{--{!! Html::linkRoute('posts.destroy','Delete', array($post->id),array('class'=>"btn btn-danger btn-block")) !!}--}}
                        {{Form::submit('Delete', ['class'=>"btn btn-danger btn-block"])}}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Html::linkRoute('posts.index','<<< See All Posts', array(),array('class'=>"btn btn-default btn-block btn-h1-spacing")) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection