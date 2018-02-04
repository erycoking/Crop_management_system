@extends('layouts.master')

@section('title', 'Search results')

@section('content')
    <div class="search-result container">
        <div class="jumbotron">
            <p class="lead display-3 text-center">Search Results</p>
        </div>
        @if(count($crop) > 0)
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
        @elseif(count($crop) === 1)
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
                <tr>
                    <td>#</td>
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
                </tbody>
            </table>
        @else
            <div class="no-result">
                <p class="text-center lead">No result were found. Try to search again !</p>
            </div>
        @endif
        <div class="row justify-content-center card card-body">
            <a href="{{ route('crop.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection