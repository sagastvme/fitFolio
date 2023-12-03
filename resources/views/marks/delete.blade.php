@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tracking of exercise {{$exercise->getName()}}
                    </div>

                    <div class="card-body">
<p>delete exercise</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
