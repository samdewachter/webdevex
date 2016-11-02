@extends('layouts.app')

@section('content')

	<div class="col-md-8 col-md-offset-2">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $id->name }}</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-7">
					<img class="manage-photo" src="{{ url('uploads/', $id->photo->photo) }}">
				</div>
				<div class="col-md-5">
					<div><label>Ip: </label> {{$id->photo->ip}}</div>
					<div><label>Votes:</label> {{$id->photo->votes}}</div>
					<div><label>Email:</label> {{$id->email}}</div>
					<div><label>Photo name:</label> {{$id->photo->name}}</div>
					<div><label>Disqualified:</label> @if($id->disqualified) Yes @else No @endif</div>
					<div>
						<label>Settings:</label>
						<a class="btn btn-danger" href="{{ url('/manage/delete', $id->id) }}">Delete</a>
						<a class="btn btn-danger" href="{{ url('/manage/disqualify', $id->id) }}">Toggle disqualify</a>
					</div>
				</div>

			</div>
		</div>

	</div>

@endsection