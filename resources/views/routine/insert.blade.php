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
                            <button>Add workout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
