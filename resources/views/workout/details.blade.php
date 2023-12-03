@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Details of Workout
                    </div>

                    <div class="card-body">

                        <!-- Workout Details -->
                        <h1 class="card-title">Name: {{ $workout->getName() }}</h1>
                        <h2 class="card-subtitle mb-2">This workout is for {{ $workout->getDay() }}</h2>
                        <p class="card-text">Duration: {{ $workout->getDuration() }} mins</p>

                        <!-- Exercise Details -->
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
                                        <a href="{{route('exercise.track', ['id'=>$workout->getId(), 'ex_id'=>$exercise->getId()])}}">Track exercise</a>

                                </div>
                            </div>
                        @endforeach

                        <!-- Actions -->
                        <div class="mt-3">
                            <a class="btn btn-primary" href="{{ route('workout.insert', ['id' => $workout->getId()]) }}">Add an exercise</a>
                            <a class="btn btn-danger" href="{{ route('workout.render.delete', ['id' => $workout->getId()]) }}">Delete an exercise</a>
                        </div>

                        <!-- Delete Workout Form -->
                        <form action="{{ route('workout.delete') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label for="confirm_message">Type "Delete" to confirm deletion</label>
                                <input type="text" name="confirm_message" id="confirm_message" placeholder="Delete" class="form-control @error('confirm_message') is-invalid @enderror">
                                @error('confirm_message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" id="workout_id" name="workout_id" value="{{ $workout->getId() }}">

                            <button type="submit" class="btn btn-danger mt-3">Delete Workout</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
