@extends('layouts.main_layout')

@section('pageContent')
	<h1>This is "Grades" Page</h1>
	<h1>{{ $student_name }}</h1>
	<h1>{{ $age }}</h1>

	@foreach ($grades as $grade)
		<p>{{ $grade }}</p>
	@endforeach
@stop


