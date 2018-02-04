@extends('layouts.master')

@section('title', 'Add Crop')

@section('content')
	<div class="container justify-content-center col-md-6 offset-md-3">
		<h3 class="text-center">Add a new crop</h3>
		@include('partials.message')
		<form action="{{ route('crop.store') }}" class="form" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" class="form-control" required="required" placeholder="Enter Name">
			</div>		
			<div class="form-group">
				<label for="altitude">Altitude:</label>
				<input type="number" id="altitude" name="altitude" required="required" class="form-control" placeholder="Enter altitude in meters">
			</div>
			<div class="form-group">
				<label for="harvesting_method">Harvesting Method:</label>
				<input type="text" class="form-control" id="harvesting_method" name="harvesting_method" required="required" placeholder="Enter harvesting method">
			</div>
			<div class="form-group">
				<label for="date">Harvesting day:</label>
				<input type="date" id="datepicker" class="form-control" name="harvesting_time" required="required" />
			</div>
			<div class="form-group">	
				<label for="diseases">Diseases Affecting the crops:</label>
				<input type="text" class="form-control" id="diseases" name="diseases[]" required="required" placeholder="Enter a disease">
				<button type="button" class="btn btn-primary" id="disease">Add Disease</button>
				<button type="button" class="btn btn-primary offset-md-6" id="remove_disease">Remove Disease</button>
			</div>
			<div class="row justify-content-center">
				<input type="submit" class="btn btn-primary" value="Add Crop">
			</div>
		</form>
	</div>
@endsection