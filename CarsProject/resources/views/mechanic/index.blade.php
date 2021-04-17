<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	@foreach ($mechanics as $mechanic)
		<p>{{ $mechanic->name }}</p>

		<p>
			@if (!empty($mechanic->cars))

				@php $cars = $mechanic->cars; @endphp

				@foreach ($cars as $car)
					<p>{{ $car->model }}</p>
				@endforeach
			@endif
		</p>

		<hr>
	@endforeach

</body>
</html>