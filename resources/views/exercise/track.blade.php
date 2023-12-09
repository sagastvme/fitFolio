@extends('layouts.app')
@section('lib')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('myChart').getContext('2d');
            const xValues = [50,60,70,80,90,100,110,120,130,140,150];
            const yValues = [7,8,8,9,9,9,10,11,14,14,15];

            new Chart(ctx, {
                type: "scatter", // Change the type to "scatter" for consistency
                data: {
                    datasets: [{
                        backgroundColor: "rgba(0, 0, 255, 1.0)",
                        borderColor: "rgba(0, 234, 123, 0.1)",
                        data: xValues.map((x, index) => ({ x, y: yValues[index] }))
                    }]
                },
                options: {
                    legend: {display: false}
                }
            });
        });
    </script>


@endsection

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
                            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('exercise.track.add', ['id' => $id, 'ex_id' => $ex_id]) }}" class="btn btn-primary">Add tracking value</a>
                            <a href="{{ route('exercise.track.delete', ['id' => $id, 'ex_id' => $ex_id]) }}" class="btn btn-danger">Delete tracking value</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
