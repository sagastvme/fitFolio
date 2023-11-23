@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details of workout</div>

                    <h1>Name {{$workout->getName()}}</h1>
                    <p>Duration {{$workout->getDuration()}} mins</p>
                    <p>{{$workout->getDay()}}</p>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
