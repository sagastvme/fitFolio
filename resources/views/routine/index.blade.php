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
                        <p>This is a link to edit your routine</p>
                       <p>Days you have failed your routine [0 days]</p>
                        <p>Days following your routine [0 days]</p>
                        <p>Your routine is X days long</p>
                        <p>Heres a summary [for loop]</p>
                        <p>Each day is a link to /monday or in their lang that gets the info</p>
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
