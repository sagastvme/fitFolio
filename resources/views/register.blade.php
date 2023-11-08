@extends('layout')

@section('content')
    <p> {{ $welcomeMessage }}</p>
    <p>{{ __('auth.failed') }}</p>
    <p>{{ $lang }}</p>
@endsection

@section('title')
    {{ $title }}
@endsection
