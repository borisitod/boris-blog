@extends('admin.main')

@section('title', '| View Post')

@section('head')
    @include('partials._head')
@endsection

@section('nav')
    @include('partials._nav')
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <img src="{{asset('/images/' . $post->image)}}"  width="750" class="img-thumbnail" />
            <h1>{{$post->title}}</h1>
            <p class="lead">{!! $post->body !!}</p>

            <hr>

            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="70px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>




        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{url('blog/'.$post->slug)}}">{{route('blog.single', $post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $post->category->name }}</p>
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