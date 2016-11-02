@extends('layouts.app')

@section('content')

<div class="photo-page">
	<div class="row col-md-6 col-md-offset-3">
		<div class="full-photo">
			<div class="title"><h1>{{ $id->name }}</h1></div>

			<img src="{{ url('/uploads', $id->photo) }}">

			<div class="photo-made-by">

				<ul>
					
					<li><label>Made By:</label> {{$id->User->name}}</li>
					<li><label>Votes:</label> {{$id->votes}}</li>
					<li>
						<div class="form-group">
							@if(Auth::check())
								<a class="btn btn-primary" href="{{ url('/photos/vote', $id->id) }}">Like</a>
							@else
								<a class="btn btn-primary" href="{{ url('/register') }}">Like</a>
							@endif
						</div>
					</li>
					<li>
						<div class="form-group">
							<div class="input-group">
				                <label class="input-group-btn">
				                    <button class="copy-btn btn btn-primary" data-clipboard-target="#current-url">
									    Share
									</button>
				                </label>
				                <input id="current-url" class="form-control" value="{{ url()->current() }}" readonly>
				            </div>

						</div>

					</li>


				</ul>
				
			</div>
		</div>
	</div>
</div>
@endsection