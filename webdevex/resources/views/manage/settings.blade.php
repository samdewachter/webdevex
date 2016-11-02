@extends('layouts.app')

@section('content')

	<div class="col-md-8 col-md-offset-2 settings">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Settings</h3>
			</div>
			<div class="panel-body">
				
				<form method="POST" action="{{ url('/manage/contest/settings/update', $settings->id) }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Begin of period 1: </label>
						<input type="date" name="beginPeriod1" value="{{ $settings->beginPeriod1 }}">
						<label>End of period 1: </label>
						<input type="date" name="endPeriod1" value="{{ $settings->endPeriod1 }}">
					</div>
					<div class="form-group">
						<label>Begin of period 2: </label>
						<input type="date" name="beginPeriod2" value="{{ $settings->beginPeriod2 }}">
						<label>End of period 2: </label>
						<input type="date" name="endPeriod2" value="{{ $settings->endPeriod2 }}">
					</div>
					<div class="form-group">
						<label>End of period 3: </label>
						<input type="date" name="beginPeriod3" value="{{ $settings->beginPeriod3 }}">
						<label>End of period 3: </label>
						<input type="date" name="endPeriod3" value="{{ $settings->endPeriod3 }}">
					</div>
					<div class="form-group">
						<label>End of period 4: </label>
						<input type="date" name="beginPeriod4" value="{{ $settings->beginPeriod4 }}">
						<label>End of period 4: </label>
						<input type="date" name="endPeriod4" value="{{ $settings->endPeriod4 }}">
					</div>
					<div class="form-group">
						<label>Now (for testing purpose): </label>
						<input type="date" name="now" value="{{ $settings->now }}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>

			</div>
		</div>

	</div>

@endsection