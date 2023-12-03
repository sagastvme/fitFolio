@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add track for exercise {{$exercise->getName()}}
                    </div>

                    <div class="card-body">
                        <form action="{{ url()->current() }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="mark" class="form-label">Add tracking value for {{ $exercise->getName() }} in
                                    @if($exercise->getType() == 'Cardio')
                                        minutes
                                    @else
                                        kilos
                                    @endif
                                </label>
                                <br>
                                <span>The latest tracking value is {{$latest}}</span>
                                <input type="number" id="mark" name="mark" class="form-control @error('mark') is-invalid @enderror">
                                @error('mark')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add tracking value</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
