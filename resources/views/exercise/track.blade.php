@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Tracking of Exercise {{ $exercise->getName() }}</h2>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            @foreach($marks as $mark)
                                <div class="mb-2">
                                    Mark of {{ $mark->getCreated()->format('l, d F') }}:<strong> {{ $mark->getMark() }}</strong>


                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <p class="mb-0">Here should be a graph</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('exercise.track.add', ['id' => $id, 'ex_id' => $ex_id]) }}" class="btn btn-primary">Add tracking value</a>
                            <a href="{{ route('exercise.track.add', ['id' => $id, 'ex_id' => $ex_id]) }}" class="btn btn-danger">Delete tracking value</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
