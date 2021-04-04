@extends('layouts.main')

@section('MainContent')


<div class="row">
	<div class="col-12">
		<table class="table table-hover">
			<thead>
				<th>Name</th>
				<th>Birth Date</th>
				<th>Nationality</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>

			<tbody>
				@foreach ($students as $student)
					<tr>
						<td>{{ $student->name }}</td>
						<td>{{ $student->birth_date }}</td>
						<td>{{ $student->nationality }}</td>
						<td><a href="{{ URL('student/edit/' . $student->id) }}">Edit</a></td>

						<td>
							<form method="POST" action="{{ URL('student/delete/' . $student->id) }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<button type="sumbit" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>