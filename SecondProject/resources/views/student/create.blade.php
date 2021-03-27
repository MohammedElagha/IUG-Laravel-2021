@extends('layouts.main')

@section('MainContent')

	<div class="row">
		<div class="col-12">
			
			<form action="{{ URL('student/store/' . '55') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label for="name">Student Name</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>

				<div class="form-group">
					<label for="birth_date">Student Birth Date</label>
					<input type="text" name="birth_date" id="birth_date" class="form-control" value="{{ $default_birth_date }}">
				</div>

				<div class="form-group">
					<label for="nationality">Nationality</label>
					<select name="nationality" id="nationality" class="form-control">
						<option value="-1"></option>
						<option value="PAL" selected>Palestinian</option>
						<option value="SYR">Syrian</option>
					</select>
				</div>

				<div class="form-group">
					<label for="postal_code">Postal Code</label>
					<select name="postal_code" id="postal_code" class="form-control">
						<option value="-1"></option>

						@foreach ($postal_codes as $postal_code)
							<option value="{{ $postal_code }}" @if($postal_code == $default_postal_code) selected @endif>{{ $postal_code }}</option>
						@endforeach
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Save</button>
			</form>

		</div>
	</div>

@stop