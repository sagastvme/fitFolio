@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Insert Exercise</h1>
        <form method="post" action="{{ url()->current() }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Exercise Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="muscle_group" class="form-label">Muscle Group</label>
                <input type="text" class="form-control" name="muscle_group" id="muscle_group" value="{{ old('muscle_group') }}">
                @error('muscle_group')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                @error('notes')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Exercise Type</label>
                <select class="form-select" name="type" id="type">
                    <option value="Cardio" {{ old('type') == 'Cardio' ? 'selected' : '' }}>Cardio</option>
                    <option value="Weight" {{ old('type') == 'Weight' ? 'selected' : '' }}>Weight</option>
                </select>
                @error('type')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in minutes)</label>
                <input type="number" class="form-control" name="duration" id="duration" value="{{ old('duration') }}">
                @error('duration')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                @error('duration')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hidden input for UUID -->
            <input type="hidden" name="alternate_id" value="{{ \Illuminate\Support\Str::uuid() }}">

            <input type="hidden" name="workout_id" value="{{ $workout->id }}">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
