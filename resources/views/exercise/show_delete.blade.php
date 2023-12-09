@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Delete marks for exercise {{ $exercise->getName() }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('exercise.delete') }}" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Created at</th>
                                        <th>Mark</th>
                                        <th>Units</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        @foreach($marks as $mark)
                            <tr>
                                <td>
                                    <input type="checkbox" id="exercise_{{ $mark->getId() }}" name="selected_marks[]" value="{{ $mark->getId() }}" @if(in_array($mark->getId(), old('selected_marks', []))) checked @endif>
                                    <label for="exercise_{{ $mark->getId() }}">{{ $mark->getCreated()->format('l, d F') }}</label>
                                </td>
                                <td>  <label for="exercise_{{ $mark->getId() }}">{{ $mark->getMark() }}</label></td>
                                <td>I should add if its kg or minutes</td>
                            </tr>
                            <p>Valencia 2012</p>
                            p
                        @endforeach
                        <p>this is the foreach wehere i display the button</p>
                               <tr>
                                   <td>Delete selected tracks missing fn</td>
                               </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
{{--                        <div class="d-flex justify-content-between">--}}
{{--                            <a href="{{ route('exercise.track.add', ['id' => $id, 'ex_id' => $ex_id]) }}" class="btn btn-primary">Add tracking value</a>--}}
{{--                            <a href="{{ route('exercise.track.add', ['id' => $id, 'ex_id' => $ex_id]) }}" class="btn btn-danger">Delete tracking value</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
