@extends('layouts.app')



@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('account_settings.title') }}
                        {{ Illuminate\Support\Facades\Auth::user()->name }}
                        <a class="dropdown-item" href="{{ route('edit') }}">
                            {{__('auth_routes.edit')}}
                        </a>
                    </div>
                    <div class="card-body">
                        <p>Today {{$today}} you have to train  SUMMARY OF TODAYS WORKOUT AND LINK</p>
                        <p>Your email {{Illuminate\Support\Facades\Auth::user()->email }}</p>
                        <p>Account created {{Illuminate\Support\Facades\Auth::user()->created_at->format('d/m/Y') }}</p>
                        <p>Account created {{Illuminate\Support\Facades\Auth::user()->created_at->diffForHumans()}}</p>
                        <p>Your height {{Illuminate\Support\Facades\Auth::user()->initial_height }} cm</p>
                        <p>Your initial weight {{Illuminate\Support\Facades\Auth::user()->initial_height }} kg</p>
                        <p>Your initial BMI {{Illuminate\Support\Facades\Auth::user()->initial_bmi }}</p>
                        <p>Your actual weight {{Illuminate\Support\Facades\Auth::user()->actual_weight }} kg</p>
                        <p>Your actual BMI {{Illuminate\Support\Facades\Auth::user()->actual_bmi }}</p>
                        <p>Your goal is to {{Illuminate\Support\Facades\Auth::user()->goal }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
