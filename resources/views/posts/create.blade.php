@extends('main')

@section('title','| Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(array('route'=>'posts.store')) !!}
                {{Form::label('title','Title:')}}
                {{Form::text('title',null, array('class'=>'form-control',) )}}

                {{Form::label('slug','Slug:')}}
                {{Form::text('slug',null, array('class'=>'form-control',) )}}

                {{Form::label('category','Category:')}}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name }}</option>
                    @endforeach

                </select>

                {{ Form::label('tags', 'Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                    @endforeach

                </select>

                {{Form::label('body','Body:')}}
                {{Form::textarea('body',null, array('class'=>'form-control',) )}}

                {{Form::submit('Create Post',array('class'=>'btn btn-success btn-large btn-block', 'style'=>'margin-top:20px'))}}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
    {!! HTML::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@stop