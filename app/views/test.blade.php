@extends('layouts.master')

@section('sidebar')
@parent

<p>Этот элемент будет добавлен к главной боковой панели.</p>
@stop

@section('content')
<p>Это - содержимое страницы.</p>
<p>^_____^</p>

@for ($i = 0; $i < 10; $i++)
<p>Текущее значение: {{ $i }}</p>
@endfor

<? $user = User::find(1); ?>
{{$user->name}}


@stop