@extends('layout.master')

@section('content')
    <div class="centered"><h1>I Greet {{ $name === null ? 'You': $name }}!</h1></div>
@endsection