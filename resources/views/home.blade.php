@extends('layout.master')

@section('content')
    <div class='centered'>
        <a href="{{ route( 'greet' )}}">Greet</a>
        <a href="{{ route( 'hug' )}}">Hug</a>
        <a href="{{ route( 'kiss' )}}">Kiss</a>
        <br>
        <form method="post" action="{{ route('benice') }}">
            <label for="select-action">I want to...</label>
            <select id="select-action" name="action">
                <option value="greet">Greet</option>
                <option value="hug">Hug</option>
                <option value="kiss">Kiss</option>
            </select>
            <input type="text" name="name"/>
            <button type="submit">Do a nice action!</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
@endsection