@section("content")
<h3>Users</h3>
@if (Session::has('success'))
<div class="alert alert-success">
	{{ Session::get('success') }}
</div>
@endif
<div class="row">
	<div class="cols-xs-12">
		<p>{{ link_to_route('users.create', '+ Create', null, array('class' => 'btn btn-primary')) }}</p>
		<table class="table">
			<? $users = User::all() ?>
			@foreach ($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary')) }}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('users.delete', $user->id), 'id' => 'delete-user-form')) }}
					{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
					@include('partials.delete_confirm')
				</td>
			</tr>
			@endforeach

		</table>
	</div>
</div>
<script type="text/javascript">
	jQuery(function($) {
		$(document).on('submit', '#delete-user-form', function(){
			return confirm('Are you sure?');
		});
	});
</script>
@stop