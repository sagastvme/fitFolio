@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Check the exercise you want to delete</div>
                    <form action="{{ route('exercise.delete') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Duration</th>
                                    <th>Id</th>
                                    <th>Muscle group</th>
                                    <th>Type</th>
                                    <th>Notes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exercises as $exercise)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="exercise_{{ $exercise->getId() }}" name="selected_exercises[]" value="{{ $exercise->getId() }}" @if(in_array($exercise->getId(), old('selected_exercises', []))) checked @endif>
                                            <label for="exercise_{{ $exercise->getId() }}"></label>
                                        </td>
                                        <td>{{ $exercise->getName() }}</td>
                                        <td>{{ $exercise->getDuration() }}</td>
                                        <td>{{ $exercise->getId() }}</td>
                                        <td>{{ $exercise->getMuscleGroup() }}</td>
                                        <td>{{ $exercise->getType() }}</td>
                                        <td>{{ $exercise->getNotes() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <label class="sr-only text-hidden d-none" for="workout">Workout ID:</label>
                            <input type="text" id="workout" name="workout" value="{{ old('workout', $workout->getId()) }}" hidden>
                        </div>
                        @error('selected_exercises')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-danger">Delete selected exercises</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





