@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('welcome.header') }}</div>

                    <div class="card-body">

{{$lang}}
                        {{trans('welcome.header')}}
                        {{$test}}
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
