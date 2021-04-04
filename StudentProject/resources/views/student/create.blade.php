@extends('layouts.main')

@section('MainContent')

	<div class="row">
		<div class="col-12">
			<a href="{{ URL('student') }}">Show Students</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			
			<form action="{{ URL('student/store') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label for="name">Student Name</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>

				<div class="form-group">
					<label for="birth_date">Student Birth Date</label>
					<input type="text" name="birth_date" id="birth_date" class="form-control">
				</div>

				<div class="form-group">
					<label for="nationality">Nationality</label>
					<select name="nationality" id="nationality" class="form-control">
						<option value="-1"></option>
						
						@foreach ($nationalities as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Save</button>
			</form>

		</div>
	</div>

@stop