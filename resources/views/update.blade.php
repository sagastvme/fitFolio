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
                        <p>Your actual weight is {{ Illuminate\Support\Facades\Auth::user()->actual_weight }} kg</p>

                        <form method="post" action="{{ route('edit') }}" class="row mb-3">
                            @csrf
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Weight (kg)') }}</label>

                            <div class="col-md-6">
                                <input value="{{ old('weight') }}" id="weight" maxlength="3" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" required autocomplete="weight">

                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update weight') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
