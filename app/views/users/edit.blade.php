@section('content')
<h3>User: {{ $user->name }}</h3>
{{ Form::open(array('method'=>'POST', 'route' => array('users.edit', $user->id))) }}
	<p>
		{{ Form::label('name', 'Change name:') }}
		{{ Form::text('name', $user->name) }}
	</p>
	<p>
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email', $user->email) }}
	</p>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@include("partials.errors")

<h4>Just test</h4>
{{Form::model($user, array('route' => array('users.edit', $user->id)))}}
<p>
	{{ Form::label('name', 'Change name:') }}
	{{ Form::text('name') }}
</p>
<p>
	{{ Form::label('email', 'Email:') }}
	{{ Form::text('email') }}
</p>
{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}
@stop