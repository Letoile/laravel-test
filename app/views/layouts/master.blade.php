<!-- Расположен в app/views/layouts/master.blade.php -->

<html>
<body>
@section('sidebar')
Это - главная боковая панель.
@show

<div class="container">
	@yield('content')
</div>
</body>
</html>