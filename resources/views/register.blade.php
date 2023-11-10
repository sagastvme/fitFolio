@extends('layout')

@section('content')
    <p> {{ $header }}</p>
    <p>{{ $body }}</p>
@endsection

@section('title')
    {{ $footer }}
@endsection
