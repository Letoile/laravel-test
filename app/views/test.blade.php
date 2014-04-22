@section('sidebar')
@parent

<p>Этот элемент будет добавлен к главной боковой панели.</p>
@stop

@section('content')
<div class="row">
	<div class="col-xs-4">
		<p>Это - содержимое страницы.</p>

		<p>^_____^</p>
		<? $user = User::find(1); ?>
		{{$user->name}}
	</div>

	<div class="col-xs-8">
		<table class="table table-striped">
			@for ($i = 0; $i < 10; $i++)
			<tr>
				<td>Текущее значение: {{ $i }}</td>
			</tr>
			@endfor
		</table>
	</div>
</div>

<div class="row">
	<div class="cols-xs-12">
		{{ link_to_route('users.index', "Go to user's list"); }}
	</div>
</div>
@stop