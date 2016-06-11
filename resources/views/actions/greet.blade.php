@extends('layout.master')

@section('content')
    <a href="{{ route('home')}}">Home</a>
    <div class="centered"><h1>I Greet {{ $name === null ? 'You': $name }}!</h1></div>
@endsection