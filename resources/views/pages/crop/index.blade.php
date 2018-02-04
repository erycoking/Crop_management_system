@extends('layouts.master')

@section('title', 'Crops')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<h3 class="lead">All Crops</h3>
		</div>
		<div class="crops">
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<td class="text-center lead">Id</td>
						<td class="text-center lead">Name</td>
						<td class="text-center lead">Altitude</td>
						<td class="text-center lead">Harvesting Method</td>
						<td class="text-center lead">Harvesting Time</td>
						<td class="text-center lead">Diseases</td>
						<td colspan="2" class="text-center lead">Action</td>
					</tr>
				</thead>
				<tbody>
					@foreach($crop as $key=>$crop)
						<tr>
							<td>{{ $key }}</td>
							<td>{{ $crop->name }}</td>
							<td>{{ $crop->altitude }}</td>
							<td>{{ $crop->farming_method }}</td>
							<td>{{ $crop->harvesting_time }}</td>
							<td>
								<ul>
								@foreach($crop->disease as $disease)
									<li class="text-center">{{ $disease->name }}</li>
								@endforeach
								</ul>
							</td>
							<td>
								<a href="{{ route('crop.edit', [$crop]) }}" class="btn btn-primary">Edit</a>
							</td>
							<td>
								<a href="{{ route('delete', [$crop]) }}" class="btn btn-primary">Delete</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="row justify-content-center card card-body">
				<a href="{{ route('crop.create') }}" class="btn btn-primary">Add Crop</a>
			</div>
		</div>
	</div>
@endsection