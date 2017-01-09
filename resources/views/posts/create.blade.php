@extends('main')

@section('title','| Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
//        tinymce.init({
//            selector: 'textarea',
//            plugins: 'link code print',
//            browser_spellcheck: true,
//            menubar: false,
//        });
            tinymce.init({
                selector: 'textarea',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_css: '//www.tinymce.com/css/codepen.min.css'
            });
    </script>
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