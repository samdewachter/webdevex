@extends('layouts.app')

@section('content')

<div class="photo-page">
	<div class="row col-md-6 col-md-offset-3">
		@if($errors->any())
			<h4 class="green">{{$errors->first()}}</h4>
		@endif
		<div class="full-photo">
			@if($id->Photo != null)


				<div class="title"><h1>{{ $id->Photo->name }}</h1></div>

				<img src="{{ url('/uploads', $id->Photo->photo) }}">

				<div class="photo-made-by">

					<ul>
						<li><a href="{{ url('/myphoto/delete', $id->Photo->id) }}" class="btn btn-danger pull-right">Delete</a></li>
						<li><label>Votes:</label> {{$id->Photo->votes}}</li>
						<li>
							<div class="form-group">
								<div class="input-group">
				                	<label class="input-group-btn">
				                  	 	<button class="copy-btn btn btn-primary" data-clipboard-target="#current-url">
										    Share
										</button>
				                	</label>
				                	<input id="current-url" class="form-control" value="{{ url('photos', $id->photo->id) }}" readonly>
				            	</div>
				            </div>
				        </li>
					</ul>
					
				</div>
			@else

				<p>You have not uploaded a photo yet. Do you want to <a href="{{ url('/upload', $id->id) }}">upload</a> one?</p>

			@endif
		</div>
	</div>
</div>

@endsection