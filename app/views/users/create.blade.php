@section('content')
<h3>Create new user</h3>
{{ Form::open(array('method'=>'POST', 'route' => 'users.create')) }}
	<p>
		{{ Form::label('name', 'User\'s name:') }}
		{{ Form::text('name') }}
	</p>
	<p>
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email') }}
	</p>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@include("partials.errors")
@stop