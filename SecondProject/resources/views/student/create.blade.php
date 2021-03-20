@extends('layouts.main')

@section('MainContent')

	<div class="row">
		<div class="col-12">
			
			<form action="{{ URL('student/create/' . '55') }}" method="GET">
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
						<option value="PAL">Palestinian</option>
						<option value="SYR">Syrian</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Save</button>
			</form>

		</div>
	</div>

@stop