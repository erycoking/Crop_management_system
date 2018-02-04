@extends('layouts.master')

@section('title', 'Edit Crop')

@section('content')
	<div class="container">
		<div class="col-md-6 offset-md-3">
			<div class="row justify-content-center">
				<h3>Edit Crop</h3>
			</div>
			<div class="edit">
				@include('partials.message')
				<form action="{{ route('crop.update', [$crop]) }}" method="post" accept-charset="utf-8">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" id="name" name="name" class="form-control" required="required" value="{{ $crop->name }}">
					</div>		
					<div class="form-group">
						<label for="altitude">Altitude:</label>
						<input type="number" id="altitude" name="altitude" required="required" class="form-control" value="{{ $crop->altitude }}">
					</div>
					<div class="form-group">
						<label for="harvesting_method">Harvesting Method:</label>
						<input type="text" class="form-control" id="harvesting_method" name="harvesting_method" required="required" value="{{ $crop->farming_method }}">
					</div>
					<div class="form-group">
						<label for="date">Harvesting day:</label>
						<input type="date" id="datepicker" class="form-control" name="harvesting_time" required="required" value="{{ $crop->harvesting_time->format('m/d/Y') }}" />
					</div>
					<div class="form-group">	
						<label for="diseases">Diseases Affecting the crops:</label>
						@foreach($crop->disease as $disease)
						<div class="input-group remove">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-minus"></span> 
							</div>
							<input type="text" class="form-control" id="diseases" name="diseases[]" required="required" value="{{ $disease->name }}">
						</div>
						@endforeach
						<button type="button" class="btn btn-primary" id="disease">Add Disease</button>
						<button type="button" class="btn btn-primary offset-md-5" id="remove_disease">Remove Disease</button>
					</div>
					<div class="row justify-content-center">
						<input type="submit" class="btn btn-primary" value="Save">
					</div>		
				</form>
			</div>
		</div>
	</div>
@endsection