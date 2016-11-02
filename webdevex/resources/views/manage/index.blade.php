@extends('layouts.app')

@section('content')

<div class="col-md-10 col-md-offset-1 manage-table">
	@if($errors->any())
		<h4 class="green">{{$errors->first()}}</h4>
	@endif
	<div class="panel panel-default panel-table">
		<div class="panel-heading">
			<div class="row">
				<div class="col col-xs-6">
					<h3 class="panel-title">Contestants</h3>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-list">
				<thead>
					<tr>
						<th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Disqualified</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
                      <tr>
                        <td align="center">
                        	@if(!$user->admin)
	                          <a class="btn btn-default" href="{{ url('/manage', $user->id) }}"><em class="fa fa-pencil"></em></a>
	                          <a class="btn btn-danger" href="{{ url('/manage/delete', $user->id) }}"><em class="fa fa-trash"></em></a>
	                        @endif
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->disqualified) Yes @else No @endif</td>
                      </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col col-xs-8">
                    <div class="pull-right"> {{ $users->links() }} </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection