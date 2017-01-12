@extends('frontend')

@section('title', '| Edit Blog Post')

@section('head')
    @include('partials._head')
@endsection

@section('nav')
    @include('partials._nav')
@stop

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>
@stop

@section('content')
    <div class="row">
        {!! Form::model($post, ['route'=>['posts.update',$post->id], 'method'=>'PUT', 'files'=>true]) !!}
        <div class="col-md-8">
            {{Form::label('title','Title:')}}
            {{Form::text('title', null,['class'=>'form-control input-lg'] )}}

            {{Form::label('slug','Slug:', ['class'=>'form-spacing-top'])}}
            {{Form::text('slug', null,['class'=>'form-control input-lg'] )}}

            {{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
            {{ Form::select('category_id', $cats, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('tags[]', $tags2, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

            {{ Form::label('featured_img', 'Update a Featured Image', ['class'=>'form-spacing-top']) }}
            {{ Form::file('featured_img') }}

            {{Form::label('body','Body:',['class'=>'form-spacing-top'] )}}
            {{Form::textarea('body', null, ['class'=>'form-control input-lg'] )}}
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{date('M j, Y H:ia',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{date('M j, Y H:ia',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel', array($post->id),array('class'=>"btn btn-danger btn-block")) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Save', ['class'=>"btn btn-success btn-block"])}}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop

@section('scripts')
    {!! HTML::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    </script>
@stop