@extends('layout.master')

@section('content')
    <div class='centered'>
        <a href="{{ route( 'greet' )}}">Greet</a>
        <a href="{{ route( 'hug' )}}">Hug</a>
        <a href="{{ route( 'kiss' )}}">Kiss</a>
    </div>
@endsection