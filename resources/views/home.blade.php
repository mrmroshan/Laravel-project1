@extends('layout.master')

@section('content')
    <div class='centered'>
        
        @foreach($actions as $action)
        
            <a href="{{ route( 'niceaction' ,[ 'action' => lcfirst($action->name) ]) }}">{{ $action->name }}</a>
        
        @endforeach
        
        <br>
        @if(count($errors) > 0)
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                    {{ $error}}
                    @endforeach
                </ul>
            </div>
        @endif
        
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