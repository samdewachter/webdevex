@extends('layouts.app')

@section('content')
<div class="grid">
	@if($settings->beginPeriod1 > $now)

		The contest has not started yet.

	@elseif($settings->endPeriod4 < $now)

		The contest is over.

	@else
		@foreach($photos as $photo)
			@if(!$photo->User->disqualified)

				<div class="grid-item grid-item--width2">
					<div class="photo-wrapper">
						<a href="{{ url('/photos', $photo->id) }}">
							<img src="{{ url('/uploads', $photo->photo) }}" class="contest-photo">
						</a>
						<div class="like-photo clearfix">

							@if(Auth::check())

								@foreach($user->userVote as $uservote)

									@if($uservote->photo_id == $photo->id)

										<p class="pull-left">Already liked this photo</p>

									@endif

								@endforeach
								<a class="@foreach($user->userVote as $uservote) @if($uservote->photo_id == $photo->id) hide @endif @endforeach" href="{{ url('/photos/vote', $photo->id) }}">Like</a>
							@else

							<a href="{{ url('/register') }}">Like</a>

							@endif
							<div class="votes pull-right">
								{{$photo->votes}}	
							</div>
						</div>
					</div>
				</div>
			@endif
		@endforeach
	@endif
</div>

@endsection