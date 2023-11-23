@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details of Workout</div>

                    <div class="card-body">
                        <h1 class="card-title">Name: {{ $workout->getName() }}</h1>
                        <h2 class="card-subtitle mb-2">This workout is for {{ $workout->getDay() }}</h2>
                        <p class="card-text">Duration: {{ $workout->getDuration() }} mins</p>

                        @foreach($workout->exercises as $exercise)
                            <div class="card mt-3">
                                <div class="card-body">
                                    @foreach($exercise->getAttributes() as $attribute => $value)
                                        @unless(Str::contains($attribute, 'id'))
                                            @if($attribute === 'created_at' || $attribute === 'updated_at')
                                                <p class="card-text">{{ ucfirst(str_replace('_', ' ', $attribute)) }}: {{ date('d-M-y', strtotime($value)) }}</p>
                                            @else
                                                <p class="card-text">{{ ucfirst(str_replace('_', ' ', $attribute)) }}: {{ $value }}</p>
                                            @endif
                                        @endunless
                                    @endforeach
{{--                                    <p class="card-text"><a href="{{ route('workout.edit', ['id' => $exercise->getId()]) }}">Link to edit the exercise</a></p>--}}
                                </div>
                            </div>
                        @endforeach

                        <a class="btn btn-primary mt-3" href="{{ route('workout.insert', ['id' => $workout->getId()]) }}">Add an exercise</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
