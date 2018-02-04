@extends('layouts.master')

@section('title', 'View Crop')

@section('content')
	<div class="container">
		<div class="col-md-6 offset-md-3">
			<div class="row justify-content-center">
				<h3 class="text-capitalize">{{ $crop->name }}</h3>
			</div>
			<div class="show_table">
				<table class="table table-bordered table-inverse">
					<thead>
						<tr>
							<th>Attributes</th>
							<th>Values</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Name</td>
							<td>{{ $crop->name }}</td>
						</tr>
						<tr>
							<td>Altitude</td>
							<td>{{ $crop->altitude }}</td>
						</tr>
						<tr>
							<td>Harvesting method</td>
							<td>{{ $crop->farming_method }}</td>
						</tr>
						<tr>
							<td>Harvesting Time</td>
							<td>{{ $crop->harvesting_time }}</td>
						</tr>
						<tr>
							<td>Disease</td>
							<td>
								<ul>
									@foreach($crop->disease as $disease)
										<li>{{ $disease->name }}</li>
									@endforeach
								</ul>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="row justify-content-center">
					<a href="{{ route('crop.index') }}" class="btn btn-primary">View All Crops</a>
				</div>
			</div>
		</div>
	</div>
@endsection