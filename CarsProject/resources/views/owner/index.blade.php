<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	@foreach ($owners as $owner)
		<p>{{ $owner->name }}</p>
		<p>@if (!empty($owner->car)) {{ $owner->car->id }} - {{ $owner->car->model }} @endif</p>
	@endforeach

</body>
</html>