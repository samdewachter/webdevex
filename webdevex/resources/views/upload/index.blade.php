@extends('layouts.app')

@section('content')

	<div class="upload-wrapper">
		<div class="upload-title"><h1>Upload a photo</h1></div>
			@if($settings->beginPeriod1 > $now)

				The contest has not started yet.

			@elseif($settings->endPeriod4 < $now)

				The contest is over you can't upload pictures anymore.

			@else

			
				@if(!$photoCheck)

					<form method="POST" action="{{ url('/upload/store') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
						<div class="form-group {{ $errors->has('photoName') ? ' has-error' : '' }}">
							<label class="control-label">Name:</label>
							<div class="">
								<input type="text" name="photoName" value="{{ old('photoName') }}" class="form-control">
							</div>
							@if ($errors->has('photoName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photoName') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group {{ $errors->has('photoName') ? ' has-error' : '' }}">
							<label>Photo:</label>
							<div class="input-group">
				                <label class="input-group-btn">
				                    <span class="btn btn-primary">
				                        Browse&hellip; <input type="file" name="contestPhoto" style="display: none;">
				                    </span>
				                </label>
				                <input type="text" class="form-control" readonly>
				            </div>
				            @if ($errors->has('contestPhoto'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contestPhoto') }}</strong>
                                </span>
                            @endif
				        </div>
			            <button class="btn btn-primary">Upload</button>
					</form>

				@else
					@if($photoCheck->uploaded)
						<div>

							<p>You already uploaded a picture</p>

						</div>
					@else

						<form method="POST" action="{{ url('/upload/store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
							<div class="form-group">
								<label class="control-label">Name:</label>
								<div class="">
									<input type="text" name="photoName" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label>Photo:</label>
								<div class="input-group">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="contestPhoto" style="display: none;">
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly>
					            </div>
					        </div>
				            <button class="btn btn-primary">Upload</button>
						</form>
					@endif
				@endif
			@endif
			
	</div>

@endsection