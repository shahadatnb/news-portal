@extends('admin.layouts.layout')
@section('title')
{{ Str::plural($posttype['title']) }} Category
@endsection
@section('content')
	<div class="row">
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Create Category</h3>
				</div>
				<div class="card-body">
				@include('admin.layouts._message')
				@if ($mode=='edit')
					{!! Form::model($taxonomy,['route'=>['taxonomy.update',$taxonomy->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
				@else
					{!! Form::open(array('route'=>'taxonomy.store','enctype'=>'multipart/form-data')) !!}
				@endif
					{{ Form::hidden('post_type', $posttype['postType'] ) }}
					{{ Form::label('title','Title') }}
					{{ Form::text('title',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
					{{ Form::label('slug','Slug') }}
					{{ Form::text('slug',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
					{{ Form::label('parent_id','Parent') }}
					{{ Form::select('parent_id',$parent_tax,null,array('class'=>'form-control select2', 'placeholder'=>'Select category')) }}

					{{ Form::file('image',null,array('class'=>'form-control')) }}
					{{ Form::submit('Save',array('class'=>'btn btn-success')) }}
				{!! Form::close() !!}
				</div>
			</div>
			<!-- /.box -->
		</div>
		@if ($mode=='create')
		<div class="col-md-7">
		<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Category List</h3>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-striped table-sm">
						<thead>
							<tr>
								<th>Photo</th>
								<th>Title</th>
								<th>Slug</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach($AllTaxonomy as $tax)
							<tr>
								<td><img width="60" src="{{ asset('storage/'.$tax->image) }}" alt="" class="img-thumbnail"></td>
								<td>{{ $tax->title }}</td>
								<td>{{ $tax->slug }}</td>
								<td>
									<a href="{{ route('taxonomy.edit', $tax->id).'?type='.$posttype['postType'] }}" class="btn btn-warning btn-sm">Edit</a>
									<!-- <a href="{{-- URL::to('PostDelete').'/'.$taxonomy->id --}}" class="btn btn-danger btn-sm">Delete</a> -->
								</td>
							</tr>
							@if($tax->children()->count() > 0)
								@foreach($tax->children as $child)
									<tr>
										<td><img width="60" src="{{ asset('storage/'.$child->image) }}" alt="" class="img-thumbnail"></td>
										<td> - {{ $child->title }}</td>
										<td>{{ $child->slug }}</td>
										<td>
											<a href="{{ route('taxonomy.edit', $child->id).'?type='.$posttype['postType'] }}" class="btn btn-warning btn-sm">Edit</a>
										</td>
									</tr>
								@endforeach
							@endif
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.box -->
		</div>
		@endif
	</div>
  </div>
 @endsection
