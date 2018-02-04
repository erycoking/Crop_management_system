@extends('layouts.master')

@section('title', 'Edit Crop')

@section('content')
	<div class="container">
		<div class="col-md-6 offset-md-3">
			<div class="row justify-content-center">
				<h3>Edit Crop</h3>
			</div>
			<div class="row, justify-content-center">
				<p class="lead alert alert-danger">Are you sure, you want to delete!!!</p>
			</div>
			<div class="edit">
				@include('partials.message')
				<form action="{{ route('crop.destroy', [$crop]) }}" method="post" accept-charset="utf-8">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" readonly="readonly" id="name" name="name" class="form-control" required="required" value="{{ $crop->name }}">
					</div>		
					<div class="form-group">
						<label for="altitude">Altitude:</label>
						<input type="number" readonly="readonly" id="altitude" name="altitude" required="required" class="form-control" value="{{ $crop->altitude }}">
					</div>
					<div class="form-group">
						<label for="harvesting_method">Harvesting Method:</label>
						<input type="text" readonly="readonly" class="form-control" id="harvesting_method" name="harvesting_method" required="required" value="{{ $crop->farming_method }}">
					</div>
					<div class="form-group">
						<label for="date">Harvesting day:</label>
						<input type="date" readonly="readonly" id="datepicker" class="form-control" name="harvesting_time" required="required" value="{{ $crop->harvesting_time->format('m/d/Y') }}" />
					</div>
					<div class="form-group">	
						<label for="diseases">Diseases Affecting the crops:</label>
						@foreach($crop->disease as $disease)
						<div class="input-group remove">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-minus"></span> 
							</div>
							<input type="text" class="form-control" readonly="readonly" id="diseases" name="diseases[]" required="required" value="{{ $disease->name }}">
						</div>
						@endforeach
						<button type="button" class="btn btn-primary" id="disease">Add Disease</button>
						<button type="button" class="btn btn-primary offset-md-5" id="remove_disease">Remove Disease</button>
					</div>
					<div class="row justify-content-center">
						<input type="submit" class=" form-control btn btn-danger" value="Delete">
					</div>		
				</form>
			</div>
		</div>
	</div>
@endsection