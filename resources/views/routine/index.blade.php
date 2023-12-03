@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Your Routine Summary
                    </div>
                    <div class="card-body">

                        @error('duration')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('day')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                        <p class="lead">You have {{ sizeof($workouts) }} workouts</p>
                        <p class="lead">You workout {{ $totalUniqueDaysCount }} days</p>
                        <p class="lead">You rest {{ 7 - $totalUniqueDaysCount }} days</p>

                        @foreach($daysOfWeekOrder as $day => $order)
                            <div class="mt-3">
                                <h5 class="bold-text">{{ $day }}</h5>
                                @php
                                    $workoutsForDay = $workouts->filter(function ($workout) use ($day) {
                                        return $workout['day'] === $day;
                                    });
                                @endphp

                                @if($workoutsForDay->isEmpty())
                                    <p class="text-muted">Rest day</p>
                                @else
                                    <ul class="list-group">
                                        @foreach($workoutsForDay as $w)
                                            <li class="list-group-item">
                                                <a href="{{ route('workout.show', ['id' => $w->getId()]) }}">{{ $w->getName() }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
