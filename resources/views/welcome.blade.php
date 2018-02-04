@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <body class="container">
        <div class="col-md-10 offset-md-1">
            <div class="jumbotron">
                <div class="row justify-content-center">
                    <h3 class="display-4 text-center">Welcome to the library management system</h3>
                </div>
                <div class="offset-md-1 col-md-10 card card-body card-block bg-dark">
                    <p class="text-center   lead">
                        This system is for managing crops and the diseases affection those crops.
                        We are focused on quality and precision.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center card card-body">
                <a href="{{ route('crop.index') }}" class="btn btn-primary">View All Crops</a>
            </div>
        </div>
    </body>
@endsection
