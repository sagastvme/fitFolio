@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add workout
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('routine') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Workout name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="day">Day of the workout</label>
                                <select class="form-control" id="day" name="day" required>
                                    <option value="Monday" selected>Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="duration">Duration of the workout in minutes</label>
                                <input type="number" class="form-control" name="duration" id="duration" required>
                                @error('duration')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add workout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
