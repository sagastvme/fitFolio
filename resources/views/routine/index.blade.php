@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Your routine summary @error('name') cant print the error lol @enderror
                    </div>
                    <div class="card-body">
                        <form action="{{route('routine')}}" method="POST">
                            @csrf
                            <label for="name">Workout name</label>
                            <input type="text" name="name" id="name" required>
                            <label for="day">Day of the workout</label>
                            <select id="day" name="day" required>
                                <option value="Monday" selected>Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                            <label for="duration">Duration of the workout in minutes</label>
                            <input type="number" name="duration" id="duration" required>
                            <button>Send lol</button>
                        </form>
                        @error('duration')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>dsaaaaaaaaaaaa{{$message }}</strong>
                                    </span>
                        @enderror
                        @error('day')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                       <p>Days you have failed your routine [0 days]</p>
                        <p>Days following your routine [0 days]</p>
                        <p>Your routine is X days long</p>
                        <p>Heres a summary [for loop]</p>
                        <p>There should also be a table displaying eachs day info Each day is a link to /monday or in their lang that gets the info</p>
                        <p>Monday: Pech, Abs, Leg</p>
                        <p>Tuesday: Pech, Abs, Leg</p>
                        <p>Wednesday: Pech, Abs, Leg</p>
                        <p>Thursday: Pech, Abs, Leg</p>
                        <p>Friday: Pech, Abs, Leg</p>
                        <p>Saturday: REST</p>
                        <p>Sunday: REST</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
