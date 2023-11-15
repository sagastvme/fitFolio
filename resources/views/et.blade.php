@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ config('app.name', 'Laravel') }}</div>

                    <div class="card-body">
                        <p>This is the body and here I explain what the app does blablabla</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
