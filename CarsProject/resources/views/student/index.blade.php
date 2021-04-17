<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	@foreach ($students as $student)
		<p>{{ $student->name }}</p>

		@if (!empty($student->registered_courses))
			@foreach ($student->registered_courses as $registered_course)
				@if (!empty($registered_course->course))
					<p>{{ $registered_course->course->name }}</p>
				@endif
			@endforeach
		@endif
	@endforeach

</body>
</html>