@section("content")
<h3>Users</h3>
@if (Session::has('changed'))
<div class="alert alert-success">
	Your changes are applied successfully =)
</div>
@endif
<div class="row">
	<div class="cols-xs-12">
		<table class="table">
			<? $users = User::all() ?>
			@foreach ($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary')) }}</td>
				<td><button type="button" class="btn btn-danger">Delete</button></td>
			</tr>
			@endforeach

		</table>
	</div>
</div>
@stop