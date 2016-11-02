@extends('layouts.app')

@section('content')

<div class="jumbotron">
	<div class="wrapper">
		<h1>Welcome to PhotoContest!</h1>
		<p>Upload your most beautiful picture of nature and get a chance to win a trip to somewhere exotic</p>
		@if(!auth::check())
			<a class="btn btn-primary" href="{{ url('/register') }}">Sign up</a>
		@else
			<a class="btn btn-primary" href="{{ url('/upload', auth::user()->id) }}">Upload</a>
		@endif
	</div>
</div>
<div class="home-content">
	<div class="about-content wrapper">
		<div class="about">

			<h1 class="">What do you have to do?</h1>
			<div class="row">
				<div class="col-md-offset-1">
					<div class="col-md-3">
						<h2>1. Sign up</h2>
						<img class="step-logo" src="{{ URL::asset('images/signup.png') }}">
					</div>
					<div class="col-md-6">
						<p>The first thing you need to do to have a chance of winning a trip is making an account. It's fast and easy. You just click on the 'Sign up' button in the right top corner of the website, fill in your name, email and password and you are done!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-2">
					<div class="col-md-3">
						<h2>2. Upload</h2>
						<img class="step-logo" src="{{ URL::asset('images/upload.png') }}">
					</div>
					<div class="col-md-7">
						<p>The second step is uploading your picture. When you are logged in the button 'Upload' appears, go ahead and click on it. Choose the name of your picture, browse through your files to find your most beautiful picture of nature and press upload. Voila you just entered the compition. If you are not happy with your picture you can simply click on your name in the right top corner and choose 'My photo'. If you are sure you want to delete your picture you press the button 'delete'. After you've deleted the picture you can reupload another one.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-3">
					<div class="col-md-3">
						<h2>3. Share</h2>
						<img class="step-logo" src="{{ URL::asset('images/share.png') }}">
					</div>
					<div class="col-md-7">
						<p>You're almost done. The key to winning this contest is getting the most votes/likes on your photo. The easiest way of getting votes/likes is by sharing your page with all of your friends. Just click on your name and choose 'My photo', like last time, and press the 'Share' button. The page where people can find your picture is now copied to your clipboard. You can easily send the link to your friends now via social media.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-4">
					<div class="col-md-3">
						<h2>4. Wait</h2>
						<img class="step-logo" src="{{ URL::asset('images/sleep.png') }}">
					</div>
					<div class="col-md-8">
						<p>The last, and maybe the most difficult, step is waiting. The contest runs in four periods, so you have to wait until the end of each period to know if you've won. At the end of each period we will check if the winner has won legitimately. If that is done we will contact the winner with the splendid news and his/her photo will stand here on the homepage.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="periods">
		<h1>Periods and prices</h1>

		<ul>
			<li>The first period begins at <span class="date"> {{ $settings->beginPeriod1 }} </span> and ends at <span class="date"> {{ $settings->endPeriod1 }} </span>. The price is a week to Hawai for two people.</li>
			<li>The second period begins at <span class="date"> {{ $settings->beginPeriod2 }} </span> and ends at <span class="date"> {{ $settings->endPeriod2 }} </span>. The price is a week to Ibiza for two people.</li>
			<li>The third period begins at <span class="date"> {{ $settings->beginPeriod3 }} </span> and ends at <span class="date"> {{ $settings->endPeriod3 }} </span>. The price is a week to Thailand for two people.</li>
			<li>The fourth period begins at <span class="date"> {{ $settings->beginPeriod4 }} </span> and ends at <span class="date"> {{ $settings->endPeriod4 }} </span>. The price is a week to Costa Rica for two people.</li>
		</ul>
	</div>
	<div class="winners clearfix">
		<h1>Winners</h1>
		@if(count($winners) == 0)
			
			The contest has no winners yet.

		@else		

			@foreach($winners as $winner)
				<div class="winner col-md-6 col-md-offset-3">
					<div class="winner-heading">
						<img src="{{ url('/uploads', $winner->photo) }}">
					</div>
					<div class="winner-footer">

						{{ $winner->name }} is the winner of period {{ $winner->period }} with {{ $winner->votes }} votes.
						
					</div>
				</div>
			@endforeach
		@endif
	</div>
</div>

<div class="push">
</div>
@endsection