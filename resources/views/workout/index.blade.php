@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Heres a  list of all your workouts</div>

                    <p>Link in order to create a workout</p>
                <p>For each with all worokuots</p>
                    <p>Each title is a link to edit that workout -> deleting the workout, update data, add exercise or remove exercise</p>
                    @foreach($workouts as $w)
                        <a href="{{ route('workout.show', ['id' => $w->id]) }}">{{ $w->getName() }}</a>
                        <p>{{ $w->getName() }}</p>
                        <p>{{$w->getDuration()}}</p>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
@endsection
