@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('account_settings.title') }}
                        {{ Illuminate\Support\Facades\Auth::user()->name }}
                    </div>
                    <div class="card-body">
                        <p>Your email {{Illuminate\Support\Facades\Auth::user()->email }}</p>
                        <p>Account created {{Illuminate\Support\Facades\Auth::user()->created_at->format('d/m/Y') }}</p>
                        <p>Account created {{Illuminate\Support\Facades\Auth::user()->created_at->diffForHumans()}}</p>
                        <p>Your height 184cm</p>
                        <p>Your initial weight 184cm</p>
                        <p>Your initial BMI 184cm</p>
                        <p>Your actual weight 184cm</p>
                        <p>Your actual BMI 184cm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
