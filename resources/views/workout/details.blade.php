@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details of workout</div>

                    <h1>Name {{$workout->getName()}}</h1>
                    <h2>This workout is for {{$workout->getDay()}}</h2>
                    <p>Duration {{$workout->getDuration()}} mins</p>
                    <p>{{$workout->getDay()}}</p>


                    <p>This is a list of all the exercises LOOP</p>
                    <a href="{{route('workout.insert', ['id'=>$workout->getId()])}}">Add an exercise</a>
                </div>
            </div>
        </div>
    </div>
@endsection
