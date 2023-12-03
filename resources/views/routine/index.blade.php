@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Your routine summary
                    </div>
                    <div class="card-body">

                        @error('duration')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{$message }}</strong>
                                    </span>
                        @enderror
                        @error('day')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                       <p>You have {{sizeof($workouts)}} workouts</p>
                        <p>Your routine is {{$totalUniqueDaysCount}} days long</p>


                        @foreach($daysOfWeekOrder as $day => $order)
                            <p>Workout for {{ $day }}</p>
                            @php
                                $workoutsForDay = $workouts->filter(function ($workout) use ($day) {
                                    return $workout['day'] === $day;
                                });
                            @endphp

                            @if($workoutsForDay->isEmpty())
                                <p class="accordion-button">Rest day</p>
                            @else
                                @foreach($workoutsForDay as $w)
                                    <a href="{{ route('workout.show', ['id' => $w->getId()]) }}">{{ $w->getName() }}</a>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
