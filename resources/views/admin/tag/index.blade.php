@extends('admin.main')

@section('title', '| All Tags')

@section('content')
	<div class="container-fluid">
		<div class="row page-title-row">
			<div class="col-md-6">
				<h3>Tags <small>&raquo; Listing</small></h3>
			</div>
			<div class="col-md-6 text-right">
				<a href="{{route('tags.create')}}" class="btn btn-success btn-md">
					<i class="fa fa-plus-circle"></i> New Tag
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">

				@include('admin.partials.errors')
				@include('admin.partials.success')

				<table id="tags-table" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>Tag</th>
						<th>Title</th>
						<th class="hidden-sm">Subtitle</th>
						<th class="hidden-md">Page Image</th>
						<th class="hidden-md">Meta Description</th>
						<th class="hidden-md">Layout</th>
						<th class="hidden-sm">Direction</th>
						<th data-sortable="false">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($tags as $tag)
						<tr>
							<td>{{ $tag->tag }}</td>
							<td>{{ $tag->title }}</td>
							<td class="hidden-sm">{{ $tag->subtitle }}</td>
							<td class="hidden-md">{{ $tag->page_image }}</td>
							<td class="hidden-md">{{ $tag->meta_description }}</td>
							<td class="hidden-md">{{ $tag->layout }}</td>
							<td class="hidden-sm">
								@if ($tag->reverse_direction)
									Reverse
								@else
									Normal
								@endif
							</td>
							<td>
								<a href="tags/{{ $tag->id }}/edit"
								   class="btn btn-xs btn-info">
									<i class="fa fa-edit"></i> Edit
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{{--<div class="row">--}}
		{{--<div class="col-md-8">--}}
			{{--<h1>Tags</h1>--}}
			{{--<table class="table">--}}
				{{--<thead>--}}
					{{--<tr>--}}
						{{--<th>#</th>--}}
						{{--<th>Name</th>--}}
					{{--</tr>--}}
				{{--</thead>--}}

				{{--<tbody>--}}
					{{--@foreach ($tags as $tag)--}}
					{{--<tr>--}}
						{{--<th>{{ $tag->id }}</th>--}}
						{{--<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>--}}
					{{--</tr>--}}
					{{--@endforeach--}}
				{{--</tbody>--}}
			{{--</table>--}}
		{{--</div> <!-- end of .col-md-8 -->--}}

		{{--<div class="col-md-3">--}}
			{{--<div class="well">--}}
				{{--{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}--}}
					{{--<h2>New Tag</h2>--}}
					{{--{{ Form::label('name', 'Name:') }}--}}
					{{--{{ Form::text('name', null, ['class' => 'form-control']) }}--}}

					{{--{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}--}}
				{{----}}
				{{--{!! Form::close() !!}--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}

@endsection

@section('scripts')
	<script>
		$(function() {
			$("#tags-table").DataTable({
			});
		});
	</script>
@stop